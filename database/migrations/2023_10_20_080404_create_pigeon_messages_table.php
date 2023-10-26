<?php

use App\Models\News;
use App\Models\Pigeon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pigeon_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(News::class)->constrained();
            $table->foreignIdFor(Pigeon::class)->constrained()->onDelete('cascade');
            $table->timestamp('arrival_date');
            $table->boolean('is_read')->default(false);
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
