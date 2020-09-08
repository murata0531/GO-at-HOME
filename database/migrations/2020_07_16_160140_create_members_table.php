<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('family_id');
            $table->unsignedBigInteger('tuzukigara_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->constrained()
            ->cascadeOnDelete()  // ON DELETE で CASCADE
            ->cascadeOnUpdate();

            $table->foreign('family_id')->references('id')->on('families')->constrained()
            ->cascadeOnDelete()  // ON DELETE で CASCADE
            ->cascadeOnUpdate();
            
            $table->foreign('tuzukigara_id')->references('id')->on('tuzukigaras')->constrained()
            ->cascadeOnDelete()  // ON DELETE で CASCADE
            ->cascadeOnUpdate();
           
            $table->unique(['user_id','family_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
