<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigInteger('id')->unique();
            $table->uuid('user_id')->primary();
            $table->string('code', 15)->nullable();
            $table->string('name', 150)->nullable();
            $table->string('cpf_cnpj', 25)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('street', 100)->nullable();
            $table->string('number', 20)->nullable();
            $table->string('district', 50)->nullable();
            $table->string('city', 60)->nullable();
            $table->string('uf', 60)->nullable();
            $table->string('complement', 150)->nullable();
            $table->string('phone', 20)->nullable();
            $table->float('credit_limit', 10,2)->nullable();
            $table->date('validity')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
