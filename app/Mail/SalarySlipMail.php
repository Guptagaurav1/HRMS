<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Attachment;
use Illuminate\Contracts\Mail\Attachable;
use Illuminate\Mail\Mailables\Address;

class SalarySlipMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public $attachmentPath;
    /**
     * Create a new message instance.
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
         $this->attachmentPath = $mailData['file'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->mailData['subject'],
            from: new Address('no-reply@prakharsoftwares.com', 'HRMS'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'hr.templates.mail.salary-slip',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [$this->attachmentPath];
    }
}
