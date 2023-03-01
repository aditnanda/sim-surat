<?php

namespace App\Http\Livewire;

use App\Models\Surat_keluar;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class SuratKeluarTable extends TableComponent
{
    public $checkbox_side = 'left';

    protected $listeners = ['refreshTable' => 'refreshTab'];

    public $header_view = 'surat-header';

    public function refreshTab(){

    }

    public function query()
    {
        return Surat_keluar::query();
    }

    public function edit($id){
        $this->emit('showEdit',$id);
    }

    public function delete($id){
        $this->emit('showDelete',$id);

    }

    public function deleteAll(){
        if ($this->checkbox_values) {
            # code...
            Surat_keluar::whereIn('id',$this->checkbox_values)->delete();
        }
    }

    public function excelAll(){
        if ($this->checkbox_values) {
            # code...
            return redirect('surat-keluar/rekap/'.\Crypt::encrypt($this->checkbox_values));
        }
    }

    public function generate($id){


        return redirect('surat-keluar/generate/'.base64_encode($id));
    }

    public function columns()
    {
        return [
            Column::make('Aksi')->view('surat-aksi'),
            Column::make('No Agenda')->searchable()->sortable(),
            Column::make('No Surat')->searchable()->sortable(),
            Column::make('Surat Kepada')->searchable()->sortable(),
            Column::make('Keluar Tgl')->searchable()->sortable(),
            Column::make('Alamat Penerima')->searchable()->sortable(),
            Column::make('Dari Bidang')->searchable()->sortable(),
            Column::make('Perihal')->searchable()->sortable(),
        ];
    }
}
