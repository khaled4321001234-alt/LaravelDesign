<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DonateMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array{name: string, email: string, phone?: string|null, amount: float|int|string, category: string, message?: string|null}  $data
     */
    public function __construct(public array $data) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('site.donate.mail_subject', [
                'amount' => $this->data['amount'],
                'category' => __('site.donate.categories.'.$this->data['category']),
            ]),
            replyTo: [$this->data['email']],
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.donate',
        );
    }
}
