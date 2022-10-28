<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('api_request_logs', function (Blueprint $table) {
            $table->id();
            $table->string('incoming_url');
            $table->longText('request');
            $table->longText('response');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('api_request_logs');
    }
};
