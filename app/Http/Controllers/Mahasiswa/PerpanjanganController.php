<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Dataset;
use App\Http\Controllers\Controller;
use App\Kakulasi;
use App\Pengajuan;
use App\Perhitungan;
use App\Perpanjangan;
use App\Semester;
use App\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerpanjanganController extends Controller
{
    public function halaman_input(){
        $semester = Semester::all();
        $tahun = Tahun::all();

        return view('pages.mahasiswa.perpanjangan.input-pengajuan', [
            'semester' => $semester,
            'tahun' => $tahun
        ]);
    }

    public function proses_perpanjangan(Request $request){
        $data = $request->all();

        // user login
        $user = Auth::user();

        // mahasiswa berlasi user
        $mahasiswa_id = $user->mahasiswa->id;

        $data['mahasiswa_id'] = $mahasiswa_id;


        // input
        if($request->file('ipk')){
            $penyimpanan = 'public/gambar';
            $kejuaraan = $request->file('ipk');
            $ext = $kejuaraan->getClientOriginalName();
            $upload = $request->file('ipk')->storeAs($penyimpanan, $ext);

            $data['ipk'] = $ext;
        }


        // input kejuaraan
        if($request->file('kejuaraan')){
            $penyimpanan = 'public/gambar';
            $kejuaraan = $request->file('kejuaraan');
            $ext = $kejuaraan->getClientOriginalName();
            $upload = $request->file('kejuaraan')->storeAs($penyimpanan, $ext);

            $data['kejuaraan'] = $ext;
        }

        // input akademik
        if($request->file('akademik')){
            $penyimpanan = 'public/gambar';
            $kejuaraan = $request->file('akademik');
            $ext = $kejuaraan->getClientOriginalName();
            $upload = $request->file('akademik')->storeAs($penyimpanan, $ext);

            $data['akademik'] = $ext;
        }



        // input non akademik
        if($request->file('non_akademik')){
            $penyimpanan = 'public/gambar';
            $kejuaraan = $request->file('non_akademik');
            $ext = $kejuaraan->getClientOriginalName();
            $upload = $request->file('non_akademik')->storeAs($penyimpanan, $ext);

            $data['non_akademik'] = $ext;
        }
        Perpanjangan::create($data);

        return redirect()->route('dataperpanjangan');
    }

    public function data_perpanjangan_beasiswa(){
        $user = Auth::user();
        $mahasiswa_id = $user->mahasiswa->id;


        $items = Perpanjangan::whereHas('mahasiswa',
         function($q) use($mahasiswa_id){
            return $q->where('mahasiswa_id', $mahasiswa_id);
        })
        ->with(['tahun', 'semester'])
        ->get();
        $keputusan = 'Belum Mengirimkan Perpanjangan';


        if ($items->isEmpty()) {
           return view('pages.mahasiswa.perpanjangan.data-perpanjangan', [
               'items' => $items,
               'keputusan' => $keputusan

           ]);
        } else {
            $layak = Perhitungan::whereHas('kakulasi', function($q) use($mahasiswa_id){
                return $q->where('kakulasi_id', $mahasiswa_id);
        })->wherehas('dataset', function($q){
            return $q->where('keputusan', 'Layak');
        })->limit(3)->count();

        if($layak >= $layak){
            $keputusan = 'Layak';
        }else if($layak == 2){
            $keputusan == 'Layak';
        }else{
            $keputusan == 'Tidak Layak';
        }




        return view('pages.mahasiswa.perpanjangan.data-perpanjangan', [
            'items' => $items,
            'keputusan' => $keputusan
        ]);

        }



    }
}
