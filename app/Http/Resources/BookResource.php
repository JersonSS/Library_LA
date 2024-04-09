<?php

namespace App\Http\Resources;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'author_id'=> $this->author_id,
            'author'=>$this->author->name,
            'genres'=>$this->genres->map(function ($genre){
                return [
                    'id'=>$genre->id,
                    'name'=>$genre->name_genre
                ];
            })
        ];
    }
}



