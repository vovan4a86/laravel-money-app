<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class MyTest extends TestCase {
    /**
     * A basic feature test /.
     *
     * @return void
     */
    public function test_basic_request() {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Get all payments.
     *
     * @return void
     */
    public function test_get_all() {
        $response = $this->getJson('/api/payments');
        $response->assertStatus(200);
    }

    /**
     * Get all payments.
     *
     * @return void
     */
    public function test_get_one() {
        $response = $this->getJson("/api/payments/1");
        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('id', 1)
                 ->where('amount', 20000)
            ->etc()
        );
    }

    /**
     * Get all payments.
     *
     * @return void
     */
    public function test_create_one() {
        $response = $this->postJson("/api/payments", [
            'is_income' => 1,
            'type_id' => 2,
            'amount' => 250,
            'comment' => 'Json making',
        ]);
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id',
            'is_income',
            'type_id',
            'amount',
            'comment',
            'created_at',
            'updated_at'
        ]);
    }
    /**
     * Get all payments.
     *
     * @return void
     */
    public function delete_one() {
        $response = $this->deleteJson("/api/payments/10");
        $response->assertStatus(204);
    }
}
