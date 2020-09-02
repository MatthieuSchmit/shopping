<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function home(Request $request) {
        $notifications = $request->user()->unreadNotifications()->get();
        $newUsers = 0;
        $newOrders = 0;
        foreach($notifications as $notification) {
            if($notification->type === 'App\Notifications\NewUser') {
                ++$newUsers;
            } elseif($notification->type === 'App\Notifications\NewOrder'){
                ++$newOrders;
            }
        }
        return view('admin.home', compact('notifications', 'newUsers', 'newOrders'));
    }

}
