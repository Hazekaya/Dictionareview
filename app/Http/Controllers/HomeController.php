<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Image;


class HomeController extends Controller
{
    public function index()
    {
        $images = Image::all();

        return view('home', [
            'images' => $images
        ]);
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);

        $image = $request->file('newimage');
        $originalName = $image->getClientOriginalName();

        $path = $image->storeAs('images', $originalName, 'public');
        $url = Storage::url('images/' . $originalName);

        $realUrl = url('/') . $url;

        $image = new Image();
        $image->name = $originalName;
        $image->information = 'Bullshit';
        $image->url = $realUrl;
        $user->images()->save($image);
        $image->save();

        return redirect(route('home'));
    }
}
