<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee - Employee Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://img.freepik.com/free-vector/white-abstract-background_23-2148824102.jpg?w=740&t=st=1705816970~exp=1705817570~hmac=5b82f0477dd1bc2a852d277f150d18e8a548a9981de70baf449a30fdbc52b56e');
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

        .back-button {
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            margin: 10px 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 0;
        }

        .submit-button {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2 class="page-title">Add Employee</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary back-button" href="{{ route('employees.index') }}">Back</a>
                </div>
            </div>
        </div>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Employee Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Enter Employee Name">
                        @error('name')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Employee Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Enter Employee Email">
                        @error('email')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Employee Address:</strong>
                        <input type="text" name="address" class="form-control" placeholder="Enter Employee Address">
                        @error('address')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary submit-button">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
