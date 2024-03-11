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
        Schema::create('employees', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->unsignedInteger('age')->nullable();
            $table->timestamps();

            $table->softDeletes(); // удаляемая запись не будет видна больше в приложении но будет существовать в БД
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
