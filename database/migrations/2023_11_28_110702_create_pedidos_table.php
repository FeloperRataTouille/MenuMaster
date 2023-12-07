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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comanda_id')->constrained('comandas');
            $table->foreignId('prato_id')->constrained('pratos');
            $table->integer('quantidade');
            $table->string('observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('pedidos', function (Blueprint $table) {
        // O nome da chave estrangeira precisa ser o mesmo usado ao criá-la
        $table->dropForeign(['prato_id']); // Substitua 'prato_id' pelo nome correto da chave estrangeira

        // Remove a coluna que referencia a tabela pratos
        $table->dropColumn('prato_id');
    });

    Schema::table('pedidos', function (Blueprint $table) {
        // O nome da chave estrangeira precisa ser o mesmo usado ao criá-la
        $table->dropForeign(['comanda_id']); // Substitua 'prato_id' pelo nome correto da chave estrangeira

        // Remove a coluna que referencia a tabela pratos
        $table->dropColumn('comanda_id');
    });

    // Remova a tabela pratos
    Schema::dropIfExists('pratos');
}

};
