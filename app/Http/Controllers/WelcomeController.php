<?php

namespace App\Http\Controllers;

use App\Models\Cover;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class WelcomeController extends Controller
{
    use WithPagination;
    public function index()
    {
       $covers=Cover::where('is_active',true)
        ->whereDate('start_at','<=',now())//donde la fecha star es menor o igual a la fecha actual
        ->where(function($query){
            $query->whereDate('end_at','>=',now())//donde la fecha final es mayor o igual a la fecha actual o
            ->orWhereNull('end_at');//donde la fecha final es tenga null
        })       
       ->get();

       $lasProducts=Product::orderBy('created_at','desc')
       ->paginate(12);

        // return $covers;
         return view('welcome',compact('covers','lasProducts'));
    }
}
