<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    protected $fillable = [
        'subject',
        'content',
        'start_date',
        'expiration_date',
        'active'
    ];

    static function list(){
        return DB::table('messages')->where('active', 1)->get();
    }

    static function alter($data, $id)
    {

        $message = Message::find($id);

        $message->subject = $data['subject'];
        $message->content = $data['content'];
        $message->start_date = $data['start_date'];
        $message->expiration_date = $data['expiration_date'];

        $message->save();

        return $message;
    }

    static function disable($id)
    {
        $message = Message::find($id);

        $message->active = false;

        $message->save();

        return $message;
    }
}
