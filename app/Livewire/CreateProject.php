<?php

namespace App\Livewire;

use App\Models\Status;
use App\Models\Tag;
use App\Models\Project;
use Livewire\Component;

class CreateProject extends Component
{
    public $title = '';

    public $description = '';

    public $status = '1';

    public $tags = [];

    public function render()
    {
        $statuses = Status::whereNotIn('name', ['Accepted', 'Rejected'])->get();

        $availableTags = Tag::all();

        return view('livewire.create-project')->with(['statuses' => $statuses, 'availableTags' => $availableTags]);
    }

    public function store(): void
    {
        $user = auth()->user();
        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'status' => ['required'],
        ]);

        $project = new Project();
        $project->title = $validated['title'];
        $project->description = $validated['description'];
        $project->status_id = $validated['status'];
        $project->user_id = $user->id;
        $project->admin_user_id = $user->id;
        $project->save();

        if (count($this->tags)) {
            $project->tags()->sync($this->tags);

        }

        $this->redirect('/projects', navigate: true);
    }
}
