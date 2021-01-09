<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BayarZakat;
use App\HargaEmas;
use App\Http\Requests\User\BayarZakatRequest;
use App\User;
use Illuminate\Support\Facades\Storage;

class DataZakatController extends Controller
{

    public function index(){
        $items = BayarZakat::orderBy('created_at', 'desc')->get();
        return view('pages.admin.data-zakat',[
            'items' => $items
        ]);
    }

    public function destroy($id)
    {
        $item = BayarZakat::find($id);
        Storage::disk('public')->delete($item->image);
        $item -> delete();

        return redirect()->route('data-zakat');
    }

    public function edit($id)
    {
        $item = BayarZakat::findOrFail($id);

        return view('pages.admin.edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => '',
        ]);

        $item = BayarZakat::findOrFail($id);

        $item -> update($request->all());

        return redirect()->route('data-zakat');
    }

    public function edit_emas($id)
    {
        $item = HargaEmas::findOrFail($id);

        return view('pages.admin.emas.update-emas', [
            'item' => $item
        ]);
    }

    public function update_emas(Request $request, $id)
    {
        $this->validate($request, [
            'harga_emas' => '',
        ]);

        $item = HargaEmas::findOrFail($id);

        $item -> update($request->all());

        return redirect('admin');
    }
}
