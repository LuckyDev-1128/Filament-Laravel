<?php

namespace App\Livewire;

use App\Mail\ProjectStatusUpdated;
use App\Models\Status;
use App\Models\Project as ModelsProject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class Project extends Component
{
    use WithPagination;

    public $selectedStatus = [];

    public function render()
    {
        $projects = ModelsProject::where('user_id', Auth::user()->id);

        foreach ($projects->get() as $project) {
            $this->selectedStatus[$project->id] = $project->status_id;
        }

        return view('livewire.project', [
            'statuses' => Status::all(),
            'projects' => $projects->paginate(10),
        ]);
    }

    public function updateStatus($projectId)
    {
        $project = ModelsProject::find($projectId);
        $project->status_id = $this->selectedStatus[$projectId];
        if ($project->save() && $project->status->name == 'In-review' && $project->user_id != $project->admin_user_id) {
            Mail::to($project->assignedBy->email)->queue(new ProjectStatusUpdated($project));
        }

        $this->dispatch('status-updated');
    }

    public function delete($id)
    {
        ModelsProject::find($id)->delete();
        session()->flash('message', 'Project deleted successfully.');

        $this->redirect('/projects', true);
    }
}
