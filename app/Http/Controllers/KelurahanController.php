<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Http\Requests\UpdateKelurahanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelurahan = Kelurahan::all();
        return view('kelurahan.index', compact('kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelurahan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKelurahanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelurahan' => "required",
            'nama_kecamatan' => "required",
            'nama_kota' => "required",
        ]);

        $kelurahan = new Kelurahan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->nama_kecamatan = $request->nama_kecamatan;
        $kelurahan->nama_kota = $request->nama_kota;
        Session::flash('store_kelurahan', $kelurahan->save());
        return to_route('kelurahan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelurahan = Kelurahan::find($id);
        return view('kelurahan.edit', compact('kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKelurahanRequest  $request
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $kelurahan = Kelurahan::findOrFail($id);
        $request->validate([
            'nama_kelurahan' => "required",
            'nama_kecamatan' => "required",
            'nama_kota' => "required",
        ]);

        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->nama_kecamatan = $request->nama_kecamatan;
        $kelurahan->nama_kota = $request->nama_kota;
        Session::flash('update_kelurahan', $kelurahan->save());
        return to_route('kelurahan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        Session::flash('destroy_kelurahan', $kelurahan->delete());
        return to_route('kelurahan.index');
    }
}
