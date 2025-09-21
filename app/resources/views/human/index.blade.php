<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Human Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Human Index Page</h1>
            <div>
                <a href="{{ route('admin.index') }}" class="btn btn-back me-2">
                < Back
            </a>
                <a href="{{ route('humans.create') }}" class="btn btn-success">
                + Add Human
            </a>
            
            </div>
        </div>

        <div class="card shadow-lg rounded-3">
            <div class="card-body p-0">
                <table class="table table-bordered table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>JSHSHR</th>
                            <th>Passport ID</th>
                            <th>Role</th>
                            <th>Yaratilgan sana</th>
                            <th class="text-center">Update</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($humans as $human)
                            <tr>
                                <td>{{ $human->id }}</td>
                                <td>{{ $human->jshshr }}</td>
                                <td>{{ $human->passport_id }}</td>
                                <td>{{ $human->role }}</td>
                                <td>{{ $human->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('humans.edit', $human->id) }}" class="btn btn-warning btn-sm">
                                        Update
                                    </a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('humans.destroy', $human->id) }}" method="POST" onsubmit="return confirm('Haqiqatan ham o‘chirishni xohlaysizmi?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
