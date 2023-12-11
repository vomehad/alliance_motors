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
        public array $content
    ) {}

    public function build(): BaseMail
    {
        $view = "emails.sample";
        $content = $this->content;

        return $this->subject($content['subject'])->view($view, ['content' => $content]);

    }
}
