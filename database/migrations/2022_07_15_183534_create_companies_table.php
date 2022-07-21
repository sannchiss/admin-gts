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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('applicante_name')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('customer_tracking_gts')->nullable();
            $table->string('name_company')->nullable();
            $table->string('nif')->nullable();
            $table->string('account_txa')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_rut')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_email')->nullable();
            $table->string('proposed_date')->nullable();
            $table->string('type_service')->nullable();
            $table->string('type_of_impression')->nullable();
            $table->string('documentary_return')->nullable();
            $table->string('type_of_integration')->nullable();
            $table->string('printer_property')->nullable();
            $table->string('computer_property')->nullable();
            $table->string('migrated_to_txa')->nullable();
            $table->string('inhouse')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
