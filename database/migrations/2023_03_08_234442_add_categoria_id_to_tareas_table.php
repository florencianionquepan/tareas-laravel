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
        Schema::table('tareas', function (Blueprint $table) {
            $table->bigInteger('categoria_id')->unsigned();
            $table
                    ->foreign('categoria_id')
                    ->references('id')
                    ->on('categorias')
                    ->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tareas', function (Blueprint $table) {
            //
        });
    }
};
