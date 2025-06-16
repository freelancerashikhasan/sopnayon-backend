<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert(
            [
                // --------------------------
                [
                    'name' => 'access-all',
                    'group' => 'Main',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'settings',
                    'group' => 'Main',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'expense_category-visibility',
                    'group' => 'Expense Category',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'expense_category-create',
                    'group' => 'Expense Category',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'expense_category-edit',
                    'group' => 'Expense Category',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'expense_category-view',
                    'group' => 'Expense Category',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'expense_category-delete',
                    'group' => 'Expense Category',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                // --------------------------
                [
                    'name' => 'receive_category-visibility',
                    'group' => 'Receive Category',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'receive_category-create',
                    'group' => 'Receive Category',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'receive_category-edit',
                    'group' => 'Receive Category',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'receive_category-view',
                    'group' => 'Receive Category',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'receive_category-delete',
                    'group' => 'Receive Category',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'account-visibility',
                    'group' => 'Account',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'account-create',
                    'group' => 'Account',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'account-edit',
                    'group' => 'Account',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'account-view',
                    'group' => 'Account',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'account-delete',
                    'group' => 'Account',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'receive-visibility',
                    'group' => 'Receive',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'receive-create',
                    'group' => 'Receive',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'receive-edit',
                    'group' => 'Receive',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'receive-view',
                    'group' => 'Receive',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'receive-delete',
                    'group' => 'Receive',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'expense-visibility',
                    'group' => 'Expense',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'expense-create',
                    'group' => 'Expense',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'expense-edit',
                    'group' => 'Expense',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'expense-view',
                    'group' => 'Expense',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'expense-delete',
                    'group' => 'Expense',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'ledger-visibility',
                    'group' => 'Ledger',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'ledger-create',
                    'group' => 'Ledger',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'ledger-edit',
                    'group' => 'Ledger',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'ledger-view',
                    'group' => 'Ledger',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'ledger-delete',
                    'group' => 'Ledger',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'staff-visibility',
                    'group' => 'Staff',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'staff-create',
                    'group' => 'Staff',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'staff-edit',
                    'group' => 'Staff',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'staff-view',
                    'group' => 'Staff',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'staff-delete',
                    'group' => 'Staff',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'roles-visibility',
                    'group' => 'Roles',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'roles-create',
                    'group' => 'Roles',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'roles-edit',
                    'group' => 'Roles',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'roles-view',
                    'group' => 'Roles',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'roles-delete',
                    'group' => 'Roles',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'site_settings-visibility',
                    'group' => 'Site Settings',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'site_settings-create',
                    'group' => 'Site Settings',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'site_settings-edit',
                    'group' => 'Site Settings',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'site_settings-view',
                    'group' => 'Site Settings',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'site_settings-delete',
                    'group' => 'Site Settings',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'member-visibility',
                    'group' => 'Member',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'member-create',
                    'group' => 'Member',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'member-edit',
                    'group' => 'Member',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'member-view',
                    'group' => 'Member',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'member-delete',
                    'group' => 'Member',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'blog-visibility',
                    'group' => 'Blog',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'blog-create',
                    'group' => 'Blog',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'blog-edit',
                    'group' => 'Blog',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'blog-view',
                    'group' => 'Blog',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'blog-delete',
                    'group' => 'Blog',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'gallary-visibility',
                    'group' => 'Gallary',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'gallary-create',
                    'group' => 'Gallary',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'gallary-edit',
                    'group' => 'Gallary',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'gallary-view',
                    'group' => 'Gallary',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // --------------------------
                [
                    'name' => 'gallary-delete',
                    'group' => 'Gallary',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

            ]
        );
    }
}
