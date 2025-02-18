<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('topicTitle', 100);
            $table->longText('content');
            $table->integer('NoOfViews');
            
            $table->string('image',2000);
            $table->boolean('published');
            $table->boolean('trending');
            $table->foreignId('category_id')->constrained('categories')->unique();
            //$table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
