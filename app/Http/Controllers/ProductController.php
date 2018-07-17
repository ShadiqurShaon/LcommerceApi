<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\ProductDetails;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index($category)
    {

        $productdetails = ProductCategory::where('category_name','=',$category)->with('productDetails')->get();

        if(isset($productdetails)){

            return $productdetails[0]->productDetails;
        }
        return "no product fount";
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

            $productDetails = $productCategory->productDetails()->save($productDetails);



            $productDetails->productPhotoAndReview()->createMany($product["otherImage"]);


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

    public function productById($id)
    {

        $productDetails = ProductDetails::where('id','=',$id)->with('productPhotoAndReview')->get();

        if(isset($productDetails)){

            return response()->json($productDetails[0]);
        }else{
            return "product not found";
        }
    }

}
