<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
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
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
             $this->validate($request, [
            'customer_name' => 'required|max:200',
            'email' => 'required|email',
            'phone' => 'required',
            'description' => 'required',
        ]);
    
        
        $ticket = new Ticket();

        $ticket->customer_name = $request->input('customer_name');
        $ticket->email = $request->input('email');
        $ticket->phone = $request->input('phone');
        $ticket->description = $request->input('description');
        $ticket->ref = sha1(time());
        $ticket->status = 0;
    
        if ($ticket->save()) {
            return redirect()->route('tickets.show', $ticket->id)
                ->with('success', 'Your ticket is created successfully. Please write down the reference number to check the ticket status later.');
        }
    
        return redirect()->back()->with('error', 'Oops! Could not create your ticket. Please try later.');
    }
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
