<?php

namespace App\Http\Livewire;

use App\Models\Surat_masuk;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;


class SuratMasukTable extends TableComponent
{
    public $checkbox_side = 'left';

    protected $listeners = ['refreshTable' => 'refreshTab'];

    public $header_view = 'surat-header';

    public $jenis = 'surat-masuk';

    public $kolom_status = true;
    public $kolom = 'diterima_tgl';

    public $tgl_awal, $tgl_akhir;

    public function mount()
    {
        $this->setTableProperties();

        // my custom code
        $this->tgl_awal = date('Y-m').'-01';
        $this->tgl_akhir = date("Y-m-t", strtotime(date('Y-m-d')));
    }

    public function refreshTab(){

    }

    public function query()
    {
        return Surat_masuk::whereBetween($this->kolom,[$this->tgl_awal,$this->tgl_akhir]);
    }

    public function edit($id){
        $this->emit('showEdit',$id);
    }

    public function delete($id){
        // $this->emit('showDelete',$id);
        return Surat_masuk::where('id',$id)->delete();

    }

    public function deleteAll(){
        if ($this->checkbox_values) {
            # code...
            Surat_masuk::whereIn('id',$this->checkbox_values)->delete();
        }
    }

    public function excelAll(){
        if ($this->checkbox_values) {
            # code...
            return redirect('surat-masuk/rekap/'.\Crypt::encrypt($this->checkbox_values));
        }
    }

    public function generate($id){


        return redirect('surat-masuk/generate/'.base64_encode($id));
    }

    public function columns()
    {
        return [
            Column::make('Aksi')->view('surat-aksi'),
            Column::make('No Agenda')->searchable()->sortable(),
            Column::make('No Surat')->searchable()->sortable(),
            Column::make('Surat Dari')->searchable()->sortable(),
            Column::make('Diterima Tgl')->searchable()->sortable(),
            Column::make('Tgl Surat')->searchable()->sortable(),
            Column::make('Diteruskan Kepada')->searchable()->sortable(),
            Column::make('Perihal')->searchable()->sortable(),
            Column::make('Foto')->view('foto-surat'),
        ];
    }
}
