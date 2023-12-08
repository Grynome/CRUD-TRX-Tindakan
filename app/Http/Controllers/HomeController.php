<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TRX;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaksiData = TRX::with('details.get_td')->get();
        $totals = [];

        foreach ($transaksiData as $transaksi) {
            $total = 0;

            foreach ($transaksi->details as $detail) {
                $total += $detail->get_td->harga * $detail->qty;
            }

            $totals[$transaksi->id_trx] = $total;
        }
        return view('trx', ['transaksiData' => $transaksiData, 'totals' => $totals]);
    }
}
