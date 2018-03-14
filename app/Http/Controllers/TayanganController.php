<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tayangan;
use App\ruangan;
use Session;
class TayanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mhs = tayangan::with('ruangan')->get();
        return view('tayangan.index',compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $ruangan = ruangan::all();
        return view('tayangan.create',compact('ruangan'));
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
            'judul_film' => 'required|',
            'waktu' => 'required|unique:tayangans',
            'ruangan_id' => 'required'
        ]);
        $mhs = new tayangan;
        $mhs->judul_film = $request->judul_film;
        $mhs->waktu = $request->waktu;
        $mhs->ruangan_id = $request->ruangan_id;
        $mhs->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$mhs->judul_film</b>"
        ]);
        return redirect()->route('tayangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $mhs = tayangan::findOrFail($id);
        return view('tayangan.show',compact('mhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = tayangan::findOrFail($id);
        $ruangan = ruangan::all();
        $selectedruangan = tayangan::findOrFail($id)->ruangan_id;
        return view('tayangan.edit',compact('mhs','ruangan','selectedruangan'));
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
            'judul_film' => 'required|',
            'waktu' => 'required|',
            'ruangan_id' => 'required'
        ]);
        $mhs = tayangan::findOrFail($id);
        $mhs->judul_film = $request->judul_film;
        $mhs->waktu = $request->waktu;
        $mhs->ruangan_id = $request->ruangan_id;
        $mhs->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$mhs->judul_film</b>"
        ]);
        return redirect()->route('tayangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = tayangan::findOrFail($id);
        $a->delete();
        return redirect()->route('tayangan.index');
    }
}
