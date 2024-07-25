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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tim</th>
                    <th>Topik Rapat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>Tim {{ $item->tim }}</td>
                    <td>{{ $item->topik }}</td>
                    <td>null</td>
                    <td>
                        <a href="/create-document/{{$item->tim }}" class="btn btn-primary">Download</a>
                        <a href="/document/{{$item->tim }}" class="btn btn-primary">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>