<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->nullable();
        $table->string('name');
        $table->string('phone');
            $table->string('email')->nullable()->change();
            $table->enum('type', ['table', 'cabin']);
        $table->integer('guest_count');
        $table->datetime('reservation_time');
        $table->text('note')->nullable();
        $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
        $table->softDeletes();
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
        Schema::dropIfExists('reservations');
    }
}
