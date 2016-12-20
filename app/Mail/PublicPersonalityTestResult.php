<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PublicPersonalityTestResult extends Mailable
{
    use Queueable, SerializesModels;

    protected $res,$chart,$personalityType,$course,$careerImage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($res,$chart,$personalityType,$course,$careerImage)
    {
        $this->careerImage = $careerImage;
        $this->res = $res;
        $this->chart = $chart;
        $this->personalityType = $personalityType;
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('school.personality.mail_result')->with([
            'res' => $this->res,
            'careerImage' => $this->careerImage,
            'chart' => $this->chart,
            'personalityType' => $this->personalityType,
            'course' => $this->course,
        ]);
    }
}
