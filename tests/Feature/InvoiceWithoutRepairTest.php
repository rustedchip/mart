<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Customer;
use App\Models\Invoice;
use Tests\TestCase;

class InvoiceWithoutRepairTest extends TestCase
{
    public function testRepairsRouteReturnsNotFound()
    {
        $user = User::first() ?? User::create([
            'name' => 'admin',
            'email' => 'test_admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'active' => 'yes',
        ]);

        $response = $this->actingAs($user, 'sanctum')->getJson('/api/v1/repairs');
        $response->assertStatus(404);
    }

    public function testInvoiceCanBeCreatedWithoutRepair()
    {
        $user = User::first() ?? User::create([
            'name' => 'admin',
            'email' => 'test_admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'active' => 'yes',
        ]);

        $response = $this->actingAs($user, 'sanctum')->postJson('/api/v1/invoices', []);
        $response->assertStatus(201);
        $invoiceId = $response->json('data.invoice.id');
        $this->assertNotNull($invoiceId);

        $showResponse = $this->actingAs($user, 'sanctum')->getJson("/api/v1/invoices/{$invoiceId}");
        $showResponse->assertStatus(200);
        $this->assertArrayNotHasKey('repairs', $showResponse->json('data'));
    }
}
