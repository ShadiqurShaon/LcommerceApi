<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $guarded = [];

    public function productPhotoAndReview()
    {
        return $this->hasMany(ProductPhotosAndReviews::class);

    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
