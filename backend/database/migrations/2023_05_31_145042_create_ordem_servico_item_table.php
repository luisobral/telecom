<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdemServicoItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_servico_item', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade')->notNullable();
            $table->foreignId('ordem_servico_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('produtos_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordem_servico_item');
    }
}
