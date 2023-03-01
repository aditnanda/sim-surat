<?php

namespace App\Http\Livewire;

use App\Models\Surat_masuk;
use Livewire\Component;

class SuratMasukIndex extends Component
{
    public $isOpen = 0;
    public $surat_dari, $diterima_tgl, $tgl_surat, $no_agenda,$no_surat,$diteruskan_kepada= 'Sekretariat (Tu/Umum), Sekretariat (PI/Perencanaan), Sekretariat (Keuangan), Bidang YanKes, Bidang KesMas, Bidang P2P, Bidang KB',$perihal;
    public $surat_masuk_id;

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
        $this->reset(['surat_dari','diterima_tgl','tgl_surat','no_agenda','no_surat','diteruskan_kepada','perihal','surat_masuk_id']);
        $this->openModal();
    }

    public function store()
    {

        if ($this->surat_masuk_id) {
            # code...
            Surat_masuk::where(['id' => $this->surat_masuk_id])->update([
                'surat_dari' => $this->surat_dari,
                'diterima_tgl' => $this->diterima_tgl,
                'tgl_surat' => $this->tgl_surat,
                'no_surat' => $this->no_surat,
                'diteruskan_kepada' => $this->diteruskan_kepada,
                'perihal' => $this->perihal,
            ]);
        }else{
            Surat_masuk::create([
                'surat_dari' => $this->surat_dari,
                'diterima_tgl' => $this->diterima_tgl,
                'tgl_surat' => $this->tgl_surat,
                'no_agenda' => $this->no_agenda,
                'no_surat' => $this->no_surat,
                'diteruskan_kepada' => $this->diteruskan_kepada,
                'perihal' => $this->perihal,
            ]);
        }



        session()->flash('message',
            $this->surat_masuk_id ? 'Berhasil diubah.' : 'Berhasil dibuat.');

        $this->closeModal();
        $this->emit('refreshTable');
        $this->reset(['surat_dari','diterima_tgl','tgl_surat','no_agenda','no_surat','diteruskan_kepada','perihal','surat_masuk_id']);
    }

    public function edit($id)
    {
        $surat_masuk = Surat_masuk::findOrFail($id);
        $this->surat_masuk_id = $id;
        $this->surat_dari = $surat_masuk->surat_dari;
        $this->diterima_tgl = $surat_masuk->diterima_tgl;
        $this->tgl_surat = $surat_masuk->tgl_surat;
        $this->no_agenda = $surat_masuk->no_agenda;
        $this->no_surat = $surat_masuk->no_surat;
        $this->diteruskan_kepada = $surat_masuk->diteruskan_kepada;
        $this->perihal = $surat_masuk->perihal;

        $this->openModal();
    }

    public function render()
    {
        $this->no_agenda = Surat_masuk::count() + 1;
        return view('livewire.surat-masuk-index');
    }
}
