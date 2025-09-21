<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'jshshr' => 'required|string',
            'passport_id' => 'required|string',
        ]);


        // Foydalanuvchini JSHSHR va passport_id bo'yicha tekshirish
        $user = \App\Models\Human::where('jshshr', $credentials['jshshr'])
            ->where('passport_id', $credentials['passport_id'])
            ->first();
        if ($user) {
            // Foydalanuvchi topildi, sessiyaga saqlash
            session(['user_id' => $user->id, 'role' => $user->role]);

            // Rolga qarab yo'naltirish
            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('students.index');
            }
        } else {
            // Foydalanuvchi topilmadi, xato xabarini qaytarish
            return back()->withErrors(['login_error' => 'Noto\'g\'ri JSHSHR yoki Passport ID'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Muvaffaqiyatli chiqdingiz!');
    }
}
