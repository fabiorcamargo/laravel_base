<?php

namespace Database\Seeders;

use App\Models\UserResume;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserResume::insert([
            "user_id" => 1,
            "nome" => "Fábio Camargo",
            "objetivo" => "Meu objetivo é",
            "nascimento" => "1986-11-13",
            "telefone" => "42991622889",
            "email" => "fabiorcamargo@gmail.com",
            "uf" => "PR",
            "cidade" => "TELÊMACO BORBA",
            "cursos_complementares" => "Cursos",
            "formacao" => "Formação",
            "skills" => '{
                "id":1,
                "nome":"Alexandre Gama",
                "endereco":"R. Qualquer"
             }'
        ]);
    }
}
