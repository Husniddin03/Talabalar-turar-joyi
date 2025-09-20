<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
                // "jshshr" => $student->jshshr,
                // "passportId" => $student->passport_id,
                "faculty" => $student->faculty,
                "course" => $student->course,
                "group" => $student->group,
                "studentPhone" => $student->student_phone,
                // "parentsPhone" => $student->parents_phone,
                "addressType" => $student->address_type,
                "housingType" => $student->housing_type,
                "address" => $student->address,
                // "owner" => $student->owner,
                // "ownerPhone" => $student->owner_phone,
                // "price" => $student->price,
                // "contract" => $student->contract,
                "roommates" => $roommates,
            ];
        });

        return view('student.index', [
            'students' => $studentsWithRoommates
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
