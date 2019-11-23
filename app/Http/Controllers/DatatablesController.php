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
        $q = request()->query('q');
        $sortBy = request()->query('sortBy');
        $sortDesc = request()->query('sortDesc');

        $borrowers = Borrower::withCount('loans')->when($q,function ($query,$q){
            return $query->whereRaw("CONCAT_WS(' ',first_name,middle_name,last_name) LIKE '%{$q}%'");
        })->when($sortBy,function ($query,$sortBy) use ($sortDesc){
            $sort = $sortDesc === 'true' ? 'desc' : 'asc';
            if($sortBy === 'full_name'){
                return $query->orderByRaw("CONCAT_WS(' ',first_name,middle_name,last_name) {$sort}");
            }
            return $query->orderBy($sortBy,$sort);
        })->latest()->paginate(10);
        return new DatatableCollection($borrowers);
    }

    public function loans(){
        $pension_id = request()->query('pension_id');
        $borrower = request()->query('borrower');
        $loans = Loan::with(['pension','repaymentSummary','borrower'])
            ->when($pension_id,function($query,$pension_id){
                return $query->wherePensionCode($pension_id);
            })
            ->when($borrower,function($query,$borrower){
                return $query->whereBorrowerId($borrower);
            })
            ->latest()->paginate(10);
        return new DatatableCollection($loans);
    }
}
