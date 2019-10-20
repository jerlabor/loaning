<?php

namespace App\Http\Controllers;

use App\Borrower;
use App\Http\Resources\DatatableCollection;
use App\Loan;
use App\Pension;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;
use Yajra\DataTables\Facades\DataTables;

class DatatablesController extends Controller
{

    public function __construct()
    {
        Resource::withoutWrapping();
    }

    public function getRouteKeyName()
    {
        return 'pension';
    }

    public function loansByPension(Pension $id){

        $loans =  $id->loans()->get()->map(function ($item) {
            return $item->append('action_buttons');
        });


        return new DatatableCollection($loans);
    }

    public function borrowers(){

        $borrowers = Borrower::all();


        return new DatatableCollection($borrowers);
    }

    public function loans(){

        $loans = Loan::all();


        return new DatatableCollection($loans);
    }
}
