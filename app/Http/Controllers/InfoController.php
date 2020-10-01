<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class InfoController extends Controller
{
    public function index($id)
    {
        $image = Image::find($id)->firstOrFail();

        return view('info', [
            'image' => $image,
        ]);
    }
}
