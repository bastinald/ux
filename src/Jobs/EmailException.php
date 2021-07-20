<?php

namespace Bastinald\Ux\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class EmailException implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    public $subject, $html;

    public function __construct($subject, $html)
    {
        $this->subject = $subject;
        $this->html = $html;
    }

    public function handle()
    {
        if (!$emails = Arr::wrap(config('ux.exception_emails'))) {
            return;
        }

        foreach ($emails as $email) {
            Mail::html($this->html, function (Message $message) use ($email) {
                $message->subject($this->subject);
                $message->to($email);
            });
        }
    }
}
