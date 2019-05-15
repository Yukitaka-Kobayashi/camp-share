<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SampleNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $text;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title='テスト', $text='テストです。',$link)
    {
        $this->title = $title;
        $this->text = $text;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
                return $this->view('emails.sample_notification_plain')
                    ->text('emails.sample_notification_plain')
                    ->subject($this->title)
                    ->with([
                        'text' => $this->text,
                        'link' => $this->link,
                      ]);
        //return $this->view('view.name');
    }
}
