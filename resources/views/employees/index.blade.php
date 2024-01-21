<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://img.freepik.com/free-vector/white-abstract-background_23-2148824101.jpg?w=740&t=st=1705816866~exp=1705817466~hmac=92ec9efbe8ab1e2a914b6ead7ec7221495695a5293e6a65283e6aaf47ab12ea5');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .container {
            margin-top: 50px;
        }

        .page-title {
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: bold;
        }

        .create-button {
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .table {
            background-color: #fff;
        }

        .table th,
        .table td {
            text-align: center;
        }

        .table thead th {
            background-color: #343a40;
            color: #fff;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="page-title">Employee Management System</h2>
                    <a class="btn btn-success create-button" href="{{ route('employees.create') }}">Create Employee</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-3">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>S.No</th>
                    <th>Employee Name</th>
                    <th>Employee Email</th>
                    <th>Employee Address</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No employees found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {!! $employees->links() !!}
    </div>
</body>
</html>
