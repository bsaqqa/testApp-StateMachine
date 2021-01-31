<?php

namespace Tests\Feature;

use App\Models\OrderServices;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Order;

class OrdersTest extends APITestCase
{
    use RefreshDatabase;
    //
    /** @test */
    public function user_can_get_order_details()
    {
        $this->withoutExceptionHandling();
        $order = Order::factory()->create();
        $response = $this->get(self::$APP_URL . "/orders/{$order->id}");
        $response->assertSuccessful();
        $this->assertJsonHasKey($response, 'order');
//        $response->assertExactJson($order->toArray());
    }

    /** @test */
    public function user_can_update_order()
    {
        $this->withoutExceptionHandling();
        $order = Order::factory()->create();
        OrderServices::factory()->create(['order_id'=> $order->id]);
        $order->status = 'pending';
        $response = $this->put(self::$APP_URL . "/orders/{$order->id}", $order->toArray());
        $response->assertSuccessful();
        // TODO: fix it later
//        $response->assertExactJson($order->toArray());
//        $this->assertDatabaseHas('orders', $order->toArray());
        $this->assertEquals($order->status , $response->json('status'));
    }
}
