<?php

namespace App\Http\Controllers\API;

use App\Brand;
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
            'erros' => $errors,
            'data' => $brands
        ]);
    }    
}
