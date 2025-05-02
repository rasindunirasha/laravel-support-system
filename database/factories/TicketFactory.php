<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => 'open',
            'user_id' => \App\Models\User::factory(), // assumes ticket belongs to a user
            'assigned_to' => null, // optional
            
        ];
    }
}
