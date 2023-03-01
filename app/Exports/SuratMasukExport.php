<?php

namespace App\Exports;

use App\Models\Surat_masuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SuratMasukExport implements FromView
{
    public $id_surat = [];

    function __construct($id_surat)
    {
        $this->id_surat = $id_surat;
    }


    public function view(): View
    {
        return view('exports.surat-masuk', [
            'surat' => Surat_masuk::whereIn('id',$this->id_surat)->get()
        ]);
    }

}
