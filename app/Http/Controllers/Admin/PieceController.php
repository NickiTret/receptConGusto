<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meat;
use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{

    public function index()
    {
        $pieces = Piece::all();
        return view('Admin.piece.index', compact('pieces'));
    }


    public function create()
    {
        $meats = Meat::pluck('title', 'id')->all();
        return view('Admin.piece.create', compact('meats'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'piece_id' => 'required|integer',
        ]);

        $data = $request->all();

        $piece = Piece::create($data);
        return redirect()->route('piece.index')->with('success', 'Часть для мяса добавлена');
    }


    public function edit($id)
    {
        $piece = Piece::find($id);
        $meats = Meat::pluck('title', 'id')->all();
        return view('Admin.piece.edit', compact('piece', 'meats'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'piece_id' => 'required|integer',
        ]);

        $piece = Piece::find($id);
        $data = $request->all();

        $piece->update($data);

        return redirect()->route('piece.index')->with('success', 'Изменения сохранены');
    }


    public function destroy($id)
    {
        Piece::destroy($id);
        return redirect()->route('piece.index')->with('success', 'Часть мяса мяса удалена');
    }
}
