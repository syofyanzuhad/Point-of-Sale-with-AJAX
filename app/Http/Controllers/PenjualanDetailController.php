<?php

namespace App\Http\Controllers;

use Redirect;
use Auth;
use PDF;
use App\Penjualan;
use App\Produk;
use App\Member;
use App\Setting;
use App\PenjualanDetail;
use Illuminate\Http\Request;

class PenjualanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        $member = Member::all();
        $setting = Setting::first();

        if(!empty(session('idpenjualan'))){
            $idpenjualan = session('idpenjualan');
            return view('penjualan_detail.index', compact('produk', 'member', 'setting', 'idpenjualan'));
        }else{
            return Redirect::route('home');  
        }
    }

    public function listData($id)
    {
        $detail = PenjualanDetail::leftJoin('produk', 'produk.kode_produk', '=', 'penjualan_detail.kode_produk')
            ->where('id_penjualan', '=', $id)
            ->get();
        $no = 0;
        $data = array();
        $total = 0;
        $total_item = 0;
        foreach($detail as $list){
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $list->kode_produk;
            $row[] = $list->nama_produk;
            $row[] = "Rp. ".format_uang($list->harga_jual);
            $row[] = "<input type='number' class='form-control' name='jumlah_$list->id_penjualan_detail' value='$list->jumlah' onChange='changeCount($list->id_penjualan_detail)'>";
            $row[] = $list->diskon."%";
            $row[] = "Rp. ".format_uang($list->sub_total);
            $row[] = '<div class="btn-group">
                    <a onclick="deleteItem('.$list->id_penjualan_detail.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            $data[] = $row;

            $total += $list->harga_jual * $list->jumlah;
            $total_item += $list->jumlah;
        }

        $data[] = array("<span class='hide total'>$total</span><span class='hide totalitem'>$total_item</span>", "", "", "", "", "", "", "");
        
        $output = array("data" => $data);
        return response()->json($output);
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
        $produk = Produk::where('kode_produk', '=', $request['kode'])->first();

        $detail = new PenjualanDetail;
        $detail->id_penjualan = $request['idpenjualan'];
        $detail->kode_produk = $request['kode'];
        $detail->harga_jual = $produk->harga_jual;
        $detail->jumlah = 1;
        $detail->diskon = $produk->diskon;
        $detail->sub_total = $produk->harga_jual - ($produk->diskon/100 * $produk->harga_jual);
        $detail->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PenjualanDetail  $penjualanDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PenjualanDetail $penjualanDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PenjualanDetail  $penjualanDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PenjualanDetail $penjualanDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PenjualanDetail  $penjualanDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nama_input = "jumlah_".$id;
        $detail = PenjualanDetail::find($id);
        $total_harga = $request[$nama_input] * $detail->harga_jual;

        $detail->jumlah = $request[$nama_input];
        $detail->sub_total = $total_harga - ($detail->diskon/100 * $total_harga);
        $detail->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PenjualanDetail  $penjualanDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = PenjualanDetail::find($id);
        $detail->delete();
    }
}
