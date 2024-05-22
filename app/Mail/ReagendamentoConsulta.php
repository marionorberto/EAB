<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReagendamentoConsulta extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public string $dotor, public string $horario, public string $dataNovaConsulta, public string $paciente)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reagendamento Consulta',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail-template.reagendamento-consulta',
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
