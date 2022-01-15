@extends('layouts.adminlte')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-6 m-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="page-title text-center">Insert Employees Data</h4>
                    <div class="ms-auto">
                        <form action="{{ ($employee ?? false) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <span>First Name</span>
                            <input type="text" name="first_name" value="{{ $employee->first_name ?? '' }}" class="form-control" required>
                            <span>Last Name</span>
                            <input type="text" name="last_name" value="{{ $employee->last_name ?? '' }}" class="form-control" required>
                            <span>Company</span>
                            <select name="company" class="form-control">
                                <option selected disabled>Select company</option>
                                @foreach ($companies as $item)
                                    @if($employee ?? false && $employee->company == $item->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span>Email</span>
                            <input type="email" name="email" value="{{ $employee->email ?? '' }}" class="form-control" required>
                            <span>Phone</span>
                            <input type="text" name="phone" value="{{ $employee->phone ?? '' }}" class="form-control" required><br>
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
                        <th>Company</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['first_name'] }}</td>
                            <td>{{ $item['last_name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['company'] }}</td>
                            <td class="project-actions text-right">
                                    
                                <form action="{{ route('employees.destroy', $item['id']) }}" method="POST">
                                    <a class="btn btn-info btn-sm" href="{{ route('employees.edit', $item['id']) }}">
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
