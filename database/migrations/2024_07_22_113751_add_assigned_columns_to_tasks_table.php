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
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('assigned_by_id')->nullable();
            $table->unsignedBigInteger('assigned_to_id')->nullable();
            
           
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn(['assigned_by_id', 'assigned_to_id']);
            // $table->dropForeign(['assigned_by_id']);
            // $table->dropForeign(['assigned_to_id']);
        });
    }
};
