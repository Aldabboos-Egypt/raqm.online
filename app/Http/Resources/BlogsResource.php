<?php

namespace App\Http\Resources;

class BlogsResource extends PaginationCollection
{

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return $this->resource;
        return [
            'data' => $this->collectionData(),
            'total' => $this->total(),
            'count' => $this->count(),
            'per_page' => $this->perPage(),
            'current_page' => $this->currentPage(),
            'last_page' => $this->lastPage(),
            'total_pages' => $this->lastPage(),
        ];
    }


    public function collectionData()
    {
        return BlogResource::collection($this->collection);
    }

}
