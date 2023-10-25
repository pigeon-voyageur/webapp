<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
        });

        $categories = [
            ['geopolitics', 'Géopolitique'],
            ['culture', 'Culture'],
            ['environment', 'Environnement'],
            ['sport', 'Sport'],
            ['economy', 'Économie'],
            ['history', 'Histoire'],
            ['miscellaneous', 'Divers'],
            ['unusual', 'Insolite'],
        ];

        foreach ($categories as $category) {
            DB::table('news_categories')->insert(['name' => $category[0], 'title' => $category[1]]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_categories');
    }
};
