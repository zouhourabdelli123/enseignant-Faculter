<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    private function getTeacherId(): ?int
    {
        $user = auth()->user();
        if ($user && isset($user->id_enseignant)) {
            return (int) $user->id_enseignant;
        }

        $userId = auth()->id();
        if (!$userId) {
            return null;
        }

        $enseignantId = DB::table('connection_enseignant')
            ->where('id', $userId)
            ->value('id_enseignant');

        return $enseignantId ? (int) $enseignantId : null;
    }

    public function index()
    {
        $teacherId = $this->getTeacherId();

        if (!$teacherId) {
            abort(404, 'Conversation introuvable.');
        }

        $unreadCount = DB::table('messages_enseignant')
            ->where('id_enseignant', $teacherId)
            ->where('envoye_par_enseignant', 0)
            ->where('status', 0)
            ->count();

        $messages = DB::table('messages_enseignant')
            ->where('id_enseignant', $teacherId)
            ->orderBy('created_at')
            ->get();

        $lastMessage = $messages->last();

        return view('messagerie.index', compact('teacherId', 'messages', 'lastMessage', 'unreadCount'));
    }

    public function messages()
    {
        $teacherId = $this->getTeacherId();

        if (!$teacherId) {
            return response()->json([], 404);
        }

        $messages = DB::table('messages_enseignant')
            ->where('id_enseignant', $teacherId)
            ->orderBy('created_at')
            ->get();

        return response()->json($messages);
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $teacherId = $this->getTeacherId();

        if (!$teacherId) {
            return response()->json(['ok' => false], 404);
        }

        DB::table('messages_enseignant')->insert([
            'content' => $request->input('message'),
            'id_enseignant' => $teacherId,
            'envoye_par_enseignant' => 1,
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['ok' => true]);
    }

    public function markRead()
    {
        $teacherId = $this->getTeacherId();

        if (!$teacherId) {
            return response()->json(['ok' => false], 404);
        }

        DB::table('messages_enseignant')
            ->where('id_enseignant', $teacherId)
            ->where('envoye_par_enseignant', 0)
            ->update(['status' => 1]);

        return response()->json(['ok' => true]);
    }
}
