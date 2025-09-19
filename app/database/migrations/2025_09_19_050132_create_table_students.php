<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_students', function (Blueprint $table) {
            $table->id(); // id
            $table->string('image')->nullable(); // rasm url
            $table->string('full_name'); // F.I.O
            $table->enum('gender', ['Erkak', 'Ayol']); // jinsi
            $table->string('jshshr', 14)->unique(); // JShShIR
            $table->string('passport_id')->unique(); // Pasport ID
            $table->string('faculty'); // Fakultet
            $table->string('course'); // Kurs
            $table->string('group'); // Guruh
            $table->string('student_phone'); // Talaba tel
            $table->string('parents_phone'); // Ota-ona tel
            $table->enum('address_type', ['Yotoqxona', 'Ijara']); // Manzil turi
            $table->enum('housing_type', ['dormitory', 'rented']); // yashash turi
            $table->string('address'); // Manzil (xona raqami, ko‘cha va h.k.)
            $table->string('owner'); // Uy/yotoqxona egasi yoki universitet
            $table->string('owner_phone'); // Uy/yotoqxona egasi tel
            $table->string('price')->nullable(); // Narxi (string ko‘rinishida)
            $table->string('contract')->nullable(); // Shartnoma turi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_students');
    }
};
