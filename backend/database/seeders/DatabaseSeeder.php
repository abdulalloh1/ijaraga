<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(Role::count() === 0) {
            $this->call(PermissionSeeder::class);
        }

        $user = User::factory()->create([
            'name' => 'abdulAlloh1',
            'email' => 'jasurbek.abdukhalikov@gmail.com',
            'phone' => '+998901200030',
            'password' => bcrypt('qwerty123'),
            'is_verified' => true,
            'email_verified_at' => now(),
        ]);

        $user->assignRole('admin');

        $this->call([
            CategorySeeder::class,
        ]);
    }
}
