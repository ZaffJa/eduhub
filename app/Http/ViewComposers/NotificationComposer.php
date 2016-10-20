<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\AdminNotification;

class NotificationComposer
{
    public $movieList = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->movieList = [
            'test','tesss','teststs'
        ];
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $an  = AdminNotification::whereAction(1)->get();
        $view->with('admin_notifications', $an);
    }
}
