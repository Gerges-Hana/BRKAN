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
            ' الطلبيات',
            'عرض الطلبيه',
            'تعديل الطلبيه',
            'تفاصيل الطلبيه',
            'حذف الطلبيه',

            // =============
            ' التقارير',
            // =============
            ' القواعد',
            'انشاء قاعده',
            'عرض القاعده',
            'تعديل القاعده',
            'حذف القاعده',
            // =============
            ' المستخدمين',
            'انشاء مستخدم',
            'عرض المستخدم',
            'تعديل المستخدم',
            'حذف المستخدم',
            // =============
            ' حالات التوصيل',
            'انشاء حاله',
            'عرض الحاله',
            'تعديل الحاله',
            'حذف الحاله',
            


        ];

        if (DB::table('permissions')->count() == 0) {
            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
