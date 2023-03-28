<?php

namespace App\Http\Controllers;

use App\Models\pengaduan;
use App\Models\tanggapan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggapans = Tanggapan::latest()->with('getDataPetugas', 'getDataPengaduan', 'getDataMasyarakat')->paginate(5);
        return view('tanggapan.index', compact('tanggapans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTanggapan($id_pengaduan)
    {
        $pengaduan = pengaduan::findOrFail($id_pengaduan);
        if ($pengaduan->status == 'Selesai' || $pengaduan->status == 'Proses') {
            return back()->with('error', 'Tanggapan sudah tersedia.');
        }

        return view('tanggapan.create', compact('pengaduan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTanggapan(Request $request, $id_pengaduan)
    {
        $request->validate([
            'id_pengaduan' => 'required',
            'tgl_tanggapan' => 'required',
            'tanggapan' => 'required',
            'id_petugas' => 'required',
        ]);

        $updateStatus = Pengaduan::findOrFail($id_pengaduan);
        if ($request->status == 'Selesai') {
            $updateStatus->tgl_selesai = Carbon::now();
        }
        $updateStatus->status = $request->status;
        $updateStatus->update();

        $data = new Tanggapan;
        $data->id_pengaduan = $id_pengaduan;
        if ($request->status == 'Selesai') {
            $data->tgl_tanggapan = Carbon::now();
        }
        $data->tgl_tanggapan = $request->tgl_tanggapan;
        $data->tanggapan = $request->tanggapan;
        $data->id_petugas = $request->id_petugas;
        $data->save();

        return redirect()->route('tanggapan')->with('success', 'Berhasil menambahkan tanggapan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show(tanggapan $tanggapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit(tanggapan $tanggapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tanggapan $tanggapan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function deleteTanggapan($id)
    {
        $tanggapan = Tanggapan::findOrFail($id);
        $tanggapanIdentik = Tanggapan::findOrFail($tanggapan->id_pengaduan);
        $pengaduan = Pengaduan::findOrFail($tanggapan->id_pengaduan);

        if ($tanggapan && $pengaduan) {
            $tanggapan->delete();
            $tanggapanIdentik->delete();
            $pengaduan->delete();

            return redirect()->route('tanggapan')->with('success', 'Berhasil menghapus tanggapan.');
        }
        return back()->with('error', 'Gagal menghapus tanggapan.');
    }
}
