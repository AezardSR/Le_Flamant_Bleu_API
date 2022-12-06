<?php

namespace App\Http\Controllers;

use Illuminate\Http\Messages;

use Illuminate\Support\Facades\DB;


class MessagingController extends Controller
{
    public function addMessage(Request $request){
        $Message = new Messages();
        $Message->content = $request->input('content');

        $Message->receiver_id = user::find(
            intval(
                $request->input('receiver_id')
            )
        )->id;

        $Message->sender_id = user::find(
            intval(
                $request->input('sender_id')
            )
        )->id;

        return response()->json($Messages);
    }

    public function getChat($receiver_id,$sender_id){
        $Message = DB::table('messages')->select('receiver_id','sender_id','content')->where('receiver_id','=', $receiver_id)->where('sender_id','=', $sender_id)->get();
        return response()->json($Message);
    }

    public function editMessage($id, Request $request){
        $user = DB::table('messages')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

    public function deleteMessage($id){
        $EmergencyContacts = DB::table('messages')->where('id','=',$id)->delete();
    }

}
