<?php

namespace App\Http\Controllers;

use Illuminate\Http\Messages;

use Illuminate\Support\Facades\DB;


class MessagingController extends Controller
{
    public function addMessage(Request $request){
        $Message = new Messages();
        $Message->content = $request->input('content');

        $Message->id_receiver = Users::find(
            intval(
                $request->input('id_receiver')
            )
        )->id;

        $Message->id_sender = Users::find(
            intval(
                $request->input('id_sender')
            )
        )->id;

        return response()->json($Messages);
    }

    public function getChat($id_receiver,$id_sender){
        $Message = DB::table('messages')->select('id_receiver','id_sender','content')->where('id_receiver','=', $id_receiver)->where('id_sender','=', $id_sender)->get();
        return response()->json($Message);
    }

    public function editMessage($id, Request $request){
        $user = DB::table('messages')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

    public function deleteMessage($id){
        $EmergencyContacts = DB::table('messages')->where('id','=',$id)->delete();
    }

}
