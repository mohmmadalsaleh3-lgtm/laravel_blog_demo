<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id('post_id'); // يعادل INT AUTO_INCREMENT PRIMARY KEY
        $table->string('title', 255);
        $table->text('content')->nullable();
        $table->unsignedBigInteger('user_id');
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

        // المفتاح الأجنبي
        $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
