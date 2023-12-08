<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        \App\Models\PostState::factory()->create(['name'=>'Published','description'=>'Post Published']);
        \App\Models\PostState::factory()->create(['name'=>'In Queue','description'=>'Post In queue']);
        \App\Models\PostState::factory()->create(['name'=>'Waiting','description'=>'Post Waiting']);

        \App\Models\Plataform::factory()->create(['name'=>'Twitter','description'=>'Twitter API']);

        \App\Models\User::factory()->create([
            'name' => 'Gustavo',
            'email' => 'gespinozac@est.utn.ac.cr',
            'phone' => '89633629',
            'email_verified_at' => now(),
            'password' => '$2y$10$NfUS8KFiUdFZtNZRctyKbuOTuBPe2MbFr23dbjMv9juyfv7KRkUEy', // 1231231
            'remember_token' => ''
        ]);

        \App\Models\Post::factory(10)->create(['user_id'=>'1','post_state_id'=>'1','plataform_id'=>'1']);
    }
}
