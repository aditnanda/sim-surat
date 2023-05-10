<?php

namespace App\Http\Livewire;

use App\Models\Master_bidang;
use App\Models\Surat_masuk;
use Livewire\Component;
use Livewire\WithFileUploads;

class SuratMasukIndex extends Component
{
    use WithFileUploads;

    public $isOpen = 0;
    public $surat_dari, $diterima_tgl, $tgl_surat, $no_agenda,$no_surat,$diteruskan_kepada,$perihal;
    public $surat_masuk_id;
    public $foto;

    protected $listeners = ['showEdit' => 'edit', 'showDelete' => 'delete'];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->emit('reload');
    }

    public function create()
    {
        $this->reset(['surat_dari','diterima_tgl','tgl_surat','no_agenda','no_surat','diteruskan_kepada','perihal','surat_masuk_id','foto']);
        $this->openModal();
    }

    public function store()
    {
        $validatedData = $this->validate([
            'surat_dari' => 'required',
            'diterima_tgl' => 'required',
            'tgl_surat' => 'required',
            'no_agenda' => 'required',
            'no_surat' => 'required',
            'diteruskan_kepada' => 'required',
            'perihal' => 'required',

        ]);
        $photo_path = '';
        if ($this->foto) {
            # code...
            $validatedData = $this->validate([
                'foto' => 'file|mimes:jpg,png|max:5120|required',

            ]);

            $this->foto->storeAs('public',$this->foto->hashName());
            $photo_path = ''.$this->foto->hashName();
        }


        if ($this->surat_masuk_id) {
            # code...
            if ($photo_path) {
                # code...
                Surat_masuk::where(['id' => $this->surat_masuk_id])->update([
                    'surat_dari' => $this->surat_dari,
                    'diterima_tgl' => $this->diterima_tgl,
                    'tgl_surat' => $this->tgl_surat,
                    'no_surat' => $this->no_surat,
                    'diteruskan_kepada' => $this->diteruskan_kepada,
                    'perihal' => $this->perihal,
                    'foto' => $photo_path,
                ]);
            }else{
                Surat_masuk::where(['id' => $this->surat_masuk_id])->update([
                    'surat_dari' => $this->surat_dari,
                    'diterima_tgl' => $this->diterima_tgl,
                    'tgl_surat' => $this->tgl_surat,
                    'no_surat' => $this->no_surat,
                    'diteruskan_kepada' => $this->diteruskan_kepada,
                    'perihal' => $this->perihal,
                ]);
            }

        }else{
            if ($photo_path) {
                # code...
                Surat_masuk::create([
                    'surat_dari' => $this->surat_dari,
                    'diterima_tgl' => $this->diterima_tgl,
                    'tgl_surat' => $this->tgl_surat,
                    'no_agenda' => $this->no_agenda,
                    'no_surat' => $this->no_surat,
                    'diteruskan_kepada' => $this->diteruskan_kepada,
                    'perihal' => $this->perihal,
                    'foto' => $photo_path,
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
        }



        session()->flash('message',
            $this->surat_masuk_id ? 'Berhasil diubah.' : 'Berhasil dibuat.');

        $this->closeModal();
        $this->emit('refreshTable');
        $this->reset(['surat_dari','diterima_tgl','tgl_surat','no_agenda','no_surat','diteruskan_kepada','perihal','surat_masuk_id','foto']);
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
        // $this->diteruskan_kepada = $surat_masuk->diteruskan_kepada;
        $this->emit('update_diteruskan_kepada',$surat_masuk->diteruskan_kepada);
        $this->perihal = $surat_masuk->perihal;

        $this->openModal();
    }

    public function render()
    {
        $this->no_agenda = Surat_masuk::count() + 1;
        $data['master_bidangs'] = Master_bidang::get()->pluck('nama');

        return view('livewire.surat-masuk-index',$data);
    }
}
