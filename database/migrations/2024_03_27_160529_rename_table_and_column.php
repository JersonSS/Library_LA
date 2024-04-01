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
        Schema::rename('status_books', 'book_statuses'); // Renombrar la tabla
        Schema::table('book_statuses', function (Blueprint $table) {
            $table->renameColumn('status_books', 'status'); // Renombrar el campo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('book_statuses', 'status_books'); // Deshacer renombrar la tabla
        Schema::table('status_books', function (Blueprint $table) {
            $table->renameColumn('status', 'status_books'); // Deshacer renombrar el campo
        });
    }
};
