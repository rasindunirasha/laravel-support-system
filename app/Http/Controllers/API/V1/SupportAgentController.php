<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class SupportAgentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Return tickets assigned to this support agent
        $tickets = Ticket::where('assigned_to', $user->id)->get();

        return response()->json([
            'tickets' => $tickets
        ], 200);
    }
}
