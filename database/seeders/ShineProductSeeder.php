<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShineProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shine_products')->insert([
            [
                'batch_id' => 'AB4362',
                'request_no' => 'AB43621',
                'name' => 'Product 1',
                'platform' => 'Platform A',
                'url' => 'http://example.com/product1',
                'product_id' => 'PROD001',
                'seller_name' => 'Seller A',
                'search_term' => 'Search Term 1',
                'amount' => 99.99,
                'feedback_title' => 'Good Product',
                'feedback_comment' => 'Good',
                'review_rating' => '4',
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'batch_id' => 'AB4363',
                'request_no' => 'AB43631',
                'name' => 'Product 2',
                'platform' => 'Platform B',
                'url' => 'http://example.com/product2',
                'product_id' => 'PROD002',
                'seller_name' => 'Seller B',
                'search_term' => 'Search Term 2',
                'amount' => 149.99,
                'feedback_title' => 'Batter Product',
                'feedback_comment' => 'Batter',
                'review_rating' => '4',
                'status' => 'Completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'batch_id' => 'AB4364',
                'request_no' => 'AB43641',
                'name' => 'Product 3',
                'platform' => 'Platform C',
                'url' => 'http://example.com/product3',
                'product_id' => 'PROD003',
                'seller_name' => 'Seller C',
                'search_term' => 'Search Term 3',
                'amount' => 199.99,
                'feedback_title' => 'Best Product',
                'feedback_comment' => 'Best',
                'review_rating' => '4',
                'status' => 'Completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more product data as needed
        ]);
    }
}
