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
        $guru = Role::create(['name' => 'guru']);
        $permission = Permission::create(['name' => 'add materi']);
        $permission = Permission::create(['name' => 'delete materi']);
        $permission = Permission::create(['name' => 'read materi']);
        $permission = Permission::create(['name' => 'edit materi']);
        $permission = Permission::create(['name' => 'unggah materi']);
        $permission = Permission::create(['name' => 'add tugas']);
        $permission = Permission::create(['name' => 'read tugas']);
        $permission = Permission::create(['name' => 'add evaluasi']);
        $permission = Permission::create(['name' => 'read evaluasi']);
        $permission = Permission::create(['name' => 'akses materi']);
        $permission = Permission::create(['name' => 'unggah tugas']);


        $guru->givePermissionTo('add materi');
        $guru->givePermissionTo('delete materi');
        $guru->givePermissionTo('read materi');
        $guru->givePermissionTo('edit materi');
        $guru->givePermissionTo('unggah materi');
        $guru->givePermissionTo('add tugas');
        $guru->givePermissionTo('read tugas');
        $guru->givePermissionTo('add evaluasi');
        $guru->givePermissionTo('read evaluasi');

        $siswa = Role::create(['name' => 'siswa']);
        $siswa->givePermissionTo('read materi');
        $siswa->givePermissionTo('read tugas');
        $siswa->givePermissionTo('unggah tugas');
        $siswa->givePermissionTo('read evaluasi');


        $user = \App\Models\User::factory()->create([
            'name' => 'guru',
            'email' => 'guru@example.com',
            'password'=> bcrypt('12345678'),
        ]);
        $user_siswa = \App\Models\User::factory()->create([
            'name' => 'siswa',
            'email' => 'siswa@example.com',
            'password'=> bcrypt('12345678'),
        ]);

        $user->assignRole($guru);
        $user_siswa->assignRole($siswa);
    }
}
