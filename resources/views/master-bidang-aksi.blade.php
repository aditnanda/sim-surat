<button wire:click="edit({{ $model->id }})" class="btn btn-warning btn-sm">Ubah</button>
<button wire:click="delete({{ $model->id }})" class="btn btn-error btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini? TINDAKAN TIDAK DAPAT DIBATALKAN') || event.stopImmediatePropagation()">Hapus</button>
