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
        Schema::create('c_s_v_data', function (Blueprint $table) {
            $table->id();
            $table->string('Code');
            $table->string('Grouping');
            $table->string('Classification');
            $table->string('Specialization');
            $table->longText('Definition');
            $table->string('Effective_Date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_s_v_data');
    }
};
