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

    public function update(Request $request , $id)
    {
        $productDeatails = ProductDetails::find($id);

        $productDeatails->name = $request->input('name');
        $productDeatails->description = $request->input('description');
        $productDeatails->price = $request->input('price');
        $productDeatails->image = $request->input('image');
        $productDeatails->discount = $request->input('discount');
    $productDeatails->save();
        $product = ProductDetails::find($id);
        $product->productPhotoAndReview()->delete();

        $productPhoto = $request->input('otherImage');

        $upsatedProduct = $product->productPhotoAndReview()->createMany($productPhoto);

        return $upsatedProduct;

    }
    public function delete($id)
    {
        ProductDetails::where('id','=',$id)->delete();

        return "product delete successfully";
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
