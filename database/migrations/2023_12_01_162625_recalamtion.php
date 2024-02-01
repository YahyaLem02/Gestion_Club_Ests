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
        Schema::create("reclamations", function (Blueprint $table) {
            $table->id("NumReclamation");
            $table->string("title");
            $table->text("CorpReclamation");
            $table->date('DateReclamation')->default(now());
            $table->boolean("etat")->default(0);
            $table->unsignedBigInteger('adherant_id');
            $table->foreign('adherant_id')->references('id')->on('users')->onUpdate('cascade');
            $table->unsignedBigInteger('club_id');
            $table->foreign('club_id')->references('id')->on('clubs');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
