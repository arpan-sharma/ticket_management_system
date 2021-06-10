<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('tickets', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id');
			$table->foreignId('agent_id');
			$table->string('mobileno', 10);
			$table->string('assets');
			$table->string('serial_no', 15);
			$table->string('model_no', 15);
			$table->enum("priority", ["High", "Medium", "Low", "Emergency"])->nullable();
			$table->enum("ticket_status", ["Pending", "Approved", "Ready_To_Dispatched", "Closed"])->default("Pending");

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('tickets');
	}
}
