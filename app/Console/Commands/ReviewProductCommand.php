<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ReviewProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'review:product {productId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reviews = json_decode(file_get_contents(public_path('json/reviews.json'), true));
        $star1 = 0;
        $star2 = 0;
        $star3 = 0;
        $star4 = 0;
        $star5 = 0;
        $count = 0;

        foreach($reviews as $review){
            // check product_id
            if($review->product_id == $this->argument('productId')){
                $count += 1;
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
        }

        $average = ((1*$star1) + (2*$star2) + (3*$star3) + (4*$star4) + (5*$star5)) / ($star1+$star2+$star3+$star4+$star5);

        $output = [
            'total_reviews' => $count,
            'average_ratings' => round($average, 1),
            '5_star'          => $star5,
            '4_star'          => $star4,
            '3_star'          => $star3,
            '2_star'          => $star2,
            '1_star'          => $star1,
        ];

        $this->info(json_encode($output));
    }
}
