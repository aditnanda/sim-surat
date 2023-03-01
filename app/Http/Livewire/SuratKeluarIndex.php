<?php

namespace App\Http\Livewire;

use App\Models\Surat_keluar;
use Livewire\Component;

class SuratKeluarIndex extends Component
{
    public $isOpen = 0;
    public $surat_kepada, $keluar_tgl, $alamat_penerima, $no_agenda,$no_surat,$dari_bidang = 'Sekretariat (Tu/Umum), Sekretariat (PI/Perencanaan), Sekretariat (Keuangan), Bidang YanKes, Bidang KesMas, Bidang P2P, Bidang KB',$perihal;
    public $surat_keluar_id;

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
        $this->reset(['surat_kepada','keluar_tgl','alamat_penerima','no_agenda','no_surat','dari_bidang','perihal','surat_keluar_id']);
        $this->openModal();
    }

    public function store()
    {

        if ($this->surat_keluar_id) {
            # code...
            Surat_keluar::where(['id' => $this->surat_keluar_id])->update([
                'surat_kepada' => $this->surat_kepada,
                'keluar_tgl' => $this->keluar_tgl,
                'alamat_penerima' => $this->alamat_penerima,
                'no_surat' => $this->no_surat,
                'dari_bidang' => $this->dari_bidang,
                'perihal' => $this->perihal,
            ]);
        }else{
            Surat_keluar::create([
                'surat_kepada' => $this->surat_kepada,
                'keluar_tgl' => $this->keluar_tgl,
                'alamat_penerima' => $this->alamat_penerima,
                'no_agenda' => $this->no_agenda,
                'no_surat' => $this->no_surat,
                'dari_bidang' => $this->dari_bidang,
                'perihal' => $this->perihal,
            ]);
        }



        session()->flash('message',
            $this->surat_keluar_id ? 'Berhasil diubah.' : 'Berhasil dibuat.');

        $this->closeModal();
        $this->emit('refreshTable');
        $this->reset(['surat_kepada','keluar_tgl','alamat_penerima','no_agenda','no_surat','dari_bidang','perihal','surat_keluar_id']);
    }

    public function edit($id)
    {
        $surat_keluar = Surat_keluar::findOrFail($id);
        $this->surat_keluar_id = $id;
        $this->surat_kepada = $surat_keluar->surat_kepada;
        $this->keluar_tgl = $surat_keluar->keluar_tgl;
        $this->alamat_penerima = $surat_keluar->alamat_penerima;
        $this->no_agenda = $surat_keluar->no_agenda;
        $this->no_surat = $surat_keluar->no_surat;
        $this->dari_bidang = $surat_keluar->dari_bidang;
        $this->perihal = $surat_keluar->perihal;

        $this->openModal();
    }

    public function render()
    {
        $this->no_agenda = Surat_keluar::count() + 1;
        return view('livewire.surat-keluar-index');
    }
}
