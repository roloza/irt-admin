<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IconsController extends Controller {

    /**
     * Affiche le svg dont le nom est passé en paramètre
     * @param mixed $img 
     * @return void
     */
    public function Icon($img) {
        return file_get_contents(public_path('assets' . DIRECTORY_SEPARATOR . 'icons'. DIRECTORY_SEPARATOR . $img. '.svg'));
    }


    /**
     * Icons
     *
     * @return void
     */
    public function Icons() {
        //dd(public_path('assets' . DIRECTORY_SEPARATOR . 'icons'));
        $files = File::files(public_path('assets' . DIRECTORY_SEPARATOR . 'icons'));
        $results = [];
        foreach ($files as $file) {
            $results[] = str_replace('.svg', '', $file->getFilename());
        }

        return response()->json(['files' => $results]);
    }
}