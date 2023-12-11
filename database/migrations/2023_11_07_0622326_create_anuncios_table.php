<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\anuncio;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100)->nullable();;
            $table->text('descripcion')->nullable();
            $table->enum('estado', [anuncio::publicado, anuncio::no_publicado])->default(anuncio::publicado);
            $table->string('celular')->nullable();
            $table->integer('pago_mensual')->nullable();
            $table->decimal('latitud', 10,6);
            $table->decimal('longitud', 10,6);
            $table->string('nombre_calle', 100)->nullable();
            $table->text('referencia', 200)->nullable();
            $table->string('garantia', 100)->nullable();
            $table->integer('garantia_valor')->default(0);
            $table->string('slug', 100);
            $table->string('foto_url',1000)->nullable();
           
            $table->string('sector',100)->nullable();
            $table->string('tipo_inmueble',100)->nullable();
            $table->string('servicio_basico',1000)->nullable();
            $table->string('servicio_adicional',1000)->nullable();
           
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('sector_id')->nullable();
            $table->unsignedBigInteger('inmueble_id')->nullable();
            
            $table->foreign('sector_id')->references('id')->on('sectores')->onDelete('cascade');
            $table->foreign('inmueble_id')->references('id')->on('tipo_inmuebles')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};
