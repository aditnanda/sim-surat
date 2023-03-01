<table>
    <thead>
    <tr>
        <th>No Agenda</th>
        <th>No Surat</th>
        <th>Surat Dari</th>
        <th>Diterima Tgl</th>
        <th>Tgl Surat</th>
        <th>Diteruskan Kepada</th>
        <th>Perihal</th>
    </tr>
    </thead>
    <tbody>
    @foreach($surat as $srt)
        <tr>
            <td>{{ $srt->no_agenda }}</td>
            <td>{{ $srt->no_surat }}</td>
            <td>{{ $srt->surat_dari }}</td>
            <td>{{ $srt->diterima_tgl }}</td>
            <td>{{ $srt->tgl_surat }}</td>
            <td>{{ $srt->diteruskan_kepada }}</td>
            <td>{{ $srt->perihal }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
