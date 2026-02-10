<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('messages_enseignant')) {
            return;
        }

        Schema::create('messages_enseignant', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_enseignant');
            $table->text('content');
            $table->unsignedTinyInteger('envoye_par_enseignant');
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->index('id_enseignant');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages_enseignant');
    }
};
