<?php

namespace App\Http\Controllers;

use App\Exports\SuratKeluarExport;
use App\Exports\SuratMasukExport;
use App\Models\Surat_keluar;
use App\Models\Surat_masuk;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    //
    public function dashboard(Request $request){
        $data['surat_masuk'] = Surat_masuk::count();
        $data['surat_keluar'] = Surat_keluar::count();
        return view('dashboard',$data);
    }

    public function surat_masuk(Request $request){
        return view('surat-masuk');
    }

    public function surat_masuk_generate(Request $request, $id){
        $surat = Surat_masuk::where('id',base64_decode($id))->first();

        $filename = $surat->no_agenda.'_surat_masuk.docx';
        $templateProcessor = new TemplateProcessor(public_path('master-surat/Surat Masuk DINKES.docx'));

        $diteruskan_kepada = explode(",",$surat->diteruskan_kepada);

        $n = 1;
        $values = [];
        foreach ($diteruskan_kepada as $key => $value) {
            # code...
            $values[] = [
                'no' => $n++,
                'diteruskan_kepada' => trim($value)
            ];
        }
        $templateProcessor->cloneRowAndSetValues('no', $values);

        $templateProcessor->setValues([
            'no_surat' => $surat->no_surat,
            'no_agenda' => $surat->no_agenda,
            'surat_dari' => $surat->surat_dari,
            'diterima_tgl' => $surat->diterima_tgl,
            'tgl_surat' => $surat->tgl_surat,
            // 'diteruskan_kepada' => $dit_kep,
            'perihal' => $surat->perihal,
        ]);

        header("Content-Disposition: attachment; filename=".$filename);

        $templateProcessor->saveAs('php://output');
    }

    public function surat_masuk_rekap(Request $request, $id){
        try {
            //code...
            $id = \Crypt::decrypt($id);
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
        return Excel::download(new SuratMasukExport($id), 'rekap_surat_masuk.xlsx');
    }

    public function surat_keluar(Request $request){
        return view('surat-keluar');
    }

    public function surat_keluar_generate(Request $request, $id){
        $surat = Surat_keluar::where('id',base64_decode($id))->first();

        $filename = $surat->no_agenda.'_surat_keluar.docx';
        $templateProcessor = new TemplateProcessor(public_path('master-surat/Surat Keluar DINKES.docx'));

        $dari_bidang = explode(",",$surat->dari_bidang);

        $n = 1;
        $values = [];
        foreach ($dari_bidang as $key => $value) {
            # code...
            $values[] = [
                'no' => $n++,
                'dari_bidang' => trim($value)
            ];
        }
        $templateProcessor->cloneRowAndSetValues('no', $values);

        $templateProcessor->setValues([
            'no_surat' => $surat->no_surat,
            'no_agenda' => $surat->no_agenda,
            'surat_kepada' => $surat->surat_kepada,
            'alamat_penerima' => $surat->alamat_penerima,
            'keluar_tgl' => $surat->keluar_tgl,
            // 'diteruskan_kepada' => $dit_kep,
            'perihal' => $surat->perihal,
        ]);

        header("Content-Disposition: attachment; filename=".$filename);

        $templateProcessor->saveAs('php://output');
    }

    public function surat_keluar_rekap(Request $request, $id){
        try {
            //code...
            $id = \Crypt::decrypt($id);
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
        return Excel::download(new SuratKeluarExport($id), 'rekap_surat_keluar.xlsx');
    }
}
