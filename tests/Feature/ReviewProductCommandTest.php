<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ReviewProductCommandTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $output = [
            'total_reviews'   => 66,
            'average_ratings' => 2.9,
            '5_star'          => 8,
            '4_star'          => 14,
            '3_star'          => 20,
            '2_star'          => 14,
            '1_star'          => 10,
        ];

        /** debug */
        // Artisan::call('review:product', ['productId' => 1]);
        // $json = Artisan::output();
        // dd($json);
        /** end debug */

        $result = $this->artisan('review:product', ['productId' => 1]);
        $result->expectsOutput(collect($output)->toJson());
    }
}
