<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tayangan;
use App\pengunjung;
use Session;
class PengunjungController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $wali = pengunjung::with('tayangan')->get();
        return view('pengunjung.index',compact('wali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mhs = tayangan::all();
        return view('pengunjung.create',compact('mhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'no_kursi' => 'required|unique:pengunjungs',
            'tayangan_id' => 'required'
        ]);
        $wali = new pengunjung;
        $wali->nama = $request->nama;
        $wali->no_kursi = $request->no_kursi;
        $wali->tayangan_id = $request->tayangan_id;
        $wali->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$wali->nama</b>"
        ]);
        return redirect()->route('pengunjung.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $wali = pengunjung::findOrFail($id);
        return view('pengunjung.show',compact('wali'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wali = pengunjung::findOrFail($id);
        $mhs = tayangan::all();
        $selectedtayangan = pengunjung::findOrFail($id)->tayangan_id;
        return view('pengunjung.edit',compact('mhs','wali','selectedtayangan'));
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
        $this->validate($request,[
            'nama' => 'required|',
            'no_kursi' => 'required|unique:pengunjungs',
            'tayangan_id' => 'required'
        ]);
        $wali = pengunjung::findOrFail($id);
        $wali->nama = $request->nama;
        $wali->no_kursi = $request->no_kursi;
        $wali->tayangan_id = $request->tayangan_id;
        $wali->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$wali->nama</b>"
        ]);
        return redirect()->route('pengunjung.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = pengunjung::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('pengunjung.index');
    }
}
