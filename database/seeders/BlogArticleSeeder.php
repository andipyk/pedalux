<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\BlogArticle;
use Illuminate\Database\Seeder;

class BlogArticleSeeder extends Seeder
{
    public function run(): void
    {
        $admins = Admin::all();
        
        if ($admins->isEmpty()) {
            return;
        }

        // Create 10 articles, each written by a random admin
        BlogArticle::factory(10)->create([
            'admin_id' => $admins->random()->id,
        ]);
    }
}
