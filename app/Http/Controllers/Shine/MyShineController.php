<?php

namespace App\Http\Controllers\Shine;

use App\Models\User;
use App\Models\Import;
use App\Models\Shine;
use App\Models\MyShine;
use App\Models\QueueName;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CompanyDetail;
use App\Jobs\ImportProductJob;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyShineController extends Controller
{
    public function my_shine()
    {
        $user = auth()->user();
        if ($user->hasRole(User::ROLE_BUYER)) {
            $shineProducts = MyShine::where('user_id', $user->id)->get();
            return view('dashboard.buyer.my_shine', compact('shineProducts'));
        }
    }

    public function new_shine()
    {
        if (auth()->user()->hasRole(User::ROLE_BUYER)) {
            return view('dashboard.buyer.new_shine');
        }
    }

    public function addShine(Request $request) {
        $shineProducts = [];
        $userId = auth()->id(); // Get the currently authenticated user's ID
    
        $batchIds = $request->input('batchid');
        $requestNos = $request->input('request_no');
        $productNames = $request->input('product_name');
        $platforms = $request->input('platform');
        $productLinks = $request->input('product_link');
        $productIds = $request->input('product_id');
        $sellerNames = $request->input('seller_name');
        $searchTerms = $request->input('search_term');
        $amounts = $request->input('amount');
        $feedbackTitles = $request->input('feedback_title');
        $reviewRatings = $request->input('review_rating');
        $feedbackComments = $request->input('feedback_comment');
        $statuses = $request->input('status', array_fill(0, count($requestNos), 1));
    
        foreach ($requestNos as $index => $requestNo) {
            $shineProducts[] = [
                'user_id' => $userId,
                'batch_id' => $batchIds[$index],
                'request_no' => $requestNos[$index],
                'name' => $productNames[$index],
                'platform' => $platforms[$index],
                'url' => $productLinks[$index],
                'product_id' => $productIds[$index],
                'seller_name' => $sellerNames[$index],
                'search_term' => $searchTerms[$index],
                'amount' => $amounts[$index],
                'feedback_title' => $feedbackTitles[$index],
                'review_rating' => $reviewRatings[$index],
                'feedback_comment' => $feedbackComments[$index],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    
        try {
            MyShine::insert($shineProducts);
    
            return response()->json([
                'success' => true,
                'data' => $shineProducts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error adding shine products: ' . $e->getMessage()
            ], 500);
        }
    }
    

}
