<?php

namespace Database\Seeders;
use App\Enums\NivelAcesso;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'nome' => 'Moises Weber',
            'email' => 'moi01@gmail.com',
            'nivel_acesso' => NivelAcesso::DIRETOR->value,
            'email_verified_at' => now()
        ]);

        \App\Models\User::factory()->create([
            'nome' => 'Moises Weber',
            'email' => 'moi02@gmail.com',
            'nivel_acesso' => NivelAcesso::COLABORADOR->value,
            'email_verified_at' => now()
        ]);

        \App\Models\User::factory()->create([
            'nome' => 'Moises Weber',
            'email' => 'moi03@gmail.com',
            'nivel_acesso' => NivelAcesso::COLABORADOR->value,
            'email_verified_at' => now()
        ]);

        \App\Models\User::factory()->create([
            'nome' => 'Moises Weber',
            'email' => 'moi04@gmail.com',
            'nivel_acesso' => NivelAcesso::COLABORADOR->value,
            'email_verified_at' => now()
        ]);

        \App\Models\User::factory()->create([
            'nome' => 'Moises Weber',
            'email' => 'moi05@gmail.com',
            'email_verified_at' => now()
        ]);

        \App\Models\User::factory()->create([
            'nome' => 'Moises Weber',
            'email' => 'moi06@gmail.com',
            'email_verified_at' => now()
        ]);

        \App\Models\User::factory()->create([
            'nome' => 'Moises Weber',
            'email' => 'moi07@gmail.com',
            'email_verified_at' => now()
        ]);

        \App\Models\User::factory()->create([
            'nome' => 'Moises Weber',
            'email' => 'moi08@gmail.com',
            'email_verified_at' => now()
        ]);

        \App\Models\User::factory()->create([
            'nome' => 'Moises Weber',
            'email' => 'moi09@gmail.com',
            'email_verified_at' => now()
        ]);
    }
}
