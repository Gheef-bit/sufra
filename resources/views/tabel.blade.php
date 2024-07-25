<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Data by Team</h2><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tim</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>Sasaran</th>
                    <th>Kendala</th>
                    <th>Solusi</th>
                    <th>Rencana Tindak Lanjut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $tim => $items)
                @php $rowCount = count($items); @endphp
                @foreach($items as $index => $item)
                <tr>
                    @if($index == 0)
                    <td rowspan="{{ $rowCount }}">{{ $tim }}</td>
                    @endif
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->sasaran }}</td>
                    @if(isset($item->user_indikator[$index]))
                    <td>{{ $item->user_indikator[$index]->kendala ?? '' }}</td>
                    <td>{{ $item->user_indikator[$index]->solusi ?? '' }}</td>
                    <td>{{ $item->user_indikator[$index]->rencana_tindak_lanjut ?? '' }}</td>
                    @else
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>