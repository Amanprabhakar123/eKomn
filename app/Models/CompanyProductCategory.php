<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'product_category_id'
    ];

    public function companyDetails()
    {
        return $this->belongsTo(CompanyDetail::class, 'company_id', 'id');
    }
}
