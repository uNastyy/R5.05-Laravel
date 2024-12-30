<?php
namespace App\Mail;

use App\Models\Eleve;
use App\Models\EvaluationEleve;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NouvelleNoteNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $eleve;
    public $note;

    public function __construct(Eleve $eleve, EvaluationEleve $note)
    {
        $this->eleve = $eleve;
        $this->note = $note;
    }

    public function build()
    {
        return $this->view('emails.nouvelle_note')
            ->subject('Nouvelle Note Ajoutée')
            ->with([
                'eleve' => $this->eleve,
                'note' => $this->note,
            ]);
    }
}
