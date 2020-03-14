<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function dashboard(Inventory $inventory)
    {
        $count = $inventory->count();

        return view('dashboard',compact('count'));
    }
}