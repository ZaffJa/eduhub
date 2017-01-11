<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\AdminNotification;

class NotificationController extends Controller
{
    public function getAdminNotifications()
    {
        $an  = AdminNotification::paginate(20);

        return view('admin.notifications')->with(compact('an'));
    }

    public function postAdminNotifications(Request $request)
    {
        try{
            $notifications = AdminNotification::find($request->id);
            $notifications->action = $request->action;
            $notifications->save();

            return 'Successfully updated action';

        }catch(QueryException $ex){

            return 'Error'.$ex->errorInfo[2];

        }
    }

    public function reset()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return 'Reset notification count';
    }
}
