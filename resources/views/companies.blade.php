@extends('layouts.adminlte')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-6 m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="page-title text-center">Insert Companies Data</h4>
                        <div class="ms-auto">
                            <form action="{{ ($company ?? false) ? route('companies.update', $company->id) : route('companies.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <span>Input Logo Company </span><br>
                                <input name="logo" type="file" required><br>
                                <span>Name</span>
                                <input type="text" name="name" value="{{ $company->name ?? '' }}" class="form-control" required>
                                <span>Email</span>
                                <input type="email" name="email" value="{{ $company->email ?? '' }}" class="form-control" required>
                                <span>Website</span>
                                <input type="text" name="website" value="{{ $company->website ?? '' }}" class="form-control" required><br>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $cp)
                            <tr>
                                <td>{{ $cp->id }}</td>
                                <td>
                                    <img src="{{ str_replace('C:\laragon\www\blog\public', '', $cp->logo) }}" width="100px" height="auto">
                                </td>
                                <td>{{ $cp->name }}</td>
                                <td>{{ $cp->email }}</td>
                                <td>{{ $cp->website }}</td>
                                <td class="project-actions text-right">
                                    
                                    <form action="{{ route('companies.destroy', $cp->id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" href="{{ route('companies.edit', $cp->id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Ubah
                                        </a>
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </form>
                                    
                                </td>
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
        $(document).ready(function() {
            $('#zero_config').DataTable({
                "bLengthChange": true,
                "searching": true,
                "paging": true,
                "bInfo": true,
                "ordering": true,
            });
        });
    </script>
@endsection
