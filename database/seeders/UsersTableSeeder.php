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
    public function run()
    {
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $editorRole = Role::firstOrCreate(['name' => 'Editor']);
        $viewerRole = Role::firstOrCreate(['name' => 'Viewer']);
        $permissions = Permission::pluck('id', 'id')->all();
        $adminRole->syncPermissions($permissions);
        $admin = User::firstOrCreate(
            ['username' => 'Admin'],
            [
                'name' => 'Admin',
                'is_active' => true,
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        $admin->assignRole([$adminRole->id]);
        User::factory()->count(10)->create()->each(function ($user) use ($adminRole, $editorRole, $viewerRole) {
            $roles = [$adminRole, $editorRole, $viewerRole];
            $randomRole = $roles[array_rand($roles)];
            $user->assignRole($randomRole);
        });
    }
}
