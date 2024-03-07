<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Kelas;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Kelas/Index', [
            'kelas' => Kelas::when(Request::input('search') ?? null, function($query,$search){
                $query->where('nama','LIKE','%'.$search.'%');
            })->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelasRequest $request)
    {
        $kelas = Kelas::create($request->all());

        return redirect(route('Admin.Kelas.index'))->with('success', 'Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        return Inertia::render('Admin/Kelas/Show', [
            'kelas' => Kelas::find(Request::input('slug')),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelasRequest $request, Kelas $kelas)
    {
        $kelas = Kelas::find(Request::input('slug'))->update($request->all());

        return redirect(route('Admin.Kelas.index'))->with('success', 'Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
         $kelas = Kelas::find(Request::input('slug'))->delete();

        return redirect(route('Admin.Kelas.index'))->with('success', 'Berhasil Di hapus');
    }
}
