<?php

namespace App\Http\Controllers;

use Illuminate\Http\Messages;

use Illuminate\Support\Facades\DB;


class MessagingController extends Controller
{
    public function addMessage($content,$id_receiver,$id_sender){
        $Message = new Messages();
        $Message->content = $content;
        $Message->id_receiver = $id_receiver;
        $Message->id_sender = $id_sender;
        return response()->json($Messages);
    }

    public function getChat($id_receiver,$id_sender){
        $Message = DB::table('messages')->select('id_receiver','id_sender','content')->where('id_receiver','=', $id_receiver)->where('id_sender','=', $id_sender)->get();
        return response()->json($Message);
    }

    public function editMessage($id,$column,$newValue){
        $user = DB::table('messages')->where('id','=',$id)->update([$column => $newValue]);
    }

    public function deleteMessage($id){
        $EmergencyContacts = DB::table('messages')->where('id','=',$id)->delete();
    }

}
