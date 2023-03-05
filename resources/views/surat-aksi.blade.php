<a href="{{url($jenis.'/generate/'.base64_encode($model->id))}}" class="btn btn-success btn-sm" data-turbolinks = "false">Buat Surat</a>
{{-- <button wire:click="generate({{ $model->id }})" class="btn btn-success btn-sm">Buat Surat</button> --}}
<button wire:click="edit({{ $model->id }})" class="btn btn-warning btn-sm">Ubah</button>
<button wire:click="delete({{ $model->id }})" class="btn btn-error btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini? TINDAKAN TIDAK DAPAT DIBATALKAN') || event.stopImmediatePropagation()">Hapus</button>
