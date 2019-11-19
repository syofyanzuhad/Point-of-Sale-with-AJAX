<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Setting;
use App\Kategori;
use App\Produk;
use App\Supplier;
use App\Member;
use App\Penjualan;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::find(1);

        $awal = date('Y-m-d', mktime(0,0,0, date('m'), 1, date('Y')));
        $akhir = date('Y-m-d');

        $tanggal = $awal;
        $data_tanggal = array();
        $data_pendapatan = array();

        while(strtotime($tanggal) <= strtotime($akhir)){ 
            $data_tanggal[] = (int)substr($tanggal,8,2);
            
            $pendapatan = Penjualan::where('created_at', 'LIKE', "$tanggal%")->sum('bayar');
            $data_pendapatan[] = (int) $pendapatan;

            $tanggal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal)));
        }
        
        $kategori = Kategori::count();
        $produk = Produk::count();
        $supplier = Supplier::count();
        $member = Member::count();

        if(Auth::user()->level == 1) return view('home.admin', compact('kategori', 'produk', 'supplier', 'member', 'awal', 'akhir', 'data_pendapatan', 'data_tanggal'));
        else return view('home.kasir', compact('setting'));
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
