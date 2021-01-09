<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PengeluaranRequest;
use App\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $item = Pengeluaran::all();

        return view('pages.admin.pengeluaran.pengeluaran', [
            'items' => $item
        ]);
    }

    public function create()
    {
        return view('pages.admin.pengeluaran.create-pengeluaran');
    }

    public function store(PengeluaranRequest $request)
    {

        $data = $request->all();

        Pengeluaran::create($data);
        return redirect()->route('pengeluaran');

    }

    public function edit($id)
    {
        $item = Pengeluaran::findOrFail($id);

        return view('pages.admin.pengeluaran.update-pengeluaran', [
            'item' => $item
        ]);
    }

    public function update(PengeluaranRequest $request, $id)
    {

        $item = Pengeluaran::findOrFail($id);

        $item -> update($request->all());

        return redirect()->route('pengeluaran');
    }

    public function destroy($id)
    {
        $item = Pengeluaran::find($id);
        $item -> delete();

        return redirect()->route('pengeluaran');
    }
}
