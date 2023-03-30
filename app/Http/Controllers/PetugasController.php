<?php

namespace App\Http\Controllers;

use App\Models\masyarakat;
use App\Models\pengaduan;
use App\Models\petugas;
use App\Models\tanggapan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    public function dashboard()
    {
        $complains = pengaduan::count();
        $complainsProcess = Pengaduan::where('status', 'Proses')->count();
        $complainsFinish = Pengaduan::where('status', 'Selesai')->count();
        $masyarakats = masyarakat::count();

        return view('petugas.dashboard', compact('complains', 'complainsProcess', 'complainsFinish', 'masyarakats'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, petugas $petugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function deleteAkunMasyarakat($id)
    {
        if (Auth::guard('petugas')->user()->level == 'Petugas') {
        return back()->with('error', 'Anda tidak memiliki akses.');
        }
            $masyarakat = Masyarakat::findOrFail($id);
            $pengaduans = Pengaduan::where('nik', $masyarakat->nik)->get();

        foreach ($pengaduans as $pengaduan) {
            $tanggapans = tanggapan::where('id_pengaduan', $pengaduan->id)->get();
            foreach ($tanggapans as $tanggapan) {
                $tanggapan->delete();
            }
            $pengaduan->delete();
        }
        $masyarakat->delete();

        return redirect()->route('petugas.masyarakat')->with('success', 'Berhasil menghapus masyarakat.');

    }

    public function getAkunMasyarakat()
    {
        $masyarakats = masyarakat::latest()->paginate(10);
        return view('petugas.masyarakat', compact('masyarakats'));
    }

    public function akunPetugas()
    {
        $petugass = petugas::latest()->paginate(10);
        return view('petugas.petugas', compact('petugass'));
    }

    public function createPetugas()
    {
        return view('petugas.create');
    }

    public function storePetugas(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'level' => 'required',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
    
        Petugas::create($validateData);
    
        return redirect()->route('petugas.petugas')->with('success', 'Berhasil menambahkan petugas.');
    }

    public function editPetugas($id)
    {
        if (Auth::guard('petugas')->user()->level == 'Petugas') {
            return back()->with('error', 'Anda tidak memiliki akses.');
        }
    
        $petugas = Petugas::findOrFail($id);
    
        return view('petugas.edit', compact('petugas'));
    }

    public function updatePetugas(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'password' =>'required',
            'telp' =>'required',
            'level' =>'required',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
    
        $petugas = petugas::findOrFail($id);
        $petugas->update($validateData);
    
        return redirect()->route('petugas.petugas')->with('success', 'Berhasil mengubah petugas.');
    }

    public function deletePetugas($id)
    {
        if (Auth::guard('petugas')->user()->level == 'Petugas') {
            return back()->with('error', 'Anda tidak memiliki akses.');
        }
    
        $petugas = Petugas::findOrFail($id);
        $tanggapans = Tanggapan::where('id_petugas', $petugas->id)->get();
        foreach ($tanggapans as $tanggapan) {
            $tanggapan->delete();
        }
        $petugas->delete();
    
        return redirect()->route('petugas.petugas')->with('success', 'Berhasil menghapus petugas.');
    }

    public function generatePDF()
    {
        if (Auth::guard('petugas')->user()->level == 'Petugas') {
            return back()->with('error', 'Anda tidak memiliki akses.');
        }
    
        $admin = Auth::guard('petugas')->user()->nama;
        $tanggapans = Tanggapan::latest()->with('getDataPetugas', 'getDataPengaduan')->get();
    
        $data = [
            'judul' => 'Generate Tanggapan dan Pengaduan',
            'admin' => $admin,
            'tanggapans' => $tanggapans,
        ];
    
        $pdf = Pdf::loadView('petugas.generatePDF', $data)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function generatePDFSelesai()
    {
        if (Auth::guard('petugas')->user()->level == 'Petugas') {
            return back()->with('error', 'Anda tidak memiliki akses.');
        }
    
        $admin = Auth::guard('petugas')->user()->nama;
        $pengaduans = pengaduan::where('status', 'selesai')->with('getDataMasyarakat', 'getDataTanggapan')->get();
    
        $data = [
            'judul' => 'Generate Pengaduan Selesai',
            'admin' => $admin,
            'pengaduans' => $pengaduans,
        ];
    
        $pdf = Pdf::loadView('petugas.generatePDFSelesai', $data)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function generatePDFProses()
    {
        if (Auth::guard('petugas')->user()->level == 'Petugas') {
            return back()->with('error', 'Anda tidak memiliki akses.');
        }
    
        $admin = Auth::guard('petugas')->user()->nama;
        $pengaduans = pengaduan::where('status', 'proses')->with('getDataMasyarakat', 'getDataTanggapan')->get();
    
        $data = [
            'judul' => 'Generate Pengaduan Proses',
            'admin' => $admin,
            'pengaduans' => $pengaduans,
        ];
    
        $pdf = Pdf::loadView('petugas.generatePDFProses', $data)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
