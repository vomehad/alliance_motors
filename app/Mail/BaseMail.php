<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BaseMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public array $content,
        public string $view = 'sample',
    ) {}

    public function build(): BaseMail
    {
        $view = "emails.$this->view";
        $content = $this->content;

        return $this->subject($content['subject'])->view($view, ['content' => $content]);

    }
}
