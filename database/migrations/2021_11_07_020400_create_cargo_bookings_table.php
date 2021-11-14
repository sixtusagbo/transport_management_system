<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_bookings', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->tinyText('nature');
            $table->tinyInteger('weight');
            $table->integer('user_id');
            $table->integer('destination_id');
            $table->decimal('amount', 5, 2);
            $table->date('delivery_date');
            $table->uuid('ticket_no');
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
        Schema::dropIfExists('cargo_bookings');
    }
}
