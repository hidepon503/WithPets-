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

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
// 上記のコードは、ユーザーが自分のユーザーIDと同じIDを持つユーザーのモデルに接続できるようにするためのチャネル認証コールバックを定義しています。
// APIを作る際には、Broadcast::routesメソッドを使用して、Broadcastの認証ルートを登録する必要があります。
// APIを作る際は、api.php