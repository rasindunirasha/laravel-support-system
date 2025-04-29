<?php

namespace Tests\Feature\API\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Ticket;

class TicketsTest extends TestCase


{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get(uri: '/');

        $response->assertStatus(200);

        
    }

    public function test_create_new_ticket()
{
    $response = $this->withHeaders([
        'Accept' => 'application/json',
    ])->post('/api/v1/tickets', [
        'customer_name' => 'Jasper Jorden',
        'email' => 'jasper@gmail.com',
        'phone' => '+112233445566',
        'description' => 'There is something wrong with my computer',
    ]);

    $response->assertStatus(200);
    $response->assertJson([
        'data' => [
            'email' => 'jasper@gmail.com',
        ]
    ]);
    
}

public function test_get_all_tickets()
{
    Ticket::create([
        'customer_name' => 'User One',
        'email' => 'user1@example.com',
        'phone' => '123',
        'description' => 'Issue 1',
        'ref' => 'ref1',
        'status' => 0,
    ]);

    
    $response = $this->getJson('/api/v1/tickets');

    $response->assertStatus(200);
    $response->assertJsonCount(1, 'data');
}


    
}
