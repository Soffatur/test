<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ReviewSummaryCommandTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $output = [
            'total_reviews'   => 500,
            'average_ratings' => 2.9,
            '5_star'          => 62,
            '4_star'          => 117,
            '3_star'          => 126,
            '2_star'          => 123,
            '1_star'          => 72,
        ];

        /** debug */
        // Artisan::call('review:summary');
        // $json = Artisan::output();
        // dd($json);
        /** end debug */

        $result = $this->artisan('review:summary');
        $result->expectsOutput(collect($output)->toJson());
    }
}
