<table>
    <thead>
    <tr>
        <th>No Agenda</th>
        <th>No Surat</th>
        <th>Surat Kepada</th>
        <th>Keluar Tgl</th>
        <th>Alamat Penerima</th>
        <th>Dari Bidang</th>
        <th>Perihal</th>
    </tr>
    </thead>
    <tbody>
    @foreach($surat as $srt)
        <tr>
            <td>{{ $srt->no_agenda }}</td>
            <td>{{ $srt->no_surat }}</td>
            <td>{{ $srt->surat_kepada }}</td>
            <td>{{ $srt->keluar_tgl }}</td>
            <td>{{ $srt->alamat_penerima }}</td>
            <td>{{ $srt->dari_bidang }}</td>
            <td>{{ $srt->perihal }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
