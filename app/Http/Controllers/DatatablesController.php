<?php

namespace App\Http\Controllers;

use App\Http\Resources\DatatableCollection;
use App\Loan;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;
use Yajra\DataTables\Facades\DataTables;

class DatatablesController extends Controller
{

    public function __construct()
    {
        Resource::withoutWrapping();
    }

    public function loans(){
        return new DatatableCollection(Loan::all());
    }
}
