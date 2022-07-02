<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('number_of_copies')->default(1);
            $table->boolean('bought')->default(FALSE);
            $table->decimal('price' , 8,2)->default(0);
            $table->timestamps();


            $table->foreignId('book_id')
                ->constrained()
                ->cascadeOnDelete();
      
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();      

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_user');
    }
};
