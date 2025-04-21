<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Create camp_user_prefix table
        Schema::create('camp_user_prefix', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
        });

        // Insert default data into camp_user_prefix
        DB::table('camp_user_prefix')->insert([
            ['name' => 'นาย'],
            ['name' => 'นางสาว'],
            ['name' => 'นาง'],
        ]);

        // Create camp_user_register table
        Schema::create('camp_user_register', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_prefix_id');
            $table->string('user_fname', 100);
            $table->string('user_lname', 100);
            $table->date('user_birth_date');
            $table->enum('user_gender', ['man', 'woman']);
            $table->text('user_bio');

            $table->foreign('user_prefix_id')->references('id')->on('camp_user_prefix')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('camp_user_register');
        Schema::dropIfExists('camp_user_prefix');
    }
};
