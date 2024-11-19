<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public $senderId;
    public $receiverId;

    public function chat($receiver_id)
    {
        $this->senderId = auth()->user()->id;
        $this->receiverId = $receiver_id;
        // dd($this->senderId,$this->receiverId);

        $messages = Message::where(function ($query) {
            $query->where('sender_id', $this->senderId)
                ->where('receiver_id', $this->receiverId);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->receiverId)
                ->where('receiver_id', $this->senderId);
        })->with(['sender', 'receiver'])
            ->orderBy('id', 'asc')
            ->get();
        // dd($message);
        return view('chat', compact('messages','receiver_id'));
    }

    public function sendMessage(Request $request,$receiver_id){  
        $message = Message::create([
            'receiver_id'=>$receiver_id,
            'sender_id'=>auth()->user()->id,
            'message'=>$request->message
        ]);

        broadcast(new MessageSend($message));

        return $message;
    }
}
