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
    Schema::table('translated_contents', function (Blueprint $table) {
    $table->foreign('original_content_id')
          ->references('id')->on('settings')
          ->onDelete('cascade');
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