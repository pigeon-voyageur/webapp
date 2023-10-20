<?php

use App\Models\News;
use App\Models\Pigeon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pigeon_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(News::class)->constrained();
            $table->foreignIdFor(Pigeon::class)->constrained();
            $table->timestamp('arrival_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pigeon_messages');
    }
};
