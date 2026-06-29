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
        Schema::create('activos', function (Blueprint $table) {
            $table->id();

            $table->string('codigo',30)->unique();
            $table->string('descrip',200);

            $table->decimal('precio',10,2);

            $table->date('fadquisicion')->nullable();

            $table->string('foto')->nullable();

            // Foreign Keys
            $table->foreignId('estados_id')->constrained('estados')->OnDelete('cascade');
            $table->foreignId('grupos_id')->constrained('grupos')->OnDelete('cascade');
            $table->foreignId('oficinas_id')->constrained('oficinas')->OnDelete('cascade');
            $table->foreignId('responsables_id')->constrained('responsables')->OnDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activos');
    }
};
