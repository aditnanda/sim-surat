<?php

namespace App\Http\Livewire;

use App\Models\Master_kode_surat;
use Livewire\Component;

class MasterKodeSuratIndex extends Component
{
    public $isOpen = 0;
    public $nama;
    public $kode;
    public $master_kode_surat_id;

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
        $this->reset(['nama','master_kode_surat_id','kode']);
        $this->openModal();
    }

    public function store()
    {
        $validatedData = $this->validate([
            'nama' => 'required',
            'kode' => 'required',

        ]);

        if ($this->master_kode_surat_id) {
            # code...
            Master_kode_surat::where(['id' => $this->master_kode_surat_id])->update([
                'nama' => strtoupper($this->nama),
                'kode' => $this->kode,

            ]);
        }else{
            Master_kode_surat::create([
                'nama' => strtoupper($this->nama),
                'kode' => $this->kode,

            ]);
        }



        session()->flash('message',
            $this->master_kode_surat_id ? 'Berhasil diubah.' : 'Berhasil dibuat.');

        $this->closeModal();
        $this->emit('refreshTable');
        $this->reset(['nama','master_kode_surat_id','kode']);
    }

    public function edit($id)
    {
        $surat_masuk = Master_kode_surat::findOrFail($id);
        $this->master_kode_surat_id = $id;
        $this->nama = $surat_masuk->nama;
        $this->kode = $surat_masuk->kode;

        $this->openModal();
    }

    public function render()
    {
        return view('livewire.master-kode-surat-index');
    }
}
