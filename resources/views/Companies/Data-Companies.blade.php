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
                            <span>Input Logo Company </span><br>
                            <input type="file" required><br>
                            <span>Name</span>
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
        <h5 class="card-title">Data Companies</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $cp)
                        <tr>
                            <td>{{ $cp->id }}</td>
                            <td>
                                <img src="/storages/img/logo/{{ $cp->logo }}" max-width="100px" max-height="100px">
                            </td>
                            <td>{{ $cp->name }}</td>
                            <td>{{ $cp->email }}</td>
                            <td>{{ $cp->website }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="display: flex;justify-content: center;">{{ $companies->links('pagination.default') }}</div>
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
    </script>
@endsection
