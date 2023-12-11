<?php

namespace App\Mail;

class ApplicationMail extends BaseMail
{
    public function build(): ApplicationMail
    {
        $view = "emails.application";
        $content = $this->content;

        return $this->subject($content['subject'])->view($view, ['content' => $content]);
    }
}
