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
        Schema::create('translated_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('original_content_id')->constrained("posts")->onDelete('cascade');
            $table->string("language_code");
            $table->string("translated_title");
            // $table->string("translated_content");
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};