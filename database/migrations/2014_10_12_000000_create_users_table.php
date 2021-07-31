<?php

use App\Enum\UserEnum;
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
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('account_verified')->nullable();
            $table->tinyInteger('login_type')->default(UserEnum::NORMAL_LOGIN);
            $table->tinyInteger('role')->default(UserEnum::CLIENT_ROLE);
            $table->string('social_id', 200)->nullable();
            $table->string('phone_number')->nullable();
            $table->tinyInteger('gender')->default(UserEnum::MALE);
            $table->timestamp('phone_number_verified_at')->nullable();
            $table->tinyInteger('status')->default(UserEnum::NOT_VERIFIED)->comment('user account status');
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
        Schema::dropIfExists('users');
    }
}
