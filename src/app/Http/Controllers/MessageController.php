<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('message.list', ['messages' => Message::list()]);
    }

    public function create()
    {
        return view('message.form', ['typeForm' => 'create']);
    }

    public function store(Request $request)
    {
        if(!Message::validated($request)) {
            return redirect()->back();
        }

        $data = [
            'subject' => $request->input('subject'),
            'content' => $request->input('content'),
            'start_date' => $request->input('startDate'),
            'expiration_date' => $request->input('expirationDate'),
            'active' => true
        ];

        Message::create($data);

        return redirect()->route('message.index')->with('success', 'Message created success!');
    }

    public function show($id) {
        return view('message.form', ['message' => Message::find($id), 'typeForm' => 'show']);
    }
    
    public function edit($id)
    {
        return view('message.form', ['message' => Message::find($id), 'typeForm' => 'edit']);
    }

    public function update(Request $request, $id)
    {
        if(!Message::validated($request)) {
            return redirect()->back();
        }

        $data = [
            'subject' => $request->input('subject'),
            'content' => $request->input('content'),
            'start_date' => $request->input('startDate'),
            'expiration_date' => $request->input('expirationDate'),
        ];

        Message::alter($data, $id);

        return redirect()->route('message.index')->with('success', 'Message update success!');
    }

    public function destroy($id)
    {
        Message::disable($id);

        return redirect()->route('message.index')->with('success', 'Message deleted success!');
    }
}
