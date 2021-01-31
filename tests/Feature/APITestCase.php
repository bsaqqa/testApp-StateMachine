<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class APITestCase extends TestCase
{
    public static $APP_URL = "/api/v1";

    /**
     * This function used to assert if response json has key
     * @param TestResponse $response
     * @param String $key
     */
    public function assertJsonHasKey(TestResponse $response, string $key): void
    {
        $res_array = json_decode($response->content(), true);
        $this->assertArrayHasKey($key, $res_array);
        $this->assertNotNull($res_array[$key]);
    }

}
