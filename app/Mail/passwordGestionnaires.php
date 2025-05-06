<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class passwordGestionnaires extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    private $password;
    private $name;

    /**
     * Create a new message instance.
     */
    public function __construct($name,$email,$password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Password Gestionnaires',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'utilisateurs.gestionnairesMail',
            with: [
                'email' => $this->email,
                'password' => $this->password,
                'name' => $this->name,
            ],
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
