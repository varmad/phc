<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class JobDroped extends Mailable
{
    use Queueable, SerializesModels;

    public $job;
    public $user;
    public $user_job;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job, $user_job)
    {
        $this->job = $job;
        $this->user = Auth::user();
        $this->user_job = $user_job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.job_dropout')
                ->subject("Job Droped");
    }
}
