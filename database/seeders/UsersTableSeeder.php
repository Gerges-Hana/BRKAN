<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('users')->count() == 0) {
            $user = User::query()->create([
                'name' => 'Admin',
                'username' => 'Admin',
                'is_active' => true,
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $role = Role::create(['name' => 'Admin']);

            $permissions = Permission::query()->pluck('id', 'id')->all();

            $role->syncPermissions($permissions);

            $user->assignRole([$role->id]);
        }
    }


}
