<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\TransactionDetail;
use App\Transaction;
use App\Product;

class CetakController extends Controller
{
    function tampil()
    {
        $cetak_laporan = DB::table('transaction_details')
        ->limit(10)
        ->get();
        return $cetak_laporan;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper')->setPaper('A4', 'landscape');
        $pdf->loadHTML($this->convert_cetak_laporan_to_html());
        return $pdf->stream();
    }

    function convert_cetak_laporan_to_html()
    {
        $cetak_laporan = $this->tampil();
        $Tglnow=date('d F Y');
        $output='
        <html>
        </html>
        <h1 style="text-align :center;"><u>Laporan Pesanan Bulanan - PT SAFRA ASIA GEMILANG</u></h1>
        <h4 style="text-align :center;">'."Per-Tanggal : ".$Tglnow.'</h4>
        <table width="100% style="border-collapse: collapse; border: 0px;">
            <tr>
                <th style="border: 1px solid; padding:12px;" width="5%">No</th>
                <th style="border: 1px solid; padding:12px;" width="15%">Nomer Transaksi</th>
                <th style="border: 1px solid; padding:12px;" width="15%">Produk</th>
                <th style="border: 1px solid; padding:12px;" width="25%">Harga Total</th>
                <th style="border: 1px solid; padding:12px;" width="15%">Code</th>
                <th style="border: 1px solid; padding:12px;" width="25%">Tanggal</th>
            </tr>';
            $no=0;
            foreach($cetak_laporan as $tampil)
            {
                $no++;
                $output.='
                <tr>
                    <td align="center" style="border: 1px solid; padding:12px;">'.$no.'</td>
                    <td align="center" style="border: 1px solid; padding:12px;">'.$tampil->transactions_id.'</td>
                    <td align="center" style="border: 1px solid; padding:12px;">'.$tampil->products_id.'</td>
                    <td align="center" style="border: 1px solid; padding:12px;">'.$tampil->price.'</td>
                    <td align="center" style="border: 1px solid; padding:12px;">'.$tampil->code.'</td>
                    <td align="center" style="border: 1px solid; padding:12px;">'.$tampil->created_at.'</td>
                </tr>';    
            }

            $data = DB::table('transaction_details')->count();
            $output.='
                <tr>
                    <td align="right" colspan="6" style="border: 1px solid; padding: 6px;>
                    <div align="center"><b>Jumlah Record Laporan</b></div></td>
                    <td align="center" style="border: 1px solid; padding: 12px;>
                    <div align="center"><b>'.$data.'</b></div></td>
                </tr>';

            $output.='</table>';
            return $output;


    }

}
