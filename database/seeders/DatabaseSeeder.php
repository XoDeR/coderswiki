<?php

namespace Database\Seeders;

use App\Models\FormSession;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            ArticleTagSeeder::class,
        ]);

        // create a test multi step form:
        $existing = FormSession::find(1);

        if ($existing) {
            $existing->delete();
        } else {
            FormSession::create([
                'id' => 1,
                'user_id' => null,
                'data' => null,
                'current_step' => 0,
            ]);
        }
    }
}
