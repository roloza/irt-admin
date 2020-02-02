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

    public function brand($slug)
    {
        $brand = Brand::where(['slug' => $slug])->with('counts')->first();

        $errors = null;
        if ($brand === null) {
            $errors = 'empty';
        } else {
            $iconController = new IconsController();
            $brand->imageLabel = $brand->image;
            $brand->image = $iconController->Icon($brand->image);
        }
        return response()->json([
            'errors' => $errors,
            'data' => $brand
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

    public function menu() 
    {
        $iconController = new IconsController();
        $menuElts = Brand::select(['title', 'slug', 'image'])->where(['status' => 1 ])->get();
        foreach( $menuElts as $k => $menuElt) {
            $menuElt->image = $iconController->Icon($menuElt->image);
        }
        $errors = null;
        return response()->json([
            'errors' => $errors,
            'data' => $menuElts
        ]);
    }
}
