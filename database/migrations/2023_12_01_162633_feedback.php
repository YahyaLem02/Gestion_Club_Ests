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
    Schema::create('feedbacks', function (Blueprint $table) {
        $table->id();
        $table->text('response');
        $table->unsignedBigInteger('admin_id');
        $table->foreign('admin_id')->references('id')->on('users')->onUpdate('cascade');
        $table->unsignedBigInteger('reclamation_id');
        $table->foreign('reclamation_id')->references('NumReclamation')->on('reclamations')->onUpdate('cascade');
        
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
