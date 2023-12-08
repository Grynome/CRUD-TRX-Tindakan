<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Tindakan;
use App\Models\TRX;
use App\Models\dtTRX;
use App\Models\LogData;
use RealRashid\SweetAlert\Facades\Alert;

class TRXController extends Controller
{
    public function form()
    {
        $data['pasien'] = Pasien::all()->where('deleted', 0);
        $data['dokter'] = Dokter::all()->where('deleted', 0);
        $data['tindakan'] = Tindakan::all()->where('deleted', 0);
        return view('form.trx')->with($data);
    }
    public function procs(Request $request)
    {
        $dateTime = date("Y-m-d H:i:s", strtotime("+7 hours"));
    
        $get_id = TRX::orderBy('id_trx','desc')->take(1)->get();
        if ($get_id->isEmpty()) {
            $int = 1;
                $kode_awal = "TRX-00".$int;
        } else {
            $id_trx = $get_id[0]->id_trx;
            $num = substr($id_trx, 3);
            $int = (int)$num;
            $int++;
            if($int > 9 && $int < 100){
                $kode_awal = "TRX-0".$int;
            }elseif($int > 99){
                $kode_awal = "TRX-".$int;
            }elseif($int <= 9){
                $kode_awal = "TRX-00".$int;
            }
        }

        $val_TRX = [
            'id_trx'    => $kode_awal,
            'id_pasien'    => $request->val_idPS,
            'id_dokter'    => $request->val_idDR,
            'tgl_transaksi'    => $dateTime
        ];
        $selectedIds = $request->input('selected_ids', []);
        $quantities = $request->input('qty', []);
        if($val_TRX && $selectedIds && $quantities) {
            foreach ($selectedIds as $id) {
                $quantity = $quantities[$id] ?? 1;
                dtTRX::create(['id_trx' => $kode_awal, 'id_tindakan' => $id, 'qty' => $quantity, 'created_at' => $dateTime]);
            }
            TRX::create($val_TRX);
            Alert::toast('Successfully Saved Data', 'success');
            return redirect('/');
        } else {
            Alert::toast('Failed Saving', 'error');
            return back();
        }
    }

    public function form_patch($id)
    {
        $data['get_trx'] = TRX::where('id_trx', $id)->first();
        $data['dt_trx'] = dtTRX::where('id_trx', $id)->get();
        $data['pasien'] = Pasien::all()->where('deleted', 0);
        $data['dokter'] = Dokter::all()->where('deleted', 0);
        $data['tindakan'] = Tindakan::all()->where('deleted', 0);
        return view('form.trx')->with($data)->with('id', $id);
    }

    public function updateData(Request $request, $id_trx)
    {
        $val_TRX = [
            'id_pasien'    => $request->val_idPS,
            'id_dokter'    => $request->val_idDR
        ];

        $selectedIds = $request->input('selected_ids', []);
        $query = TRX::where('id_trx', $id_trx)->first();
        $existingRecords = dtTRX::where('id_trx', $id_trx)->get();

        if($val_TRX && $selectedIds) {
            foreach ($existingRecords as $record) {
                $id_tindakan = $record->id_tindakan;
                if (!$request->has("selected_ids.{$id_tindakan}")) {
                    $record->delete();
                } else {
                    $record->update(['qty' => $request->input("qty.{$id_tindakan}", 1)]);
                }
            }
            foreach ($selectedIds as $id) {
                if (!$existingRecords->contains('id_tindakan', $id)) {
                    dtTRX::create([
                        'id_trx' => $id_trx,
                        'id_tindakan' => $id,
                        'qty' => $request->input("qty.{$id}", 1),
                    ]);
                }
            }
            $query->update($val_TRX);

            Alert::toast('Successfully Saved Data', 'success');
            return redirect('/');
        } else {
            Alert::toast('Failed Saving', 'error');
            return back();
        }
    }
    public function delete_trx(Request $request, $id)
    {
        $trx = TRX::where('id', $id)->first();
        $dtTRX = dtTRX::where('id_trx', $trx->id_trx);
        if($trx && $dtTRX) {
            $id_user =  auth()->user()->id;
            $logging = [
                'user'     => $id_user,
                'keterangan'    => 'Menghapus Data ID Transaksi : '.$trx->id_trx
            ];
            $hapusdtTRX = $dtTRX->delete();
            if ($hapusdtTRX) {
                $hapusTRX = $trx->delete();
                if ($hapusTRX) {
                    LogData::create($logging);
                }
            }
            Alert::toast('Transaksi Terhapus!', 'success');
            return back();
        }
        else {
            Alert::toast('Error when updating part!', 'error');
            return back();
        }
    }
}
