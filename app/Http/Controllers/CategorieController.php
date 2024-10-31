<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Subcategory;
use App\Models\ShopDetails;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{


    public function getSubcategories()
    {

        $categories = Categorie::with('subcategories')->get();

     /* $categories = Categorie::with(['subcategories' => function($query) {
        $query->select('category_id','subcategoryname'); // Include 'categorie_id' for the relation
      }])->select('id', 'categoriesname')->get(); */

        return response()->json(['data' => $categories]); 
    }

    public function Addshopdetailsdata(Request $request)
    {

        $validator = validator::make($request->all(),[
            'shoplogo' => 'required',
            'name' => 'required',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'websitelink' => 'nullable|url',
            'pincode' => 'required',
            'state' => 'required',
            'city' => 'required|string|max:255',
            'nearbylandmark' => 'required',
        ]);


        if($validator->passes())
        {

            $query = ShopDetails::max('shop_id') ?? 0;
            $ShopId = $query + 1;
    
            $shopdetails = ShopDetails::create([
                'shop_id'=>$ShopId,
                'subscriber_id'=>$request->subscriber_id,
                'shoplogo'=>$request->shoplogo,
                'name'=>$request->name,
                'phone'=>$request->phone,
                'websitelink'=>$request->websitelink,
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'pincode'=>$request->pincode,
                'state'=>$request->state,
                'city'=>$request->city,
                'buildingnumber'=>$request->buildingnumber,
                'arearoadname'=>$request->arearoadname,
                'nearbylandmark'=>$request->nearbylandmark,
            ]);
    
            return response()->json([
                'success'=>'Shop added successfully',
            ], 200);

        }
        else
        {

            return response()->json([
                'status' => false,
                'values' => 'validationfails',
                'errors' => $validator->errors()
            ]); 

        }

       

    }
}
