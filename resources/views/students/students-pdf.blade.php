<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Nim</th>
                <th scope="col">Gender</th>
                <th scope="col">Rayons</th>
                <th scope="col">Rombels</th>
            </tr>
        </thead>
        @foreach ($students as $data)
            <tbody>
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->nim}}</td>
                    <td>{{$data->gender}}</td>
                    <td>{{$data->rayons->rayons}}</td>
                    <td>{{$data->rombels->rombels}}</td>
                </tr>
            </tbody>
        @endforeach
    </table>
</body>

</html>