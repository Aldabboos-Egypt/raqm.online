<?php

namespace App\Http\Resources;

class ClinicsResource extends PaginationCollection
{
    private $query;

    public function __construct($resource, $query = null)
    {
        parent::__construct($resource);
        $this->query = $query;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $withPhoneQuery = $this->query ? clone $this->query : null;
        $withoutPhoneQuery = $this->query ? clone $this->query : null;
        // return $this->resource;
        return [
            'data' => $this->collectionData(),
            'total' => $this->total(),
            'count' => $this->count(),
            'per_page' => $this->perPage(),
            'current_page' => $this->currentPage(),
            'last_page' => $this->lastPage(),
            'total_pages' => $this->lastPage(),
            'with_phone' => $withPhoneQuery ? $withPhoneQuery->whereNotNull('clinics.phone')->count() : 0,
            'without_phone' => $withoutPhoneQuery ? $withoutPhoneQuery->whereNull('clinics.phone')->count() : 0,
        ];
    }

    public function collectionData()
    {
        return ClinicResource::collection($this->collection);
    }

}
