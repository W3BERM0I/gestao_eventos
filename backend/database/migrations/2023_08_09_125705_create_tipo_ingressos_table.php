<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Evento;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipo_ingressos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->string('descricao', 200);
            $table->Integer('qtd_ingressos');
            $table->Integer('vendidos')->default(0);
            $table->decimal('valor', $precision = 8, $scale = 2);
            $table->foreignIdFor(Evento::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_ingressos');
    }
};
