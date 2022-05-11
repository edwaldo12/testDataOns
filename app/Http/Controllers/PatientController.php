<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient = Patient::all();
        return view('patient.index', compact('patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelurahan = Kelurahan::all();
        return view('patient.create',compact('kelurahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => "required",
            'alamat' => "required",
            'no_hp' => "required",
            'rt' => "required",
            'rw' => "required",
            'kelurahan_id' => "required",
            'tanggal_lahir' => "required",
            'jenis_kelamin' => "required",
        ]);

        $pasien = new Patient;
        $pasien->id = date("Ym").sprintf("%06d", $pasien->count() + 1);
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->alamat = $request->alamat;
        $pasien->no_hp = $request->no_hp;
        $pasien->rt = $request->rt;
        $pasien->rw = $request->rw;
        $pasien->kelurahan_id = $request->kelurahan_id;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        Session::flash('store_pasien', $pasien->save());
        return to_route('pasien.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = Patient::findOrFail($id);
        return view('patient.print', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien = Patient::find($id);
        $kelurahan = Kelurahan::all();
        return view('patient.edit', compact('pasien','kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => "required",
            'alamat' => "required",
            'no_hp' => "required",
            'rt' => "required",
            'rw' => "required",
            'kelurahan_id' => "required",
            'tanggal_lahir' => "required",
            'jenis_kelamin' => "required",
        ]);

        $pasien = Patient::find($id);
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->alamat = $request->alamat;
        $pasien->no_hp = $request->no_hp;
        $pasien->rt = $request->rt;
        $pasien->rw = $request->rw;
        $pasien->kelurahan_id = $request->kelurahan_id;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        Session::flash('update_pasien', $pasien->save());
        return to_route('pasien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Patient::find($id);
        Session::flash('delete_pasien', $pasien->delete());
        return to_route('pasien.index');
    }
}
