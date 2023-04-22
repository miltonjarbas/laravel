<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->string('nome_campo');
            $table->text('valor_antigo')->nullable();
            $table->text('valor_novo')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->tinyInteger('is_delete')->default(0);
            $table->timestamps();
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historico_produtos');
    }
};
