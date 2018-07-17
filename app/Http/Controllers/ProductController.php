<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\ProductDetails;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {

    }
    public function store(Request $request,$category)
    {
        $productCategory = ProductCategory::where('category_name','=',$category)->first();

        $products =  $request->json()->all();

        foreach ( $products as $product){


            $productDetails = new ProductDetails([
                "name"=>$product["name"],
                "description"=>$product["description"],
                "price"=>$product["price"],
                "image"=>$product["image"],
                "discount"=>$product["discount"]

            ]);

            $productCategory->productDetails()->save($productDetails);

            }



//        if(isset($productCategory)){
//
//            $productCategory->productDetails()->save($productDetails);
//        }

        return "Stored successfully";
    }

    public function update()
    {

    }
    public function delete()
    {

    }

}
