<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('home', ['events'=>$events]) ;
    } 
    
    public function search($search)
    {
        dd($search);
    
        $events = Event::where('title', 'like', '%'.$search.'%')->get();
        return view('home', ['events'=>$events]) ;
    }
}