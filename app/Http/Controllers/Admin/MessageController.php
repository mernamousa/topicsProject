<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function contactUs()
    {

        return view('public.pages.contactSection');

    }

    public function storeMessage(Request $request)
    {
        $data = $request->except('_token');
        //  dd($data);
        $message = $request->validate([
            'senderName' => 'required|string|max:100',
            'senderEmail' => 'required|string|max:100',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:100',
            'read' => 'false',
        ]);
        Message::create($message);
        Mail::to('mernamousa209@gmail.com')->send(new ContactMail($data));
        return 'message has sent succesfully';
    }

    public function index()
    {
        $unReadMessages = Message::where('read', false)->get();
        $readMessages = Message::where('read', true)->get();
        return view('admin.messages.index', compact('readMessages', 'unReadMessages'));
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
        $message = Message::findOrFail($id);
        $message->update(['read' => true]);

        return view('admin.messages.messagedetails', compact('message'));
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
        Message::where('id', $id)->delete();

        return redirect()->route('messages.index');
    }
}
