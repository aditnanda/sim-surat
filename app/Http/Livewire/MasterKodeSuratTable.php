<?php

namespace App\Http\Livewire;

use App\Models\Master_kode_surat;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class MasterKodeSuratTable extends TableComponent
{
    public $checkbox = false;

    protected $listeners = ['refreshTable' => 'refreshTab'];


    public function refreshTab(){

    }

    public function query()
    {
        return Master_kode_surat::query();
    }

    public function edit($id){
        $this->emit('showEdit',$id);
    }

    public function delete($id){
        // $this->emit('showDelete',$id);

        return Master_kode_surat::where('id',$id)->delete();

    }

    public function deleteAll(){
        if ($this->checkbox_values) {
            # code...
            Master_kode_surat::whereIn('id',$this->checkbox_values)->delete();
        }
    }



    public function generate($id){


        return redirect('surat-keluar/generate/'.base64_encode($id));
    }

    public function columns()
    {
        return [
            Column::make('Aksi')->view('master-bidang-aksi'),
            Column::make('Nama')->searchable()->sortable(),
            Column::make('Kode')->searchable()->sortable(),
        ];
    }
}
