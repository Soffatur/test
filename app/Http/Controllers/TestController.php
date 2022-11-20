<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function product($id){
        dd($id);
    }

    public function reviews(){
        $reviews = json_decode(file_get_contents(public_path('json/reviews.json'), true));
        $star1 = 0;
        $star2 = 0;
        $star3 = 0;
        $star4 = 0;
        $star5 = 0;
        foreach($reviews as $review){
            // 1_star
            if($review->rating == 1){
                $star1 += 1;
            }
            // 2_star
            if($review->rating == 2){
                $star2 += 1;
            }
            // 3_star
            if($review->rating == 3){
                $star3 += 1;
            }
            // 4_star
            if($review->rating == 4){
                $star4 += 1;
            }
            // 5_star
            if($review->rating == 5){
                $star5 += 1;
            }
        }

        $average = ((1*$star1) + (2*$star2) + (3*$star3) + (4*$star4) + (5*$star5)) / ($star1+$star2+$star3+$star4+$star5);

        $output = [
            'total_reviews' => count($reviews),
            'average_ratings' => round($average, 1),
            '5_star'          => $star5,
            '4_star'          => $star4,
            '3_star'          => $star3,
            '2_star'          => $star2,
            '1_star'          => $star1,
        ];

        $payload = ['status' => 'success', 'data' => $output];

        return response()->json($payload, 200);
    }
}
