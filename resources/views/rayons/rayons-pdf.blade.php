<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rombels Data</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Rayons Name</th>
            </tr>
        </thead>
        @foreach ($rayons as $data)
            <tbody>
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->rayons}}</td>
                </tr>
            </tbody>
        @endforeach
    </table>
</body>

</html>