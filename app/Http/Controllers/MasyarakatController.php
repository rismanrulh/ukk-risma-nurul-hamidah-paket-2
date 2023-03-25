<?php

namespace App\Http\Controllers;

use App\Models\masyarakat;
use App\Models\pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $complains = pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->count();
        return view('masyarakat.dashboard', compact('complains'));
    }

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\Models\masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(masyarakat $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(masyarakat $masyarakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, masyarakat $masyarakat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(masyarakat $masyarakat)
    {
        //
    }
}
