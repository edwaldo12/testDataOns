<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use App\Http\Requests\StoreDistributorRequest;
use App\Http\Requests\UpdateDistributorRequest;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributors = Distributor::all();
        return view('distributor.index', compact('distributors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distributor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDistributorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistributorRequest $request)
    {
        $request->validate([
            'distributor_name' => "required",
            'city' => "required",
            'state' => "required",
            'country' => "required",
            'phone' => "required",
            'email' => "required",
        ]);

        $distributor = new Distributor();
        $distributor->name = $request->distributor_name;
        $distributor->city = $request->city;
        $distributor->state = $request->state;
        $distributor->country = $request->country;
        $distributor->phone = $request->phone;
        $distributor->email = $request->email;
        Session::flash('store_distributor', $distributor->save());
        return to_route('distributors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distributor = Distributor::find($id);
        return view('distributor.edit', compact('distributor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDistributorRequest  $request
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $distributor = Distributor::findOrFail($id);
        $request->validate([
            'distributor_name' => "required",
            'city' => "required",
            'state' => "required",
            'country' => "required",
            'phone' => "required",
            'email' => "required",
        ]);

        $distributor->name = $request->distributor_name;
        $distributor->city = $request->city;
        $distributor->state = $request->state;
        $distributor->country = $request->country;
        $distributor->phone = $request->phone;
        $distributor->email = $request->email;
        Session::flash('update_distributor', $distributor->save());
        return to_route('distributors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        //
    }
}
