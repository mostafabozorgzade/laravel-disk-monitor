<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Disk Metrics</h1>

    <table>
        <thead>
            <tr>
                <th>Disk Name</th>
                <th>File Count</th>
                <th>Recorded at</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($entries as $entry)
                <tr>
                    <td>{{ $entry->disk_name }}</td>
                    <td>{{ $entry->file_count }}</td>
                    <td>{{ $entry->created_at->format('Y-m-d H:i:s')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>
