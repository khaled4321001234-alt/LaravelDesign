<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array{name: string, email: string, phone?: string|null, subject: string, message: string}  $data
     */
    public function __construct(public array $data) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('site.contact.mail_subject', ['subject' => $this->data['subject']]),
            replyTo: [$this->data['email']],
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.contact',
        );
    }
}
