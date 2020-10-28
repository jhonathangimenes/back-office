<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index() {
        return view('message.list', ['messages' => Message::all()]);
    }

    public function create() {
        return view('message.create', ['typeForm' => 'create']);
    }

    public function store(Request $request) {

        $data = [
            'subject' => $request->input('subject'),
            'content' => $request->input('content'),
            'start_date' => $request->input('startDate'),
            'expiration_date' => $request->input('expirationDate'),
            'active' => true
        ];

        Message::create($data);

        return redirect('list-message');
    }

    public function edit($id) {
        return view('message.create', ['message' => Message::find($id), 'typeForm' => 'edit']);
    }
}
