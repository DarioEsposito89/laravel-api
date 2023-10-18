<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "message" => "required|max:800"
        ]);

        $newContact = new Contact();
        $newContact->name = $data["name"];
        $newContact->email = $data["email"];
        $newContact->message = $data["message"];

        $newContact->save();


        return response()->json([
            "message" => "Grazie per avermi contattato. Ti risponderò il prima possibile"
        ]);
    }
}
