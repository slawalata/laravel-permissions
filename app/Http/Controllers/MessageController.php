<?php

namespace App\Http\Controllers;

use App\Message;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $messages = Message::all();
        return view('message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $messages = Message::all();
        return view('message.create', compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        Auth::user()->posts()->save(new Message($request->all()));

        $messages = Message::all();

        return view('message.index', compact('messages'))->with(
            'success',
            'Product created successfully.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Message $post
     * @return void
     */
    public function show(Message $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Message $message
     * @return Response
     */
    public function edit(Message $message)
    {
        return view('message.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Message $message
     * @return Response
     * @throws AuthorizationException
     */
    public function update(Request $request, Message $message)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $message->update($request->all());

        $this->authorize('update', $message);

        return redirect()->route('message.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Message $message
     * @return void
     */
    public function destroy(Message $message)
    {
        //
    }
}
