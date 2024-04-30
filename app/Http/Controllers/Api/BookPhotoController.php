<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookPhoto;
use App\Traits\Base64Decodable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\Response;

class BookPhotoController extends Controller
{
    use Base64Decodable;

    public function index()
    {
        return BookPhoto::all();
    }

    public function storeFile(Request $request)
    {

        BookPhoto::create([
            'uri' => $request->file('photo')->store('books', 'public'),

            'book_id' => $request->book_id,

        ]);
        return response()->json(['Imagen agregado al Libro']);

    }

    public function storeBase64(Request $request)
    {
        return BookPhoto::create([
            'uri' => $this->saveImage($request->uri, 'books', Str::uuid()),
            'book_id' => $request->book_id,
        ]);
    }
}
