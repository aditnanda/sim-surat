<?php

namespace App\Http\Livewire;

use App\Models\Master_bidang;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class MasterBidangTable extends TableComponent
{
    public $checkbox = false;

    protected $listeners = ['refreshTable' => 'refreshTab'];


    public function refreshTab(){

    }

    public function query()
    {
        return Master_bidang::query();
    }

    public function edit($id){
        $this->emit('showEdit',$id);
    }

    public function delete($id){
        // $this->emit('showDelete',$id);

        return Master_bidang::where('id',$id)->delete();

    }

    public function deleteAll(){
        if ($this->checkbox_values) {
            # code...
            Master_bidang::whereIn('id',$this->checkbox_values)->delete();
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
        ];
    }
}
