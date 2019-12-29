<?php

namespace App\Http\Controllers\API;

use App\Brand;
use App\Count;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IconsController;

class ApiBrandController extends Controller
{
    public function index()
    {
        $iconController = new IconsController();
        $brands = Brand::with('counts')->get();
        foreach( $brands as $k => $brand) {
            $brand->imageLabel = $brand->image;
            $brand->image = $iconController->Icon($brand->image);
        }
        $errors = null;
        return response()->json([
            'errors' => $errors,
            'data' => $brands
        ]);
    }    

    public function byCounts ()
    {
        $iconController = new IconsController();
        $brandsByCategories = [];
        //$counts = Count::get();
        $brands = Brand::with('counts')->get();
        foreach ($brands as $brand) {
            foreach ($brand->counts as $count) {
                $brandCat = [
                    'id' => $brand->id,
                    "title" => $brand->title,
                    "slug" => $brand->slug,
                    "content" => $brand->content,
                    "url" => $brand->url,
                    "type" => $brand->type,
                    "imageLabel" => $brand->image,
                    "image" => $iconController->Icon($brand->image),
                    "color" => $brand->color,
                    "position" => $brand->position,
                    "status" => $brand->status,
                    "created_at" => $brand->created_at,
                    "updated_at" => $brand->updated_at,
                    'count' => $count
                ];
                $brandsByCategories[$count->slug][] = $brandCat;
            }
        }
        $errors = null;
        return response()->json([
            'errors' => $errors,
            'data' => $brandsByCategories
        ]);
    }

    public function categories() 
    {
        $counts = Count::select('title','slug')->distinct()->get();
        $errors = null;
        return response()->json([
            'errors' => $errors,
            'data' => $counts
        ]);
    }
}
