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

    public function read(Request $request, $type) {
        if($type === 'orders') {
            $type = 'App\Notifications\NewOrder';
        } else if($type === 'users') {
            $type = 'App\Notifications\NewUser';
        }
        $request->user()->unreadNotifications->where('type', $type)->markAsRead();
        return redirect(route('admin'));
    }

}
