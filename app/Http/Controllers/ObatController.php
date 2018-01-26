<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;

class ObatController extends Controller
{
    protected $pesan = array (
        'nama.required' => 'Isi nama obat',
        'jenis.required' => 'Isi jenis Obat',
        'jumlah.required' => 'Isi jumlah jual',
        'diskripsi.required' => 'Isi diskripsi'

    );
    protected $aturan = array (
        'nama' => 'required',
        'jenis' => 'required',
        'jumlah' => 'required',
        'diskripsi' => 'required'
    );

    public function index ()
    {
        $batas = 5;
        $obat = Obat::orderBy('id', 'desc')
        ->paginate($batas);

        $no = $batas * ($obat->currentPage() - 1);
        return view('obat.index', compact('obat', 'no'));
    }
    public function create()
    {
        return view ('obat.create');
    }

    public function store(request $request)
    {
        $this->validate($request,$this->aturan,$this->pesan);
        $obat = new Obat;
        $obat->nama = $request['nama'];
        $obat->jenis = $request['jenis'];
        $obat->jumlah = $request['jumlah'];
        $obat->diskripsi = $request['diskripsi'];
        $obat->save();

        return redirect('/obat'); 
    }   

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // $obat = Obat::all();
        $obat = Obat::find($id);
        return view ('obat.edit',compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,$this->aturan,$this->pesan);

        $obat=Obat::find($id);
        $obat->nama=$request['nama'];
        $obat->jenis=$request['jenis'];
        $obat->jumlah=$request['jumlah'];
        $obat->diskripsi=$request['diskripsi'];
        $obat->update ();

        return redirect('/obat');
    }

    public function destroy($id)
    {
        $obat=Obat::find($id);
        $obat->delete();
        return redirect('/obat');
    }
}