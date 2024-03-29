<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('id_payment')->nullable();
            $table->string('titre');
            $table->string('Secteur');
            $table->string('Status') -> nullable();
            $table->string('Montant_de_levée');
            $table->string('Prix_des_actions');
            $table->string('Monnaie');
            $table->text('courte_description');
            $table->date('Duree_de_la_levée') -> nullable();
            $table->text('description');
            $table->text('Localisation');
            $table->json('images') -> nullable(); // Modifier le type de la colonne en "json"
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
        Schema::dropIfExists('products');
    }
}
