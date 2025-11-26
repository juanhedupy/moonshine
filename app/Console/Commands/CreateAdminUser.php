<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'admin:create 
                            {name=Administrador : Nombre del usuario} 
                            {email=admin@tiendita.com : Email del usuario} 
                            {password=12345678 : Contraseña del usuario}';

    /**
     * The console command description.
     */
    protected $description = 'Crea un usuario administrador para MoonShine';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        // Verificar si el usuario ya existe
        $user = User::where('email', $email)->first();
        if ($user) {
            $this->error("El usuario con email {$email} ya existe.");
            return 1;
        }

        // Crear usuario
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info("Usuario administrador creado exitosamente!");
        $this->info("Email: {$email}");
        $this->info("Contraseña: {$password}");

        return 0;
    }
}
