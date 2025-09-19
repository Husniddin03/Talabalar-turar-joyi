<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Barcha talabalarni ko'rsatish
    public function index()
    {
        $students = Student::all();
        return view('admin.index', compact('students'));
    }

    // Yangi talaba qo'shish formasi
    public function create()
    {
        return view('admin.create');
    }

    // Yangi talaba saqlash
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'required|in:Erkak,Ayol',
            'jshshr' => 'required|string|size:14|unique:table_students,jshshr',
            'passport_id' => 'required|string|unique:table_students,passport_id',
            'faculty' => 'required|string',
            'course' => 'required|string',
            'group' => 'required|string',
            'student_phone' => 'required|string',
            'parents_phone' => 'required|string',
            'address_type' => 'required|in:Yotoqxona,Ijara',
            'housing_type' => 'required|in:dormitory,rented',
            'address' => 'required|string',
            'owner' => 'required|string',
            'owner_phone' => 'required|string',
            'price' => 'nullable|string',
            'contract' => 'nullable|string',
            'image' => 'nullable|string',
        ]);
        Student::create($validated);
        return redirect()->route('admin.index')->with('success', 'Talaba muvaffaqiyatli qo\'shildi!');
    }

    // Talabani tahrirlash formasi
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.edit', compact('student'));
    }

    // Talabani yangilash
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'required|in:Erkak,Ayol',
            'jshshr' => 'required|string|size:14|unique:table_students,jshshr,' . $id,
            'passport_id' => 'required|string|unique:table_students,passport_id,' . $id,
            'faculty' => 'required|string',
            'course' => 'required|string',
            'group' => 'required|string',
            'student_phone' => 'required|string',
            'parents_phone' => 'required|string',
            'address_type' => 'required|in:Yotoqxona,Ijara',
            'housing_type' => 'required|in:dormitory,rented',
            'address' => 'required|string',
            'owner' => 'required|string',
            'owner_phone' => 'required|string',
            'price' => 'nullable|string',
            'contract' => 'nullable|string',
            'image' => 'nullable|string',
        ]);
        $student->update($validated);
        return redirect()->route('admin.index')->with('success', 'Talaba yangilandi!');
    }

    // Talabani o'chirish
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('admin.index')->with('success', 'Talaba o\'chirildi!');
    }
}
