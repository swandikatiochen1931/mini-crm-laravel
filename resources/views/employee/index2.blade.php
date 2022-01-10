<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Users | Kodingin</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    </head>
    <body class="container">
        <h1 class="mt-4 mb-4"> User DataTable Reguler</h2>
        <table id="data_users_reguler" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Website</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['first name'] }}</td>
                        <td>{{ $item['last name'] }}</td>
                        <td>{{ $item['email']}}</td>
                        <td>{{$item['company']}}</td>
                    </tr>
                @endforeach
            </tbody>
                
        </table>
        <script>
            $(function() {
                $('#data_users_reguler').DataTable({
                    "bLengthChange": true,
                "searching": true,
                "paging":true,
                "bInfo":true,
                "ordering": true,
                 
                });
            });
        </script>
    </body>
</html>