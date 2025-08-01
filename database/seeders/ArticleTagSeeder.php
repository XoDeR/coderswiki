<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tagNames = [
            'js',
            'ts',
            'php',
            'laravel',
            'react',
            'vue',
            'angular',
            'go',
        ];
    }
}
