<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data by Team</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <table class="table" style="margin-top: 200px; margin-left: 200px;">
        <thead>
            <tr>
                <th>Tim</th>
                <th>Pimpinan Rapat</th>
                <th>Tempat Rapat</th>
                <th>Tanggal Rapat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>Tim {{ $item->tim }}</td>
                <td>{{ $item->pimpinan_rapat }}</td>
                <td>{{ $item->tempat_rapat }}</td>
                <td>{{ $item->tanggal_rapat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>