<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // =============
            'الرئسيه',
            
            // =============
            ' القواعد',
            'انشاء قاعده',
            'عرض القاعده',
            'تعديل القاعده',
            'حذف القاعده',
            // =============
            'الشركات',
            'انشاء الشركه',
            'عرض الشركه',
            'تعديل الشركه',
            'حذف الشركه',
            // =============
           
            


        ];

        if (DB::table('permissions')->count() == 0) {
            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
