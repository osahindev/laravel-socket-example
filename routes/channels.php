<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('online_users', function ($user){
    return ['id' => $user->id, 'name' => $user->name];
});

Broadcast::channel('user_details.{id}', function ($user, $id){
    return (int) $user->id === (int) $id;
});

Broadcast::channel('user_register', function ($user){
    return true;
});

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
