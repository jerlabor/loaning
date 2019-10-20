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
            'columns' => $this->generateColumns($request->path()),
            'rows' => $this->collection
        ];
    }

    private function generateColumns($request_path){
        $model_name = get_class($this->collection->first());

        switch (true){
            case $model_name === 'App\Loan':
                $columns = [
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
                        'field' => 'asd',
                        'sort' => 'asc'
                    ],
                    [
                        'label' => 'Balance',
                        'field' => 'asd',
                        'sort' => 'asc'
                    ],
                    [
                        'label' => 'Last Payment',
                        'field' => 'asd',
                        'sort' => 'asc'
                    ],
                    [
                        'label' => 'Action',
                        'field' => 'action_buttons',
                    ],

                ];

                if($request_path === 'api/loans'){
                    array_unshift($columns,[
                        'label' => 'Name',
                        'field' => 'full_name',
                        'sort' => 'asc'
                    ]);
                }
                break;
            case $model_name === 'App\Borrower':
                $columns = [
                    [
                        'label' => 'Full Name',
                        'field' => 'full_name',
                        'sort' => 'asc'
                    ],
                    [
                        'label' => 'Mobile',
                        'field' => 'contact_num',
                        'sort' => 'asc'
                    ],
                    [
                        'label' => 'Total Paid',
                        'field' => 'total_paid',
                        'sort' => 'asc'
                    ],
                    [
                        'label' => 'Open Loans Balance',
                        'field' => 'open_loan_balance',
                        'sort' => 'asc'
                    ],
                ];
                break;
            default:
                $columns = [];
        }
        return $columns;

    }
}
