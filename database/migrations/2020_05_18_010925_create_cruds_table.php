<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruds', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('phone',11);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('address');
            $table->text('image')->nullable();
            $table->string('password');
            $table->enum('gender',['male','female','others']);
            $table->enum('user_type',['manager','supervisor','operator']);
            $table->enum('status',['active','inactive']);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cruds');
    }
}
