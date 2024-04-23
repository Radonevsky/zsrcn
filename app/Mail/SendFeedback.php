<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendFeedback extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        private $feedbackData,
    ) {
    }

    public function build()
    {
        return $this->subject('Поступило новое обращение')
            ->view('emails.feedback', [
                'feedbackData' => $this->feedbackData,
            ]);
    }
}
