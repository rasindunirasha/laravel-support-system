<?php
namespace Tests\Feature\API\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User; // Assuming you have an Agent user model
use App\Models\Ticket;

class SupportAgentTest extends TestCase
{
    use RefreshDatabase;

    public function test_agent_can_view_assigned_tickets()
    {
        $agent = User::factory()->create(['role' => 'agent']);
        $this->actingAs($agent, 'sanctum');

        $response = $this->getJson('/api/v1/agent/tickets');

        $response->assertStatus(200);
    }

    public function test_agent_can_update_ticket_status()
    {
        $agent = User::factory()->create(['role' => 'agent']);
        $ticket = Ticket::factory()->create();
        $this->actingAs($agent, 'sanctum');

        $response = $this->putJson("/api/v1/tickets/{$ticket->id}/status", [
            'status' => 'in-progress',
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'data' => [
                         'status' => 'in-progress',
                     ]
                 ]);
    }

    public function test_agent_can_view_ticket_details()
    {
        $agent = User::factory()->create(['role' => 'agent']);
        $ticket = Ticket::factory()->create();
        $this->actingAs($agent, 'sanctum');

        $response = $this->getJson("/api/v1/tickets/{$ticket->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'data' => [
                         'id' => $ticket->id,
                     ]
                 ]);
    }

    public function test_agent_can_add_note_to_ticket()
    {
        $agent = User::factory()->create(['role' => 'agent']);
        $ticket = Ticket::factory()->create();
        $this->actingAs($agent, 'sanctum');

        $response = $this->postJson('/api/v1/notes', [
            'ticket_id' => $ticket->id,
            'note' => 'Checked logs, found the issue.',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'data' => [
                         'note' => 'Checked logs, found the issue.',
                     ]
                 ]);
    }
}
