<?php

namespace App\Mail;

use App\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdicionarAlunoDisciplina extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $disciplina;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Usuario $usuario, $disciplina)
    {
        $this->usuario = $usuario;
        $this->disciplina = $disciplina;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Test&Code - Adicionado a Disciplina '. $this->disciplina)->markdown('emails.adicionarAluno');
    }
}
