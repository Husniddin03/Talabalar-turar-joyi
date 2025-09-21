<?php

namespace App\Http\Controllers;

use App\Models\Human;
use Illuminate\Http\Request;

class HumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $humans = Human::all();
        return view('human.index', compact('humans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('human.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jshshr' => 'required|unique:humans,jshshr',
            'passport_id' => 'required|unique:humans,passport_id',
            'role' => 'required|in:student,admin',
        ]);

        Human::create($validated);

        return redirect()->route('humans.index')->with('success', 'Human muvaffaqiyatli qo‘shildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $human = Human::findOrFail($id);
        return view('human.show', compact('human'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $human = Human::findOrFail($id);
        return view('human.edit', compact('human'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $human = Human::findOrFail($id);

        $validated = $request->validate([
            'jshshr' => 'required|unique:humans,jshshr,' . $human->id,
            'passport_id' => 'required|unique:humans,passport_id,' . $human->id,
            'role' => 'required|in:student,admin',
        ]);

        $human->update($validated);

        return redirect()->route('humans.index')->with('success', 'Human ma\'lumotlari yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $human = Human::findOrFail($id);
        $human->delete();

        return redirect()->route('humans.index')->with('success', 'Human o‘chirildi!');
    }
}