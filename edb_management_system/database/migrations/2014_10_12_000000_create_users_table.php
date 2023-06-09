<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('level');
            $table->tinyInteger('type')->default(0);
            /* Users: 0=>OEM, 1=>Admin, 2=>EDB */
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
            'name' => 'Admin',
            'email' => "admin@carbon8.com.pk",
            "password" => Hash::make('password'),
            'level' => 1, 
            'type' => 1,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}