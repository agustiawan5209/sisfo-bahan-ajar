<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Topik;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreTopikRequest;
use App\Http\Requests\UpdateTopikRequest;

class TopikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Topik/Index', [
            'topik' => Topik::when(Request::input('search') ?? null, function ($query, $search) {
                $query->where('nama', 'LIKE', '%' . $search . '%');
            })->orderBy('id', 'desc')->paginate(10),
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
    public function store(StoreTopikRequest $request)
    {
        $topik = Topik::create($request->all());

        return redirect(route('Admin.Topik.index'))->with('success', 'Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Topik $topik)
    {
        return Inertia::render('Admin/Topik/Show', [
            'kelas' => Topik::find(Request::input('slug')),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topik $topik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopikRequest $request, Topik $topik)
    {
        $topik = Topik::find(Request::input('id'))->update($request->all());

        return redirect(route('Admin.Topik.index'))->with('success', 'Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topik $topik)
    {
        $topik = Topik::find(Request::input('id'))->delete();

        return redirect(route('Admin.Topik.index'))->with('success', 'Berhasil Di hapus');
    }
}
