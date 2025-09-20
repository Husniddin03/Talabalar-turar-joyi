<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TJ</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (bundle bilan Popper ham qo'shiladi) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
</body>
</html>
<div class="container">
    <h2 class="mb-4">Talaba malumotlarini yangilash</h2>

    {{-- Xatoliklar --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Forma --}}
    <form action="{{ route('admin.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="full_name" class="form-label">F.I.O</label>
            <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name', $student->full_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Jinsi</label>
            <select name="gender" id="gender" class="form-select" required>
                <option value="">Tanlang</option>
                <option value="Erkak" {{ old('gender', $student->gender) == 'Erkak' ? 'selected' : '' }}>Erkak</option>
                <option value="Ayol" {{ old('gender', $student->gender) == 'Ayol' ? 'selected' : '' }}>Ayol</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jshshr" class="form-label">JShShIR</label>
            <input type="text" name="jshshr" id="jshshr" class="form-control" maxlength="14" value="{{ old('jshshr', $student->jshshr) }}" required>
        </div>

        <div class="mb-3">
            <label for="passport_id" class="form-label">Pasport ID</label>
            <input type="text" name="passport_id" id="passport_id" class="form-control" value="{{ old('passport_id', $student->passport_id) }}" required>
        </div>

        <div class="mb-3">
            <label for="faculty" class="form-label">Fakultet</label>
            <input type="text" name="faculty" id="faculty" class="form-control" value="{{ old('faculty', $student->faculty) }}" required>
        </div>

        <div class="mb-3">
            <label for="course" class="form-label">Kurs</label>
            <input type="text" name="course" id="course" class="form-control" value="{{ old('course', $student->course) }}" required>
        </div>

        <div class="mb-3">
            <label for="group" class="form-label">Guruh</label>
            <input type="text" name="group" id="group" class="form-control" value="{{ old('group', $student->group) }}" required>
        </div>

        <div class="mb-3">
            <label for="student_phone" class="form-label">Talaba telefon raqami</label>
            <input type="text" name="student_phone" id="student_phone" class="form-control" value="{{ old('student_phone', $student->student_phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="parents_phone" class="form-label">Ota-ona telefon raqami</label>
            <input type="text" name="parents_phone" id="parents_phone" class="form-control" value="{{ old('parents_phone', $student->parents_phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="address_type" class="form-label">Manzil turi</label>
            <select name="address_type" id="address_type" class="form-select" required>
                <option value="">Tanlang</option>
                <option value="Yotoqxona" {{ old('address_type', $student->address_type) == 'Yotoqxona' ? 'selected' : '' }}>Yotoqxona</option>
                <option value="Ijara" {{ old('address_type', $student->address_type) == 'Ijara' ? 'selected' : '' }}>Ijara</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="housing_type" class="form-label">Yashash turi</label>
            <select name="housing_type" id="housing_type" class="form-select" required>
                <option value="">Tanlang</option>
                <option value="dormitory" {{ old('housing_type', $student->housing_type) == 'dormitory' ? 'selected' : '' }}>Dormitory</option>
                <option value="rental" {{ old('housing_type', $student->housing_type) == 'rental' ? 'selected' : '' }}>Ijara uy</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Manzil</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $student->address) }}" required>
        </div>

        <div class="mb-3">
            <label for="owner" class="form-label">Uy/yotoqxona egasi</label>
            <input type="text" name="owner" id="owner" class="form-control" value="{{ old('owner', $student->owner) }}" required>
        </div>

        <div class="mb-3">
            <label for="owner_phone" class="form-label">Egasi telefon raqami</label>
            <input type="text" name="owner_phone" id="owner_phone" class="form-control" value="{{ old('owner_phone', $student->owner_phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Narxi</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $student->price) }}">
        </div>

        <div class="mb-3">
            <label for="contract" class="form-label">Shartnoma turi</label>
            <input type="text" name="contract" id="contract" class="form-control" value="{{ old('contract', $student->contract) }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Rasm (fayl, ixtiyoriy)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            @if($student->image)
                <div class="mt-2">
                    <img src="{{ $student->image }}" alt="Talaba rasmi" class="img-thumbnail" style="max-width: 150px;">
                    <div class="text-muted">Joriy rasm</div>
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Saqlash</button>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Bekor qilish</a>
    </form>
</div>

</head>
<body>