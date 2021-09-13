<?php

namespace App\Http\Controllers\Admin;

use App\Dataset;
use App\Http\Controllers\Controller;
use App\Kakulasi;
use App\Perhitungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $items = Perhitungan::with(['dataset', 'kakulasi'])->orderBy('jarak', 'ASC')->get();
        // $perbandingan_k = Perhitungan::wherehas('dataset', function($q){
        //     return $q->where('keputusan', 'Layak');
        // })->limit(3)->count();

        // if($perbandingan_k >= $perbandingan_k){
        //     $hasil = 'Layak';
        // }




        // $perbandingan_layak_tidak_layak;


        return view('pages.admin.perhitungan.index', [
            'items' => $items,
            // 'hasil' => $hasil
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataset = Dataset::all();

        $kakulasi = Kakulasi::all();
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
