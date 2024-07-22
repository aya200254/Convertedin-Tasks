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
    Schema::table('statistics', function (Blueprint $table) {
        $table->integer('task_count')->default(0); 
    });
}

public function down()
{
    Schema::table('statistics', function (Blueprint $table) {
        $table->dropColumn('task_count');
    });
}
};
