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
    Schema::create('categories', function (Blueprint $table) {
        $table->id('category_id'); // يعادل INT AUTO_INCREMENT PRIMARY KEY
        $table->string('name', 50)->unique();
        $table->text('description')->nullable();
        $table->timestamps(); // يضيف created_at و updated_at تلقائيًا
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
