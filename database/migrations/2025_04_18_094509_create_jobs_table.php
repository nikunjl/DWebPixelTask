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
        Schema::create('company_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('experience')->nullable();
            $table->string('salary')->nullable();
            $table->string('location')->nullable();
            $table->string('extra_info')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->integer('status')->default(1)->comment('1=active, 0=inactive');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_jobs');
    }
};
