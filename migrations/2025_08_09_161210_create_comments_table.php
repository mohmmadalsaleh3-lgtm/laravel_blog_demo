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
    Schema::create('comments', function (Blueprint $table) {
        $table->id('comment_id'); // يعادل INT AUTO_INCREMENT PRIMARY KEY
        $table->text('content');
        
        
        $table->unsignedBigInteger('user_id')->nullable();
        $table->unsignedBigInteger('post_id');

        $table->timestamp('created_at')->useCurrent();

        
        $table->foreign('user_id')
              ->references('id') 
              ->on('users')
              ->onDelete('set null');

        
        $table->foreign('post_id')
              ->references('post_id')
              ->on('posts')
              ->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
