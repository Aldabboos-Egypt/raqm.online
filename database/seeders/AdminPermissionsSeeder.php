<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminPermissionsSeeder extends Seeder
{

    public $permissions = [];

    public function initPermissions()
    {

        $this->permissions = [

            ['name' => 'read-dashboard', 'display_name' => 'Read Dashboard', 'description' => 'عرض لوحة التحكم', 'path' => 'dashboard'],

            //admin
            ['name' => 'read-admin', 'display_name' => 'Read Admin', 'description' => 'عرض المسؤلين', 'path' => 'admins'],
            ['name' => 'create-admin', 'display_name' => 'Create Admin', 'description' => 'اضافة المسؤلين', 'path' => 'admins'],
            ['name' => 'update-admin', 'display_name' => 'Update Admin', 'description' => 'تعديل المسؤلين', 'path' => 'admins'],
            ['name' => 'delete-admin', 'display_name' => 'Delete Admin', 'description' => 'حذف المسؤلين', 'path' => 'admins'],

            //category
            ['name' => 'read-category', 'display_name' => 'Read Cagtegory ', 'description' => 'عرض الاقسام', 'path' => 'categories'],
            ['name' => 'create-category', 'display_name' => 'Create Cagtegory ', 'description' => 'اضافة الاقسام', 'path' => 'categories'],
            ['name' => 'update-category', 'display_name' => 'Update Cagtegory ', 'description' => 'تعديل الاقسام', 'path' => 'categories'],
            ['name' => 'delete-category', 'display_name' => 'Delete Cagtegory ', 'description' => 'حذف الاقسام', 'path' => 'categories'],

            //subcategory
            ['name' => 'read-subcategory', 'display_name' => 'Read SubCategory ', 'description' => 'عرض التخصصات', 'path' => 'subcategory'],
            ['name' => 'create-subcategory', 'display_name' => 'Create SubCategory ', 'description' => 'اضافة التخصصات', 'path' => 'subcategory'],
            ['name' => 'update-subcategory', 'display_name' => 'Update SubCategory ', 'description' => 'تعديل التخصصات', 'path' => 'subcategory'],
            ['name' => 'delete-subcategory', 'display_name' => 'Delete SubCategory ', 'description' => 'حذف التخصصات', 'path' => 'subcategory'],

            //clinic
            ['name' => 'read-clinic', 'display_name' => 'Read Clinic ', 'description' => 'عرض العيادات', 'path' => 'clinics'],
            ['name' => 'create-clinic', 'display_name' => 'Create Clinic ', 'description' => 'اضافة العيادات', 'path' => 'clinics'],
            ['name' => 'update-clinic', 'display_name' => 'Update Clinic ', 'description' => 'تعديل العيادات', 'path' => 'clinics'],
            ['name' => 'delete-clinic', 'display_name' => 'Delete Clinic ', 'description' => 'حذف العيادات', 'path' => 'clinics'],

            //city
            ['name' => 'read-city', 'display_name' => 'Read City ', 'description' => 'عرض المدن', 'path' => 'cities'],
            ['name' => 'create-city', 'display_name' => 'Create City ', 'description' => 'اضافة المدن', 'path' => 'cities'],
            ['name' => 'update-city', 'display_name' => 'Update City ', 'description' => 'تعديل المدن', 'path' => 'cities'],
            ['name' => 'delete-city', 'display_name' => 'Delete City ', 'description' => 'حذف المدن', 'path' => 'cities'],

            //add
            ['name' => 'read-add', 'display_name' => 'Read Add ', 'description' => 'عرض الاعلانات', 'path' => 'adds'],
            ['name' => 'create-add', 'display_name' => 'Create Add ', 'description' => 'اضافة الاعلانات', 'path' => 'adds'],
            ['name' => 'update-add', 'display_name' => 'Update Add ', 'description' => 'تعديل الاعلانات', 'path' => 'adds'],
            ['name' => 'delete-add', 'display_name' => 'Delete Add ', 'description' => 'حذف الاعلانات', 'path' => 'adds'],

            //roles
            ['name' => 'read-role', 'display_name' => 'Read Role', 'description' => 'عرض الادوار', 'path' => 'roles'],
            ['name' => 'create-role', 'display_name' => 'Create Role', 'description' => 'اضافة الادوار', 'path' => 'roles'],
            ['name' => 'update-role', 'display_name' => 'Update Role', 'description' => 'تعديل الادوار', 'path' => 'roles'],
            ['name' => 'delete-role', 'display_name' => 'Delete Role', 'description' => 'حذف الادوار', 'path' => 'roles'],

            // clinic requests
            ['name' => 'read-clinic_requests', 'display_name' => 'Read Clnic requests', 'description' => 'عرض تعديلات العيادات', 'path' => 'clinic_requests'],
            ['name' => 'read-clinic_comments', 'display_name' => 'Read Clnic Comments', 'description' => 'عرض تعليقات العيادات', 'path' => 'clinic_comments'],

        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->initPermissions();

        foreach ($this->permissions as $item) {
            if (!DB::table('permissions')->where('name', $item['name'])->exists()) {
                Permission::updateOrCreate($item);
            }
        }
    }
}
