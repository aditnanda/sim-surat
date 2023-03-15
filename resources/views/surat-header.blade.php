{{-- @if ($this->checkbox_values) --}}
<p><br></p>
<div class="row">
    <div class="col-md-6">
        @if (@$kolom_status)
            <select
                class="shadow appearance-none border rounded w-60 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                 placeholder="Pilih kolom" wire:model="kolom">
                <option value="diterima_tgl">Diterima Tgl</option>
                <option value="tgl_surat">Tgl Surat</option>
            </select>
        @endif
        <input type="date"
            class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
             placeholder="Masukkan {{ ucwords('tgl_awal') }}" wire:model="tgl_awal">

        <input type="date"
            class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
             placeholder="Masukkan {{ ucwords('tgl_akhir') }}" wire:model="tgl_akhir">

    </div>

    <p><br></p>

    <div class="col-md-12">
        <a href="{{url($jenis.'/rekap/'.\Crypt::encrypt($this->checkbox_values))}}" class="btn btn-success btn-sm" data-turbolinks = "false">Rekap yang Dipilih</a>

        {{-- <button wire:click="excelAll()" class="btn btn-success btn-sm">Rekap yang Dipilih</button> --}}
        <button wire:click="deleteAll()" class="btn btn-error btn-sm"
            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini? TINDAKAN TIDAK DAPAT DIBATALKAN') || event.stopImmediatePropagation()">Hapus
            yang Dipilih</button>

    </div>
</div>
{{-- @endif --}}
