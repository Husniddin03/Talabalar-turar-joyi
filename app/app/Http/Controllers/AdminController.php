<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Barcha talabalarni ko'rsatish
    public function index()
    {
        // Barcha talabalarni olish
        $students = Student::all();

        // Xona bo‘yicha guruhlash
        $grouped = $students->groupBy('address');

        // Roommates ni qo‘shib qaytarish
        $studentsWithRoommates = $students->map(function ($student) use ($grouped) {
            // Shu xonadagi boshqa odamlarni olish
            $roommates = $grouped[$student->address]
                ->where('id', '!=', $student->id) // o‘zini chiqarib tashlash
                ->pluck('full_name')              // faqat ism-familiya
                ->values();                       // indexlarni 0 dan yozish
            $img = $student->image ? asset('storage/' . $student->image) : asset('images/default-profile.png');
            return [
                "id" => $student->id,
                "image" => $img,
                "fullName" => $student->full_name,
                "gender" => $student->gender,
                "jshshr" => $student->jshshr,
                "passportId" => $student->passport_id,
                "faculty" => $student->faculty,
                "course" => $student->course,
                "group" => $student->group,
                "studentPhone" => $student->student_phone,
                "parentsPhone" => $student->parents_phone,
                "addressType" => $student->address_type,
                "housingType" => $student->housing_type,
                "address" => $student->address,
                "owner" => $student->owner,
                "ownerPhone" => $student->owner_phone,
                "price" => $student->price,
                "contract" => $student->contract,
                "roommates" => $roommates,
            ];
        });

        return view('admin.index', [
            'students' => $studentsWithRoommates
        ]);
    }


    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.show', compact('student'));
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
            'housing_type' => 'required|in:dormitory,rental',
            'address' => 'required|string',
            'owner' => 'required|string',
            'owner_phone' => 'required|string',
            'price' => 'nullable|string',
            'contract' => 'nullable|string',
            'image' => 'nullable|file|image|max:2048',
        ]);

        // Fayl yuklangan bo'lsa, saqlash
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('students', 'public');
            $validated['image'] = $path; // ❌ '/storage/' qo‘shmang
        } else {
            $path = $validated['gender'] === 'Erkak' ? "students/boy_image.png" : "students/girl_image.png";
            $validated['image'] = $path;
        }


        Student::create($validated);
        return redirect()->route('admin.index')->with('success', "Talaba muvaffaqiyatli qo'shildi!");
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
            'housing_type' => 'required|in:dormitory,rental',
            'address' => 'required|string',
            'owner' => 'required|string',
            'owner_phone' => 'required|string',
            'price' => 'nullable|string',
            'contract' => 'nullable|string',
            'image' => 'nullable|file|image|max:2048',
        ]);

        // Fayl yuklangan bo'lsa, eski rasmni o'chirish va yangisini saqlash
        if ($request->hasFile('image')) {
            // Eski rasmni o'chirish
            if ($student->image && file_exists(public_path($student->image))) {
                @unlink(public_path($student->image));
            }
            $path = $request->file('image')->store('students', 'public');
            $validated['image'] = $path;
        } else {
            $path = $validated['gender'] === 'Erkak' ? "students/boy_image.png" : "students/girl_image.png";
            $validated['image'] = $path;
        }

        $student->update($validated);
        return redirect()->route('admin.index')->with('success', 'Talaba yangilandi!');
    }

    // Talabani o'chirish
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        // Eski rasmni o'chirish (faqat default bo'lmagan rasm bo'lsa)
        $defaultImages = ['students/boy_image.png', 'students/girl_image.png'];
        if (
            $student->image &&
            !in_array($student->image, $defaultImages) &&
            file_exists(public_path("storage/" . $student->image))
        ) {
            @unlink(public_path("storage/" . $student->image));
        }
        $student->delete();
        return redirect()->route('admin.index')->with('success', "Talaba o'chirildi!");
    }
}
