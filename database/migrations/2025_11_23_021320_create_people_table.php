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
    Schema::create('people', function (Blueprint $table) {
    $table->id();
    $table->string('full_name')->unique();
    $table->string('nip')->unique();
    $table->unsignedBigInteger('education_id');
    $table->unsignedBigInteger('position_id');
    $table->unsignedBigInteger('position_type_id');
    $table->foreign('education_id')->references('id')->on('educations')->cascadeOnDelete();
    $table->foreign('position_id')->references('id')->on('positions')->cascadeOnDelete();
    $table->foreign('position_type_id')->references('id')->on('position_types')->cascadeOnDelete();
    $table->enum('gender', ['laki-laki', 'perempuan']);
    $table->string('image');
    $table->boolean('is_active')->default(true);
    $table->timestamps();   
});
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
