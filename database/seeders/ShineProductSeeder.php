<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShineProductSeeder extends Seeder
{
    public function run()
    {
        // Retrieve a valid user ID (make sure you have users in the users table)
        $userId = DB::table('users')->first()->id;

        DB::table('shine_products')->insert([
            [
                'amount' => 99.99,
                'batch_id' => 'AB4362',
                'created_at' => Carbon::now(),
                'feedback_comment' => 'Good',
                'feedback_title' => 'Good Product',
                'name' => 'Product 1',
                'platform' => 'Platform A',
                'product_id' => 'PROD001',
                'request_no' => 'AB43621',
                'review_rating' => 4,
                'search_term' => 'Search Term 1',
                'seller_name' => 'Seller A',
                'status' => 'Pending',
                'updated_at' => Carbon::now(),
                'url' => 'http://example.com/product1',
                'user_id' => $userId, // Ensure you set the user_id
            ],
            [
                'amount' => 149.99,
                'batch_id' => 'AB4363',
                'created_at' => Carbon::now(),
                'feedback_comment' => 'Better',
                'feedback_title' => 'Better Product',
                'name' => 'Product 2',
                'platform' => 'Platform B',
                'product_id' => 'PROD002',
                'request_no' => 'AB43631',
                'review_rating' => 4,
                'search_term' => 'Search Term 2',
                'seller_name' => 'Seller B',
                'status' => 'Completed',
                'updated_at' => Carbon::now(),
                'url' => 'http://example.com/product2',
                'user_id' => $userId, // Ensure you set the user_id
            ],
            [
                'amount' => 199.99,
                'batch_id' => 'AB4364',
                'created_at' => Carbon::now(),
                'feedback_comment' => 'Best',
                'feedback_title' => 'Best Product',
                'name' => 'Product 3',
                'platform' => 'Platform C',
                'product_id' => 'PROD003',
                'request_no' => 'AB43641',
                'review_rating' => 4,
                'search_term' => 'Search Term 3',
                'seller_name' => 'Seller C',
                'status' => 'Completed',
                'updated_at' => Carbon::now(),
                'url' => 'http://example.com/product3',
                'user_id' => $userId, // Ensure you set the user_id
            ],
        ]);
    }
}
