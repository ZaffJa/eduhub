<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminNotification;

use App\Http\Requests;

class NotificationController extends Controller
{
    public function getAdminNotifications()
    {
        $an  = \App\Models\AdminNotification::paginate(20);

        return view('admin.notifications')->with(compact('an'));
    }

    public function postAdminNotifications(Request $request)
    {
        try{
            $notifications = \App\Models\AdminNotification::find($request->id);
            $notifications->action = $request->action;
            $notifications->save();

            return 'Succesfully updated action';

        }catch(Illuminate\Database\QueryException $ex){

            return 'Error'.$ex->errorInfo[2];

        }
    }

    public function reset()
    {
        $admin_notifications = AdminNotification::whereClick(0)->get();

        try{
            foreach($admin_notifications as $notification){
                $notification->click = 1;
                $notification->save();
            }

            return 'success';

        }catch(Illuminate\Database\QueryException $ex){
            
            return $ex->errorInfo;
        }


    }
}
