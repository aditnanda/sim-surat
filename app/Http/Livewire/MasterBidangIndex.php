<?php

namespace App\Http\Livewire;

use App\Models\Master_bidang;
use Livewire\Component;

class MasterBidangIndex extends Component
{
    public $isOpen = 0;
    public $nama;
    public $master_bidang_id;

    protected $listeners = ['showEdit' => 'edit', 'showDelete' => 'delete'];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function create()
    {
        $this->reset(['nama','master_bidang_id']);
        $this->openModal();
    }

    public function store()
    {

        if ($this->master_bidang_id) {
            # code...
            Master_bidang::where(['id' => $this->master_bidang_id])->update([
                'nama' => $this->nama,

            ]);
        }else{
            Master_bidang::create([
                'nama' => $this->nama,

            ]);
        }



        session()->flash('message',
            $this->master_bidang_id ? 'Berhasil diubah.' : 'Berhasil dibuat.');

        $this->closeModal();
        $this->emit('refreshTable');
        $this->reset(['nama','master_bidang_id']);
    }

    public function edit($id)
    {
        $surat_masuk = Master_bidang::findOrFail($id);
        $this->master_bidang_id = $id;
        $this->nama = $surat_masuk->nama;

        $this->openModal();
    }

    public function render()
    {
        return view('livewire.master-bidang-index');
    }
}
