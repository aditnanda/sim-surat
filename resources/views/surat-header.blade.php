{{-- @if ($this->checkbox_values) --}}
<p><br></p>
<div class="row">
    <div class="col-md-12">
        <button wire:click="excelAll()" class="btn btn-success btn-sm">Rekap yang Dipilih</button>
        <button wire:click="deleteAll()" class="btn btn-error btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini? TINDAKAN TIDAK DAPAT DIBATALKAN') || event.stopImmediatePropagation()">Hapus yang Dipilih</button>

    </div>
</div>
{{-- @endif --}}

