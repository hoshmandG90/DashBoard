<?php namespace App\Http\Controllers\Admin;

use Livewire\Component;
use App\Models\transactions;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionsExport;
use Illuminate\support\Carbon;

class Dashboard extends Component {
    use WithPagination;
    public $search;
    public $ShowFilter=false;
    public $SortField='title';
    public $sortDirection="asc";
    protected $queryString=['search'];


    public $selected=[];
    public $selectedPageRow=false;
    public $filters=[ 
    'status'=>'',
    'date-min'=>null,
    'date-max'=>null,
    ];


    public $PerPages=5;
    public function SortBy($field, $sort) {

        if($sort==$this->sortDirection) {
            $this->sortDirection='desc';
        }
        else {
            $this->sortDirection='asc';
        }

        $this->SortField=$field;
    }

    public function updatedSelectedPageRow($value) {
        // If you selected Row 
        if($value) {
            $this->selected=$this->transactions->pluck('id')->map(function($id) {
                    return (string)$id;
                }

            );
        }

        else {
            $this->reset(['selected', 'selectedPageRow']);
        }
    }

    public function deleteSelected() {
        // Delete Row and assigned By Selectable
        transactions::destroy($this->selected);
    }


    public function ExportSelected() {
      
        return (new TransactionsExport($this->selected))->download('Transactions.xls');

    }


    public function ResetFilters() {
        // Reset All Filter when you selected Some Feature
        $this->reset(['filters']);
    }

    public function getTransactionsProperty() {
        // Get all Properties from Transactions
        return transactions::search($this->search)
        ->where('status','LIKE','%'.$this->filters['status'].'%')
        ->OrderBy($this->SortField, $this->sortDirection)
        ->paginate($this->PerPages);
    }

    public function render() {

      $transactions=$this->transactions;
      return view('admin.dashboard', compact('transactions'))->extends('layouts.master');
    }
}
