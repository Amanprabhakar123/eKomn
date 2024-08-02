<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueueName extends Model
{
    use HasFactory;

    const ProductBulkUpload = 'product_bulk_upload';
    const AssignShineJob = 'assign_shine_job';
}
