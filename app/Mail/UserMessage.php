<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class UserMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $emailSubject;
    public $emailMessage;

    public function __construct($subject, $message)
    {
        $this->emailSubject = $subject;
        $this->emailMessage = $message;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->emailSubject,
            from: new Address($this->emailSubject, 'Mário Norberto'),
            replyTo: [
                new Address($this->emailSubject, 'Mário Norberto')
            ]
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email-template.user-message',
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
