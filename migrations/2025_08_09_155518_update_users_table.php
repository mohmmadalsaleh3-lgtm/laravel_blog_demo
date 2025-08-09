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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username', 50)->unique()->after('id');
            }

            if (!Schema::hasColumn('users', 'password')) {
                $table->string('password', 255)->after('email');
            }

            if (!Schema::hasColumn('users', 'created_at')) {
                $table->timestamp('created_at')->useCurrent()->after('password');
            }

            if (!Schema::hasColumn('users', 'is_admin')) {
                $table->boolean('is_admin')->default(false)->after('created_at');
            }
        });
    }



    /**
     * Reverse the migrations.
     */
   public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'password', 'created_at', 'is_admin']);
        });
    }
};
