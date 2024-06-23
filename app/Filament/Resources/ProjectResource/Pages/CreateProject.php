<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use App\Mail\NewProjectCreatedForUser;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $recipient = User::find($this->data['user_id']);
        $projectData = $this->data;
        $response = Mail::to($recipient->email)->queue(new NewTaskCreatedForUser($projectData));
        if ($response) {
            Log::info('New Task Assigned Mail Sent Successfully to '.$recipient->email);
        }

    }
}
