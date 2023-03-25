<?php

namespace App\Http\Controllers;

use App\Models\pengaduan;
use App\Models\tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complains = pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->latest()->paginate(5);
        return view('pengaduan.index', compact('complains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tgl_pengaduan' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'image|mimes:png,jpg',
            'nik' => 'required',
        ]);


        if ($request->file('foto')) {
            $fileImage = hexdec(uniqid()) . "." . $request->foto->extension();
            Image::make($request->file('foto'))->save('assets/images/' . $fileImage);
            $pengaduanImage = 'assets/images/' . $fileImage;

            $validateData['foto'] = $pengaduanImage;
            $validateData['status'] = "0";

            Pengaduan::create($validateData);
        } else {
            $validateData['foto'] = "-";
            $validateData['status'] = "0";

            Pengaduan::create($validateData);
        }

        return redirect()->route('pengaduan.index')->with('success', 'Berhasil menambahkan pengaduan.');$validateData = $request->validate([
            'tgl_pengaduan' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'image|mimes:png,jpg',
            'nik' => 'required',
        ]);


        if ($request->file('foto')) {
            $fileImage = hexdec(uniqid()) . "." . $request->foto->extension();
            Image::make($request->file('foto'))->save('assets/images/' . $fileImage);
            $pengaduanImage = 'assets/images/' . $fileImage;

            $validateData['foto'] = $pengaduanImage;
            $validateData['status'] = "0";

            Pengaduan::create($validateData);
        } else {
            $validateData['foto'] = "-";
            $validateData['status'] = "0";

            Pengaduan::create($validateData);
        }

        return redirect()->route('pengaduan.index')->with('success', 'Berhasil menambahkan pengaduan.');
    }

    public function delete($id)
    {
        $pengaduan = pengaduan::findOrFail($id);
        $tanggapan = tanggapan::where('id_pengaduan', $id);
        if ($pengaduan && $tanggapan) {
            $pengaduan->delete();
            $tanggapan->delete();
        }
        return redirect()->route('pengaduan.index')->with('error', 'Gagal menghapus pengaduan.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengaduan $pengaduan)
    {

    }
}
