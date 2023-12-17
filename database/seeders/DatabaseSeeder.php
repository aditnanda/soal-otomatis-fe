<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Tnc;
use App\Models\User;
use App\Models\User_role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::create([
            'name' => 'Admin'
        ]);

        Role::create([
            'name' => 'Member'
        ]);

        Role::create([
            'name' => 'Manager'
        ]);

        Role::create([
            'name' => 'Direktur'
        ]);

        Tnc::create([
            'hak_dan_kewajiban_anggota_koperasi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fringilla leo metus, sed auctor lorem tempus et. Nulla semper sit amet est nec faucibus. Integer lacinia nunc in lacus rhoncus, et venenatis lacus molestie. Nullam accumsan erat eu turpis consectetur congue vel ut mi. Nunc aliquet felis justo, vel semper quam pellentesque non. Pellentesque vestibulum malesuada orci, lacinia lobortis nisl luctus in. Nam eget iaculis justo. Maecenas non porttitor urna. Cras fringilla eleifend enim sed sollicitudin. Etiam quam nisi, pellentesque id purus sed, ultrices malesuada orci. Mauris id feugiat ligula. Fusce in iaculis lectus. Aliquam venenatis nunc eget malesuada maximus. Vivamus in finibus ante, non laoreet dui. Nullam fringilla mauris eu massa eleifend porta eu at augue. Nullam pulvinar augue dui, ut egestas nibh tempor eget.

            Pellentesque ut odio id turpis molestie lobortis. Nullam euismod tincidunt imperdiet. Vivamus semper porta odio, faucibus auctor nisi malesuada sit amet. Donec eleifend justo in nisl sollicitudin finibus. Nunc hendrerit, mi at feugiat condimentum, urna augue ornare dolor, auctor tincidunt nunc magna nec risus. Donec vitae hendrerit sapien. Nunc vel urna eget odio mattis sollicitudin quis et augue.

            Proin sit amet ipsum accumsan, vestibulum est nec, pharetra neque. Nulla facilisi. Nam lacus eros, facilisis tincidunt consectetur sit amet, pellentesque a odio. Aenean egestas tortor tincidunt turpis imperdiet, egestas lacinia lacus rhoncus. Donec sed venenatis nulla. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla scelerisque elit nibh, vitae elementum tortor accumsan non. In sodales imperdiet est et ultricies.

            Vestibulum quis tellus urna. Ut vulputate risus pretium est feugiat, vitae lobortis orci ultricies. Nulla vel odio ac nisl varius ultrices. In hac habitasse platea dictumst. Aliquam luctus magna sed lorem gravida, sit amet blandit felis efficitur. Vivamus eget bibendum nulla. Praesent ut purus sollicitudin, vestibulum odio ac, scelerisque metus. Suspendisse sed cursus nunc. Proin in pellentesque leo, et dignissim libero.

            Maecenas nisi velit, finibus ut condimentum et, euismod ac libero. Suspendisse tristique est ut lacus dapibus, eget semper nibh dapibus. Etiam lobortis egestas lacus sit amet varius. Nulla sit amet lacinia lorem, id mollis dui. Aliquam non blandit neque. Nullam accumsan orci ac iaculis lacinia. Sed ut libero urna. Duis vulputate ipsum vitae laoreet molestie. Nunc scelerisque nulla vel magna aliquet, fringilla pellentesque urna semper. Curabitur a consequat diam, id consequat leo. Suspendisse nec consectetur eros.

            ',
            'nama_koperasi' => 'PANGANHUB',
            'tagline' => 'PanganHub'
        ]);

        $user = User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make("12345678"),
            'name' => 'Admin',
            'phone' => '12345678'
        ]);

        User_role::create([
            'user_id' => 1,
            'role_id' => 1
        ]);
    }
}
