<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\MyShine;
use App\Models\ShineProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AssignShineJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $product;

    public function __construct(ShineProduct $product)
    {
        $this->product = $product;
    }

    public function handle()
    {
        // Check if this product has already been assigned
        if ($this->product->assigner_id) {
            return; // Product is already assigned
        }

        // Attempt to find a matching product
        $matchingProduct = ShineProduct::where('amount', $this->product->amount)
            ->where('status', ShineProduct::STATUS_PENDING)
            ->where('id', '!=', $this->product->id)
            ->where('user_id', '!=', $this->product->user_id)
            ->first();

        if ($matchingProduct) {
            // Assign the matching product's user_id to the current product's assigner_id
            $this->product->assigner_id = $matchingProduct->user_id;
            $this->product->status = ShineProduct::STATUS_INPROGRESS;
            $this->product->save();

            // Assign the current product's user_id to the matching product's assigner_id
            $matchingProduct->assigner_id = $this->product->user_id;
            $matchingProduct->status = ShineProduct::STATUS_INPROGRESS;
            $matchingProduct->save();
        } else {
            // If no matching product is found, check the elapsed time
            if (now()->diffInHours($this->product->created_at) > 48) {
                $this->product->status = ShineProduct::STATUS_CANCELLED;
                $this->product->save();
            } else {
                // Re-dispatch the job to run after a delay
                self::dispatch($this->product)->delay(now()->addMinutes(10)); // Retry after 10 minutes
            }
        }
    }
}
