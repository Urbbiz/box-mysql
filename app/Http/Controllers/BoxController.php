<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;


/*
$box Modelio objektas. vienas daiktas sukurtas is modelio klases/ eilute DB
$boxes Objektas-kolekcija. Visu box rinkinys. /visa lentele boxes
'box' stringas naudojamas vardams arba urlams sudaryti
Boxes tokio daikto nera
Box modelio klases vardas, tas kuris yra sukuriamas komanda make:model Box
*/

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boxes = Box::all(); // visos dezes

        $boxes = $boxes->sortByDesc('id'); // https://laravel.com/docs/8.x/collections

        //objektas-kolekcija
        
        return view('box.index', ['boxes' => $boxes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('box.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $box = new Box; //<--- MOdelis abstraktus kodas/objektas
        $box->bananas = $request->bananas_in_box;
        // DB bananas             formos name
        $box->save(); // <---- MOdelis irasomas i DB
        return redirect()->route('box.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function show(Box $box)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function edit(Box $box)
    {
        return view('box.edit', ['box' => $box]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Box $box)
    {
        $box->bananas = $request->bananas_in_box;
        // DB bananas             formos name
        $box->save(); // <---- MOdelis irasomas i DB
        return redirect()->route('box.index');
    }


    public function add(Box $box)
    {
        return view('box.add', ['box' => $box]);
    }

    public function addToBox(Request $request, Box $box)
    {
        $box->bananas = $box->bananas + $request->add;
        // DB bananas             formos name
        $box->save(); // <---- MOdelis irasomas i DB
        return redirect()->route('box.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function destroy(Box $box)
    {
        $box->delete();
        return redirect()->route('box.index');
    }
}