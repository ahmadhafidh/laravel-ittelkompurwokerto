<?php

namespace App\Http\Controllers\Admin;

use App\Models\Waktu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WaktuController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:waktu.index|waktu.create|waktu.edit|waktu.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waktus = Waktu::latest()->when(request()->q, function($waktus) {
            $waktus = $waktus->where('hari', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.waktu.index', compact('waktus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.waktu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'hari' => 'required|unique:waktus',
            'jam' => 'required|unique:waktus'
        ]);

        $waktu = Waktu::create([
            'hari' => $request->input('hari'),
            'jam' => $request->input('jam')
        ]);

        if($waktu){
            //redirect dengan pesan sukses
            return redirect()->route('admin.waktu.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.waktu.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(waktu $waktu)
    {
        return view('admin.waktu.edit', compact('waktu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, waktu $waktu)
    {
        $this->validate($request, [
            'hari' => 'required|unique:waktus,hari,'.$waktu->id,
            'jam' => 'required|unique:waktus,jam,'.$waktu->id
        ]);

        $waktu = Waktu::findOrFail($waktu->id);
        $waktu->update([
            'hari' => $request->input('hari'),
            'jam' => $request->input('jam')
        ]);

        if($waktu){
            //redirect dengan pesan sukses
            return redirect()->route('admin.waktu.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.waktu.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $waktu = Waktu::findOrFail($id);
        $waktu->delete();

        if($waktu){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}