<?php
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

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


// Dynamic Presence Channel for Streaming
Broadcast::channel('streaming-channel.{streamId}', function ($user) {
    return ['id' => $user->id, 'name' => $user->name];
});

// Signaling Offer and Answer Channels
Broadcast::channel('stream-signal-channel.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});

Broadcast::channel('presence-video-channel', function ($user) {
    Log::info("User attempting to join presence-video-channel", ['user' => $user]);
    if ($user) {
        Log::info("User is authenticated", ['id' => $user->id, 'name' => $user->name]);
    } else {
        Log::warning("User is not authenticated");
    }
    return ['id' => $user->id, 'name' => $user->name];
});


