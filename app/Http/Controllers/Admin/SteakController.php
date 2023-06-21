<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Piece;
use App\Models\Steak;
use Illuminate\Http\Request;

class SteakController extends Controller
{

    public function index()
    {
        $steaks = Steak::all();
        return view('Admin.steak.index', compact('steaks'));
    }


    public function create()
    {
        $pieces = Piece::pluck('title', 'piece_id')->all();
        return view('Admin.steak.create', compact('pieces'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg',
            'content' => 'required',
            'steaks_id' => 'required|integer',
        ]);

        $data = $request->all();
        $data['image'] = Steak::uploadImage($request);

        $steak = Steak::create($data);
        return redirect()->route('steak.index')->with('success', 'Отруб мяса добавлен');
    }


    public function edit($id)
    {
        $steak = Steak::find($id);
        $pieces = Piece::pluck('title', 'piece_id')->all();
        return view('Admin.steak.edit', compact('steak', 'pieces'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg',
            'content' => 'required',
            'steaks_id' => 'required|integer',
        ]);

        $steak = Steak::find($id);
        $data = $request->all();
        $data['image'] = Steak::uploadImage($request);

        $steak->update($data);

        return redirect()->route('steak.index')->with('success', 'Изменения сохранены');
    }


    public function destroy($id)
    {
        Steak::destroy($id);
        return redirect()->route('steak.index')->with('success', 'Отруб мяса мяса удален');
    }
}
