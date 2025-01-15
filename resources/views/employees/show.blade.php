<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Employee Details</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Name:</div>
                    <div class="col-md-9">{{ $employee->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Email:</div>
                    <div class="col-md-9">{{ $employee->email }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Address:</div>
                    <div class="col-md-9">{{ $employee->address }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Phone:</div>
                    <div class="col-md-9">{{ $employee->phone }}</div>
                </div>
                <a href="{{ route('employees.index') }}" class="btn btn-primary">Back</a>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</body>
</html>
