<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Talaba ma'lumotlari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Talaba ma'lumotlari</h2>
    <a href="{{ route('admin.index') }}" class="btn btn-secondary mb-3">Orqaga</a>
    <a href="{{ route('admin.edit', $student->id) }}" class="btn btn-warning mb-3">Tahrirlash</a>
    <form action="{{ route('admin.destroy', $student->id) }}" method="POST" style="display:inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mb-3" onclick="return confirm('O‘chirishga ishonchingiz komilmi?')">O‘chirish</button>
    </form>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3"><strong>F.I.O:</strong></div>
                <div class="col-md-9">{{ $student->full_name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Jinsi:</strong></div>
                <div class="col-md-9">{{ $student->gender }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>JShShIR:</strong></div>
                <div class="col-md-9">{{ $student->jshshr }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Pasport ID:</strong></div>
                <div class="col-md-9">{{ $student->passport_id }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Fakultet:</strong></div>
                <div class="col-md-9">{{ $student->faculty }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Kurs:</strong></div>
                <div class="col-md-9">{{ $student->course }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Guruh:</strong></div>
                <div class="col-md-9">{{ $student->group }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Talaba tel:</strong></div>
                <div class="col-md-9">{{ $student->student_phone }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Ota-ona tel:</strong></div>
                <div class="col-md-9">{{ $student->parents_phone }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Manzil turi:</strong></div>
                <div class="col-md-9">{{ $student->address_type }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Yashash turi:</strong></div>
                <div class="col-md-9">{{ $student->housing_type }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Manzil:</strong></div>
                <div class="col-md-9">{{ $student->address }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Uy/yotoqxona egasi:</strong></div>
                <div class="col-md-9">{{ $student->owner }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Egasi tel:</strong></div>
                <div class="col-md-9">{{ $student->owner_phone }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Narxi:</strong></div>
                <div class="col-md-9">{{ $student->price }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Shartnoma:</strong></div>
                <div class="col-md-9">{{ $student->contract }}</div>
            </div>
            @if($student->image)
            <div class="row mb-3">
                <div class="col-md-3"><strong>Rasm:</strong></div>
                <div class="col-md-9">
                    @php
                        
                        $img = $student->image ? asset('storage/' . $student->image) : asset('images/default-profile.png');
                    @endphp
                    <img src="{{$img}}" alt="s" class="img-thumbnail" style="max-width: 200px;">
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>
