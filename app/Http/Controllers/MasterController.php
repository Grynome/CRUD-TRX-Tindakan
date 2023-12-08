<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Tindakan;
use RealRashid\SweetAlert\Facades\Alert;

class MasterController extends Controller
{
    // Start Master Pasien
    public function idx_pasien()
    {
        $data['pasien'] = Pasien::all()->where('deleted', 0);
        return view('pasien')->with($data);
    }

    public function store_ps(Request $request)
    {
        $dateTime = date("Y-m-d H:i:s", strtotime("+7 hours"));
    
        $get_id = Pasien::orderBy('id_pasien','desc')->take(1)->get();
        if ($get_id->isEmpty()) {
            $int = 1;
                $kode_awal = "PS-00".$int;
        } else {
            $id_ps = $get_id[0]->id_pasien;
            $num = substr($id_ps, 3);
            $int = (int)$num;
            $int++;
            if($int > 9 && $int < 100){
                $kode_awal = "PS-0".$int;
            }elseif($int > 99){
                $kode_awal = "PS-".$int;
            }elseif($int <= 9){
                $kode_awal = "PS-00".$int;
            }
        }
        $phoneNumber = $request->no_hp;

        $cleanedNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        if (strpos($cleanedNumber, '62') === 0) {
            $cleanedNumber = substr($cleanedNumber, 2);
        }
        $values = [
            'id_pasien'    => $kode_awal,
            'nama'    => $request->nama_pasien,
            'alamat'    => $request->alamat,
            'no_hp'    => $cleanedNumber,
            'created_at'    => $dateTime
        ];
        
        if($values) {
            Pasien::insert($values);
            Alert::toast('Successfully Saved Data', 'success');
            return back();
        } else {
            Alert::toast('Failed Saving', 'error');
            return back();
        }
    }

    public function updt_ps(Request $request, $id){
        $phoneNumber = $request->edt_nohp;

        $cleanedNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        if (strpos($cleanedNumber, '62') === 0) {
            $cleanedNumber = substr($cleanedNumber, 2);
        }
        $value = [
            'nama'    => $request->edt_nama,
            'alamat'    => $request->edt_alamat,
            'no_hp'    => $cleanedNumber
        ];
        $query = Pasien::where('id', $id)->first();
        $result = $query->update($value);
        if ($result) {
            Alert::toast('Successfully Updated Data', 'success');
            return back();
        }
        else {
            Alert::toast('Failed Updating', 'error');
            return back();
        }
    }

    public function dstr_ps(Request $request, $id){
        $value = [
            'status'    => 1
        ];
        $query = Pasien::where('id', $id)->first();
        if ($query) {
            $query->update($value);
            Alert::toast('Successfully Removed Data', 'success');
            return back();
        }
        else {
            Alert::toast('Failed Deleting', 'error');
            return back();
        }
    }
    // END Master Pasien
    
    // Start Master Dokter
    public function idx_dokter()
    {
        $data['dokter'] = Dokter::all()->where('deleted', 0);
        return view('dokter')->with($data);
    }

    public function store_dr(Request $request)
    {
        $dateTime = date("Y-m-d H:i:s", strtotime("+7 hours"));
    
        $get_id = Dokter::orderBy('id_dokter','desc')->take(1)->get();
        if ($get_id->isEmpty()) {
            $int = 1;
                $kode_awal = "TC-00".$int;
        } else {
            $id_dr = $get_id[0]->id_dokter;
            $num = substr($id_dr, 3);
            $int = (int)$num;
            $int++;
            if($int > 9 && $int < 100){
                $kode_awal = "TC-0".$int;
            }elseif($int > 99){
                $kode_awal = "TC-".$int;
            }elseif($int <= 9){
                $kode_awal = "TC-00".$int;
            }
        }
        
        $values = [
            'id_dokter'    => $kode_awal,
            'nama_dokter'    => $request->nama_dokter,
            'created_at'    => $dateTime
        ];
        if($values) {
            Dokter::insert($values);
            Alert::toast('Successfully Saved Data', 'success');
            return back();
        } else {
            Alert::toast('Failed Saving', 'error');
            return back();
        }
    }

    public function updt_dr(Request $request, $id){
        $value = [
            'nama_dokter'    => $request->edt_nama
        ];
        $query = Dokter::where('id', $id)->first();
        $result = $query->update($value);
        if ($result) {
            Alert::toast('Successfully Updated Data', 'success');
            return back();
        }
        else {
            Alert::toast('Failed Updating', 'error');
            return back();
        }
    }

    public function dstr_dr(Request $request, $id){
        $value = [
            'status'    => 1
        ];
        $query = Dokter::where('id', $id)->first();
        if ($query) {
            $query->update($value);
            Alert::toast('Successfully Removed Data', 'success');
            return back();
        }
        else {
            Alert::toast('Failed Deleting', 'error');
            return back();
        }
    }
    // END Master Dokter
    
    // Start Master Tindakan
    public function idx_tindakan()
    {
        $data['tindakan'] = Tindakan::all()->where('deleted', 0);
        return view('tindakan')->with($data);
    }

    public function store_td(Request $request)
    {
        $dateTime = date("Y-m-d H:i:s", strtotime("+7 hours"));
    
        $get_id = Tindakan::orderBy('id_tindakan','desc')->take(1)->get();
        if ($get_id->isEmpty()) {
            $int = 1;
                $kode_awal = "TD-00".$int;
        } else {
            $id_td = $get_id[0]->id_tindakan;
            $num = substr($id_td, 3);
            $int = (int)$num;
            $int++;
            if($int > 9 && $int < 100){
                $kode_awal = "TD-0".$int;
            }elseif($int > 99){
                $kode_awal = "TD-".$int;
            }elseif($int <= 9){
                $kode_awal = "TD-00".$int;
            }
        }
        $price = $request->harga;

        $cleanedPrice = str_replace(['Rp', ',', '.00'], '', $price);
        $numericPrice = (int) $cleanedPrice;
        $values = [
            'id_tindakan'    => $kode_awal,
            'nama_tindakan'    => $request->nama_tindakan,
            'harga'    => $numericPrice,
            'created_at'    => $dateTime
        ];
        if($values) {
            Tindakan::insert($values);
            Alert::toast('Successfully Saved Data', 'success');
            return back();
        } else {
            Alert::toast('Failed Saving', 'error');
            return back();
        }
    }

    public function updt_td(Request $request, $id){
        $price = $request->edt_harga;

        $cleanedPrice = str_replace(['Rp', ',', '.00'], '', $price);
        $numericPrice = (int) $cleanedPrice;
        $value = [
            'nama_tindakan'    => $request->edt_nama,
            'harga'    => $numericPrice
        ];
        $query = Tindakan::where('id', $id)->first();
        $result = $query->update($value);
        if ($result) {
            Alert::toast('Successfully Updated Data', 'success');
            return back();
        }
        else {
            Alert::toast('Failed Updating', 'error');
            return back();
        }
    }

    public function dstr_td(Request $request, $id){
        $value = [
            'status'    => 1
        ];
        $query = Tindakan::where('id', $id)->first();
        if ($query) {
            $query->update($value);
            Alert::toast('Successfully Removed Data', 'success');
            return back();
        }
        else {
            Alert::toast('Failed Deleting', 'error');
            return back();
        }
    }
    // END Master Dokter
}
