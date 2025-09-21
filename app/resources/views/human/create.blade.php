<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yangi Human qo'shish</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg rounded-3">
            <div class="card-header bg-success text-white">
                <h3 class="mb-0">Yangi Human qo'shish</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('humans.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="jshshr" class="form-label">JSHSHR</label>
                        <input type="text" class="form-control" id="jshshr" name="jshshr" required>
                    </div>

                    <div class="mb-3">
                        <label for="passport_id" class="form-label">Passport ID</label>
                        <input type="text" class="form-control" id="passport_id" name="passport_id" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select id="role" name="role" class="form-select">
                            <option value="student">Student</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                        <a href="{{ route('humans.index') }}" class="btn btn-secondary ms-2">Bekor qilish</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
