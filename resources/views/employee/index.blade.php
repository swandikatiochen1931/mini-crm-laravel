@extends('layouts.adminlte')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-6 m-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="page-title text-center">Insert Employees Data</h4>
                    <div class="ms-auto">
                        <form action="" enctype="multipart/form-data">
                            @csrf
                            <span>Input Logo Employees </span><br>
                            <input type="file" required><br>
                            <span>First Name</span>
                            <input type="text" name="name" class="form-control" required>
                            <span>Last Name</span>
                            <input type="text" name="name" class="form-control" required>
                            <span>Email</span>
                            <input type="email" name="email" class="form-control" required>
                            <span>Website</span>
                            <input type="text" name="website" class="form-control" required><br>
                            <input type="submit" name="submit" value="Input" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Data Employees</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
            
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
            <div style="display: flex;justify-content: center;">{{ $data->links('pagination.default') }}</div>
        </div>

    </div>
</div>

    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
         $(document).ready( function () {
            $('#zero_config').DataTable({
                "bLengthChange": true,
                "searching": true,
                "paging":true,
                "bInfo":true,
                "ordering": true,
            });
        });
   
    </script>
@endsection
