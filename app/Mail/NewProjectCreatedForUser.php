<?php

namespace App\Mail;

use App\Models\Status;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewProjectCreatedForUser extends Mailable
{
    use Queueable, SerializesModels;

    public $projectData;

    /**
     * Create a new message instance.
     */
    public function __construct($projectData)
    {
        $this->projectData = $projectData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Project Assigned',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $user = User::find($this->projectData['admin_user_id']);
        $statusName = Status::find($this->projectData['status_id']);
        return new Content(
            view: 'emails.project_assigned_notification',
            with: [
                'assigned_by' => $user->name,
                'statusName' => $statusName,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
