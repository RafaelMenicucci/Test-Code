<?php

namespace App\Mail;

use App\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AvaliacaoCriada extends Mailable
{
    use Queueable, SerializesModels;

    public $usuarios;
    public $disciplina;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Usuario $usuarios, $disciplina)
    {
        $this->usuarios = $usuarios;
        $this->disciplina = $disciplina;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Test&Code - Avaliação criada da disciplina '. $this->disciplina)->markdown('emails.avaliacaoCriada');
    }
}
