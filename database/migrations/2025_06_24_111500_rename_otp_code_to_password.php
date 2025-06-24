<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameOtpCodeToPassword extends Migration
{
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->renameColumn('otp_code', 'password');
            $table->text('password')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->renameColumn('password', 'otp_code');
        });
    }
}