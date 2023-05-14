<?php

namespace App\Http\Livewire;

use App\Models\Master_bidang;
use App\Models\Master_kode_surat;
use App\Models\Surat_keluar;
use Livewire\Component;
use Livewire\WithFileUploads;

class SuratKeluarIndex extends Component
{
    use WithFileUploads;

    public $isOpen = 0;
    public $surat_kepada, $keluar_tgl, $alamat_penerima, $no_agenda,$no_surat,$dari_bidang,$perihal;
    public $surat_keluar_id;
    public $foto;
    public $kode_surat,$kode_dinkes = '342.12';

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
        $this->reset(['surat_kepada','keluar_tgl','alamat_penerima','no_agenda','no_surat','dari_bidang','perihal','surat_keluar_id','foto','kode_surat']);
        $this->openModal();
    }

    public function store()
    {

        $validatedData = $this->validate([
            'surat_kepada' => 'required',
            'keluar_tgl' => 'required',
            'alamat_penerima' => 'required',
            'no_agenda' => 'required',
            'no_surat' => 'required',
            'dari_bidang' => 'required',
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

        if ($this->surat_keluar_id) {
            # code...
            if ($photo_path) {
                # code...
                Surat_keluar::where(['id' => $this->surat_keluar_id])->update([
                    'surat_kepada' => $this->surat_kepada,
                    'keluar_tgl' => $this->keluar_tgl,
                    'alamat_penerima' => $this->alamat_penerima,
                    // 'no_surat' => $this->no_surat,
                    'dari_bidang' => $this->dari_bidang,
                    'perihal' => $this->perihal,
                    // 'kode_surat' => $this->kode_surat,
                    'foto' => $photo_path,
                ]);
            }else{
                Surat_keluar::where(['id' => $this->surat_keluar_id])->update([
                    'surat_kepada' => $this->surat_kepada,
                    'keluar_tgl' => $this->keluar_tgl,
                    'alamat_penerima' => $this->alamat_penerima,
                    // 'no_surat' => $this->no_surat,
                    'dari_bidang' => $this->dari_bidang,
                    // 'kode_surat' => $this->kode_surat,
                    'perihal' => $this->perihal,
                ]);
            }
        }else{
            if ($photo_path) {
                # code...
                Surat_keluar::create([
                    'surat_kepada' => $this->surat_kepada,
                    'keluar_tgl' => $this->keluar_tgl,
                    'alamat_penerima' => $this->alamat_penerima,
                    'no_agenda' => $this->no_agenda,
                    'no_surat' => $this->no_surat,
                    'kode_surat' => $this->kode_surat,
                    'dari_bidang' => $this->dari_bidang,
                    'perihal' => $this->perihal,
                    'foto' => $photo_path,
                ]);
            }else{
                Surat_keluar::create([
                    'surat_kepada' => $this->surat_kepada,
                    'keluar_tgl' => $this->keluar_tgl,
                    'alamat_penerima' => $this->alamat_penerima,
                    'no_agenda' => $this->no_agenda,
                    'no_surat' => $this->no_surat,
                    'kode_surat' => $this->kode_surat,
                    'dari_bidang' => $this->dari_bidang,
                    'perihal' => $this->perihal,
                ]);
            }
        }



        session()->flash('message',
            $this->surat_keluar_id ? 'Berhasil diubah.' : 'Berhasil dibuat.');

        $this->closeModal();
        $this->emit('refreshTable');
        $this->reset(['surat_kepada','keluar_tgl','alamat_penerima','no_agenda','no_surat','dari_bidang','perihal','surat_keluar_id','foto','kode_surat']);
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
        $this->kode_surat = $surat_keluar->kode_surat;
        // $this->dari_bidang = $surat_keluar->dari_bidang;
        $this->emit('update_dari_bidang',$surat_keluar->dari_bidang);

        $this->perihal = $surat_keluar->perihal;

        $this->openModal();
    }

    public function render()
    {
        $this->no_agenda = Surat_keluar::count() + 1;

        // untuk no_surat
        $urutan_no_surat = Surat_keluar::whereYear('keluar_tgl',date('Y'))->where('kode_surat',$this->kode_surat)->count() + 1;
        $kode = Master_kode_surat::where('nama',$this->kode_surat)->first();

        if ($kode) {
            $this->no_surat = @$kode->kode.'/'.$urutan_no_surat.'/'.$this->kode_dinkes.'/'.date('Y');
            # code...
        }
        $data['master_bidangs'] = Master_bidang::get()->pluck('nama');
        $data['master_kode_surat'] = Master_kode_surat::get();

        return view('livewire.surat-keluar-index',$data);
    }
}
