<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengguna = new Pengguna;
        $pengguna->username = 'Akhnafal';
        $pengguna->password = Hash::make('root'); // Hash the password
        $pengguna->nama_lengkap = 'Noor Akhnafal Aban';
        $pengguna->role = 'super_admin';
        $pengguna->status = 'active';
        $pengguna->save();
    }
}
