<?php

namespace Database\Seeders;

use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Status;
use App\Models\Program;
use App\Models\Position;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $roles= [
            'admin',
            'employee',
            'student',
            'visitor'
        ];

        foreach ($roles as $role) {
            Role::create(['role' => $role]);
        };

        $statuses = [
            'active',
            'inactive',
            'pending'
        ];

        foreach ($statuses as $status) {
            Status::create(['status' => $status]);
        }

        User::create([
            'role_id' => DB::table('roles')->where('role', 'admin')->value('id'),
            'status_id' => DB::table('statuses')->where('status', 'active')->value('id'),
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('alfalahsukorame8113'),
            'remember_token' => Str::random(10),
        ]);

        $programs = [
            'Al-Quran',
            'Iqro',
            'Yanbua',
            'Quran Massive',
        ];

        foreach ($programs as $program) {
            Program::create(['program' => $program]);
        }

        $positions = [
            'Ketua Takmir Masjid',
            'Kepala TPQ',
            'Ustadz',
            'Ketua Medinfo'
        ];

        foreach ($positions as $position) {
            Position::create(['position' => $position]);
        }

    }
}
