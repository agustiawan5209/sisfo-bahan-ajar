<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $permission = Permission::create(['name' => 'add materi']);
        $permission = Permission::create(['name' => 'delete materi']);
        $permission = Permission::create(['name' => 'read materi']);
        $permission = Permission::create(['name' => 'edit materi']);
        $permission = Permission::create(['name' => 'unggah materi']);
        $permission = Permission::create(['name' => 'akses materi']);

        // Tugas
        $permission = Permission::create(['name' => 'add tugas']);
        $permission = Permission::create(['name' => 'read tugas']);
        $permission = Permission::create(['name' => 'unggah tugas']);
        $permission = Permission::create(['name' => 'delete tugas']);

        // Evaluasi
        $permission = Permission::create(['name' => 'add evaluasi']);
        $permission = Permission::create(['name' => 'read evaluasi']);
        $permission = Permission::create(['name' => 'delete evaluasi']);

        // kelas Hanya Untuk Admin
        $permission = Permission::create(['name' => 'add kelas']);
        $permission = Permission::create(['name' => 'read kelas']);
        $permission = Permission::create(['name' => 'edit kelas']);
        $permission = Permission::create(['name' => 'delete kelas']);

        // Guru
        $permission = Permission::create(['name' => 'add guru']);
        $permission = Permission::create(['name' => 'read guru']);
        $permission = Permission::create(['name' => 'edit guru']);
        $permission = Permission::create(['name' => 'delete guru']);

        $guru = Role::create(['name' => 'guru']);
        $guru->givePermissionTo('add materi');
        $guru->givePermissionTo('delete materi');
        $guru->givePermissionTo('read materi');
        $guru->givePermissionTo('edit materi');
        $guru->givePermissionTo('unggah materi');
        $guru->givePermissionTo('add tugas');
        $guru->givePermissionTo('read tugas');
        $guru->givePermissionTo('add evaluasi');
        $guru->givePermissionTo('read evaluasi');
        $guru->givePermissionTo('delete evaluasi');
        $guru->givePermissionTo('delete tugas');

        $siswa = Role::create(['name' => 'siswa']);
        $siswa->givePermissionTo('read materi');
        $siswa->givePermissionTo('read tugas');
        $siswa->givePermissionTo('unggah tugas');
        $siswa->givePermissionTo('read evaluasi');

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('add guru');
        $admin->givePermissionTo('delete guru');
        $admin->givePermissionTo('edit guru');
        $admin->givePermissionTo('read guru');
        $admin->givePermissionTo('add kelas');
        $admin->givePermissionTo('delete kelas');
        $admin->givePermissionTo('edit kelas');
        $admin->givePermissionTo('read kelas');

        $Admin_user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $user = \App\Models\User::factory()->create([
            'name' => 'guru',
            'email' => 'guru@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $user_siswa = \App\Models\User::factory()->create([
            'name' => 'siswa',
            'email' => 'siswa@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $Admin_user->assignRole($admin);
        $user->assignRole($guru);
        $user_siswa->assignRole($siswa);

    }
}
