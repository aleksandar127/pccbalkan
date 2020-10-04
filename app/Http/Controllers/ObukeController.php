<?php

namespace App\Http\Controllers;

use App\Obuka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObukeController extends Controller
{

    protected $guarded = [];

    public function index(Request $request)
    {

        $lista = Obuka::all()->sortBy('termin', true);
        return view('obuke', ['lista' => $lista]);
    }

    public function show(Request $request, $id)
    {
        $obuka = Obuka::findOrFail($id);
    }

    public function create()
    {
    }

    public function edit(Request $request, $id)
    {
        $obuka = Obuka::findOrFail($id);
        return view('edit', ['obuka' => $obuka]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validator($request);

        $updated = Obuka::findOrFail($id)->update($validatedData);
        return redirect(route('lista'))->with('message', 'Obuka je uspesno izmenjena!');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validator($request);
        $obuka = new Obuka($validatedData);
        $obuka->save();
        return back()->with('message', 'Obuka je uspesno kreirana!');
    }

    public function delete(Request $request, $id)
    {
        $obuka = Obuka::findOrFail($id);
        $obuka->delete();
        return back()->with('message', 'Obuka je uspesno izbrisana!');
    }

    public function ajax(Request $request)
    {

        $lista = DB::table('obuke')
            ->whereYear('termin', $_GET['date'])
            ->get();
        echo json_encode($lista);
    }
    public function validator($request)
    {
        $validatedData = $request->validate([
            'naziv_obuke' => 'required|max:255',
            'vrsta_obuke' => 'required|max:255',
            'broj_zaposlenih' => 'required|integer',
            'termin' => 'required|date',
            'mesto_odrzavanja_obuke' => 'required|max:255',
            'potrebni_resursi' => 'required|max:255',
            'realizovano_broj_zaposlenih' => 'integer|nullable',
            'ocena' => 'integer|nullable|min:1|max:5'
        ]);
        return $validatedData;
    }
}
