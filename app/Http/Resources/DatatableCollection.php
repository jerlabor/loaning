<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DatatableCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'columns' => [
                [
                    'label' => 'Released',
                    'field' => 'release_date',
                    'sort' => 'asc'
                ],
                [
                    'label' => 'Loan#',
                    'field' => 'id',
                    'sort' => 'asc'
                ],
                [
                    'label' => 'Maturity',
                    'field' => 'maturity_date',
                    'sort' => 'asc'
                ],
                [
                    'label' => 'Principal',
                    'field' => 'principal_amount',
                    'sort' => 'asc'
                ],
                [
                    'label' => 'Due',
                    'field' => 'due',
                    'sort' => 'asc'
                ],
                [
                    'label' => 'Paid',
                    'field' => 'name',
                    'sort' => 'asc'
                ],
                [
                    'label' => 'Balance',
                    'field' => 'name',
                    'sort' => 'asc'
                ],
                [
                    'label' => 'Last Payment',
                    'field' => 'name',
                    'sort' => 'asc'
                ]
            ],
            'rows' => $this->collection
        ];
    }
}
