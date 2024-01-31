<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $lat = 23.03;
        $long = 72.56;
        $maxDistance = 10;

        $stores = DB::table('stores')
        ->select([
            'stores.id',
            'stores.title',
            'stores.address',
            DB::raw("6371 * acos(cos(radians(" . $lat . ")) * cos(radians(stores.latitude)) * cos(radians(stores.longitude) - radians(" . $long . ")) + sin(radians(" . $lat . ")) * sin(radians(stores.latitude))) as distance")
        ])
        ->whereRaw("6371 * acos(cos(radians(" . $lat . ")) * cos(radians(stores.latitude)) * cos(radians(stores.longitude) - radians(" . $long . ")) + sin(radians(" . $lat . ")) * sin(radians(stores.latitude))) <= ?", [$maxDistance])
        ->orderBy('distance', 'asc')
        ->get();
        // dd($stores);


        return view('index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
