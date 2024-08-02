<?php

namespace App\Http\Controllers\Shine;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShineProduct;
use App\Models\MyShine;

class ShineController extends Controller
{
    public function shine()
    {
        if (auth()->user()->hasRole(User::ROLE_ADMIN)) {
            return view('dashboard.admin.shine');
        }
    }
    public function dshine()
    {
        $user = auth()->user();
        if ($user->hasRole(User::ROLE_ADMIN)) {
            $shineProducts = Shine::where('user_id', $user->id)->get();
            // return view('dashboard.buyer.my_shine', compact('shineProducts'));
            $assignedProducts = ShineProduct::with('review')->where('assigner_id', $user->id)->get();
            return view('dashboard.buyer.my_shine', compact('shineProducts', 'assignedProducts'));
        }
    }
}
