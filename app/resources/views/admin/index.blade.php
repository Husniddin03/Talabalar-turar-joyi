@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Talabalar ro'yxati (Admin)</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admin.students.create') }}" class="btn btn-primary mb-3">+ Yangi talaba qo'shish</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>F.I.O</th>
                <th>Jinsi</th>
                <th>JSHSHR</th>
                <th>Pasport ID</th>
                <th>Fakultet</th>
                <th>Kurs</th>
                <th>Guruh</th>
                <th>Talaba tel</th>
                <th>Ota-ona tel</th>
                <th>Manzil turi</th>
                <th>Yashash turi</th>
                <th>Manzil</th>
                <th>Ega</th>
                <th>Ega tel</th>
                <th>Narxi</th>
                <th>Shartnoma</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->full_name }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->jshshr }}</td>
                <td>{{ $student->passport_id }}</td>
                <td>{{ $student->faculty }}</td>
                <td>{{ $student->course }}</td>
                <td>{{ $student->group }}</td>
                <td>{{ $student->student_phone }}</td>
                <td>{{ $student->parents_phone }}</td>
                <td>{{ $student->address_type }}</td>
                <td>{{ $student->housing_type }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->owner }}</td>
                <td>{{ $student->owner_phone }}</td>
                <td>{{ $student->price }}</td>
                <td>{{ $student->contract }}</td>
                <td>
                    <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-warning">Tahrirlash</a>
                    <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('O‘chirishga ishonchingiz komilmi?')">O‘chirish</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
