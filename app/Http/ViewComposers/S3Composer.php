<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\AdminNotification;

class S3Composer
{
    public $s3 = "";

    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {

        if (app()->environment('local')) {
            $this->s3 = "https://s3-ap-southeast-1.amazonaws.com/amr-eduhub-upoads/";
        } else {
            $this->s3 = "https://s3-ap-southeast-1.amazonaws.com/eduhubmy-media/";
        }

    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('s3', $this->s3);
    }
}
