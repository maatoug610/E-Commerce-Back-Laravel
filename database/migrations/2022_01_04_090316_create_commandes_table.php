<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Code_Com')->unique();
            $table->double('Total_Com');
            $table->string('status');
            $table->date('date_Com');
            //Forgin key:
            $table->bigInteger('Prod_id')->unsigned()->index();
            $table->foreign('Prod_id')->references('id')->on('produits');
            $table->bigInteger('Client_id')->unsigned()->index();
            $table->foreign('Client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('commandes');
    }
}
