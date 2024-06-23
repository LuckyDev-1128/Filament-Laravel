<?php

namespace App\Livewire;

use App\Models\Status;
use App\Models\Tag;
use App\Models\Project;
use Livewire\Component;

class EditProject extends Component
{
    public Project $project;

    public $title;

    public $description;

    public $status_id;

    public $tags;

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->title = $project->title;
        $this->description = $project->description;
        $this->status_id = $project->status_id;
        $this->tags = $project->tags->pluck('id')->all();
    }

    public function render()
    {
        $statuses = Status::whereNotIn('name', ['Accepted', 'Rejected'])->get();

        $availableTags = Tag::all();

        return view('livewire.edit-project')->with(['statuses' => $statuses, 'availableTags' => $availableTags]);
    }

    public function update()
    {

        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'status_id' => 'required',
        ]);

        $this->project->update($validatedData);

        if (count($this->tags)) {
            $this->project->tags()->sync($this->tags);
        }

        session()->flash('message', 'Project updated successfully.');

        // return redirect()->route('task');
        $this->redirect('/projects', true);
    }
}
