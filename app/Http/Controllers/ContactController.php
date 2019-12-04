<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();
        if($contact){
            return response()->json([
                "message" => "Messages Client",
                "data" => $contact
            ],200);
        }
        return response()->json('Not found',404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        return response()->json([
            "message" => "qlqqq",
        ], 200);
        
        if($request){
            $contact = Contact::create($request->all());
            $contact->save();

            /*return response()->json([
                "message" => "Message created",
                "Contact" => $contact
            ], 200);*/

            if($contact){
                //mail data
                $receiver = "luisda021298@gmail.com";
                $case = "Elizabeth Sira contacto";

                $cart = "De: $contact->name_client \n";
                $cart .= "Correo: $contact->email_client \n";
                $cart .= "Telefono: $contact->phone_client \n";
                $cart .= "Mensaje: $contact->msg_client";

                //send mail
                mail($receiver, $case, $cart);
                
                return response()->json([
                    "message" => "Message created",
                    "Contact" => $contact
                ], 200);
            }
            return response()->json([
                "message" => "Message not created"
            ],404);
        }
        return response()->json([
            "message" => "Error"
        ],404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
