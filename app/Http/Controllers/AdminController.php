<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dataTable()
    {
        $data = Admin::get();
        $total = DB::table('pengaduan')->count();
        $belum = DB::table('pengaduan')->where('status','=','proses')->selectRaw('count(id) as id')->pluck('id');
        $sudah = DB::table('pengaduan')->where('status','=','selesai')->selectRaw('count(id) as id')->pluck('id');
        return view('dashboard', compact('data', 'total', 'belum', 'sudah'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function table(Admin $id)
    {
        $show = Admin::findOrFail($id);
        $data = Admin::get();
        return view('table', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Admin $id): RedirectResponse
    {
        $request->validate([
            'tanggapan' => 'required',
            'tgl_tanggapan' => 'required'
        ]);
    
        Pengaduan::create($request->all());
        $show = Admin::findOrFail($id);
        $data = Admin::get();
        return redirect()->route('pengaduan');
    }

    /**
     * Display the specified resource.
     */
    public function dataPetugas(User $user)
    {
        $petugas = User::get()->where('role', '=', 'Petugas');
        return view('petugas', compact('petugas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function dataMasyarakat(User $user)
    {
        $masyarakat = User::get()->where('role', '=', 'Masyarakat');
        return view('masyarakat', compact('masyarakat'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            Admin::findOrFail($id)->delete();
            return redirect()->route('pengaduan');
    }
}
