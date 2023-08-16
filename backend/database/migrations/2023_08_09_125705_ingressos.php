<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Evento;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingressos', function (Blueprint $table) {
            $table->id();
            $table->boolean('quitado');
            $table->string('tipo', 20);
            $table->decimal('valor', $precision = 8, $scale = 2);
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Evento::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingressos');
    }
};
