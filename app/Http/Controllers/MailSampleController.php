<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\SampleNotification;

class MailSampleController extends Controller
{
  //
  public function SampleNotification()
  {
    $name = 'ララベル太郎';
    $text = 'これからもよろしくお願いいたします。';
    $to = 'jvnts-10-@docomo.ne.jp';
    Mail::to($to)->send(new SampleNotification($name, $text));
  }
}
