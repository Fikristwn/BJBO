<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class ChatController extends Controller
{

    public function sendMessage(Request $request)
    {
        $request->validate([
            'sender' => 'required|string',
            'message' => 'required|string',
        ]);
    
        // Simpan pesan dengan user_id dari pengguna yang sedang login
        Message::create([
            'user_id' => auth()->id(),
            'sender' => $request->sender,
            'message' => $request->message,
        ]);
    
        return response()->json(['message' => 'Pesan berhasil dikirim']);
    }
    
}