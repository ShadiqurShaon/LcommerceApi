<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhotosAndReviews extends Model
{
    protected $guarded = [];

    public function productDetails()
    {
        return $this->belongsTo(ProductDetails::class);
    }
}
