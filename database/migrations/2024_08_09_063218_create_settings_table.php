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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->string("logo");
            $table->string("facebook");
            $table->string("twiter");
            $table->string("linked_in");
            $table->string("youtube");
            $table->string("phone");
            $table->string("gmail");
            $table->foreignId('admin_id')->nullable()->constrained('admins', 'id');
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
        Schema::dropIfExists('settings');
    }
};
