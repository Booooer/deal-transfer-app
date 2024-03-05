<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->integer("bitrix_id");
            $table->integer("responsible_id");
            $table->integer('who_transfered_id');

            $table->foreign('who_transfered_id')->references('id')
                    ->on('users');

            $table->foreignId("tenant_id")->constrained();
            $table->foreignId("stage_id")->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
