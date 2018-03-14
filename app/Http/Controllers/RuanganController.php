<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ruangan;
use Session;
class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     

    public function index()
    {
         $a = ruangan::all();
        return view('ruangan.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangan.create');
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
            'no_ruangan' => 'required|',
            'nama_ruangan' => 'required|'
        ]);
        $a = new ruangan;
        $a->no_ruangan = $request->no_ruangan;
        $a->nama_ruangan = $request->nama_ruangan;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$a->no_ruangan</b>"
        ]);
        return redirect()->route('ruangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $a = ruangan::findOrFail($id);
        return view('ruangan.show',compact('a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $a = ruangan::findOrFail($id);
        return view('ruangan.edit',compact('a'));
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
            'no_ruangan' => 'required|',
            'nama_ruangan' => 'required'
        ]);
        $a = ruangan::findOrFail($id);
        $a->no_ruangan = $request->no_ruangan;
        $a->nama_ruangan = $request->nama_ruangan;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$a->no_ruangan</b>"
        ]);
        return redirect()->route('ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = ruangan::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('ruangan.index');
    
    }
}
