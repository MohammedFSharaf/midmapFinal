<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('center_id')->constrained('centers')->onDelete('cascade');
            $table->string('ip_address')->nullable(); // عشان ما يقيّم نفس الشخص أكثر من مرة
            $table->integer('rating')->default(1); // من 1 إلى 5
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
