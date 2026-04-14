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
    Schema::table('stories', function (Blueprint $table) {
        // Menambahkan relasi ke tabel users
        $table->foreignId('user_id')->after('id')->constrained()->cascadeOnDelete();
        // Menghapus kolom author manual karena nama akan diambil dari profil user
        $table->dropColumn('author'); 
    });
}

public function down(): void
{
    Schema::table('stories', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
        $table->string('author');
    });
}
};
