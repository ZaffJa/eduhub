<?php
namespace App\CustomService;


use App\User;

class AdminService
{

    public static function profile()
    {
        $users = User::all();
        // Get the first admin instance
        foreach ($users as $user) {
            if ($user->hasRole('admin')) {
                return $user;
            }
        }
    }
}