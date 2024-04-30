<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahBaris = 5;
        if (strlen($katakunci)) {
            $data = pegawai::where('nip', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('mapel', 'like', "%$katakunci%")
                ->paginate($jumlahBaris);
        } else {
            $data = pegawai::orderBy('nip', 'desc')->paginate($jumlahBaris);
        }

        return view('pegawai.index', [
            'data' => $data,
            'title' => "Data Pegawai",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create', [
            'title' => "Tambah Data",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nip', $request->nip);
        Session::flash('nama', $request->nama);
        Session::flash('mapel', $request->mapel);

        $request->validate([
            'nip' => 'required|numeric|unique:pegawai,nip',
            'nama' => 'required',
            'mapel' => 'required',
        ], [
            'nip.required' => 'NIP wajib diisi',
            'nip.numeric' => 'NIP wajib dalam angka',
            'nip.unique' => 'NIP yang diisikan sudah ada dalam database',
            'nama.required' => 'Nama wajib diisi',
            'mapel.required' => 'Mata Pelajaran wajib diisi',

        ]);
        $data = [
            'nip' => $request->nip,
            'nama' => $request->nama,
            'mapel' => $request->mapel,
        ];
        pegawai::create($data);
        return redirect()->to('pegawai')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nip)
    {
        $data = pegawai::where('nip', $nip)->first();

        return view('pegawai.edit', [
            'data' => $data,
            'title' => "Edit Data",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'mapel' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'mapel.required' => 'Mata Pelajaran wajib diisi',

        ]);

        $data = [
            'nama' => $request->nama,
            'mapel' => $request->mapel,
        ];

        pegawai::where('nip', $id)->update($data);
        return redirect()->to('pegawai')->with('success', 'Berhasil Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pegawai::where('nip', $id)->delete();
        return redirect()->to('pegawai')->with('success', 'Berhasil Menghapus Data');
    }

    public function getRouteKey()
    {
        return "nip";
    }
}
