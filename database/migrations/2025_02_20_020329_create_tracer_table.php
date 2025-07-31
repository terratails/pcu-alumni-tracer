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
        Schema::create('tracers', function (Blueprint $table) {
            $table->id();
            $table->string('familyname')->unique;
            $table->string('firstname');
            $table->string('middlename');
            $table->string('contact');
            $table->string('email')->unique();
            $table->string('civil');
            $table->string('studentnumber')->nullable();

            // Education fields — make nullable if optional
            $table->string('primary_school')->nullable();
            $table->string('primary_yeargraduated')->nullable();
            $table->string('secondary_school')->nullable();
            $table->string('secondary_yeargraduated')->nullable();
            $table->string('tertiary_course')->nullable();
            $table->string('tertiary_yeargraduated')->nullable();
            $table->string('tertiary_masters')->nullable();
            $table->string('tertiary_doctors')->nullable();

            // Employment-related fields — nullable if optional
            $table->string('employer')->nullable();
            $table->string('position')->nullable();
            $table->string('sector')->nullable();
            $table->string('placeofwork')->nullable();
            $table->string('typeofemployment')->nullable();
            $table->string('extentofemployment')->nullable();
            $table->date('datehired')->nullable();
            $table->string('averagemonthly')->nullable();

            $table->boolean('resourcespeaker')->default(false);
            $table->string('fieldofexpertise')->nullable();
            $table->string('employmentstatus')->nullable();

            $table->timestamps();

            // Composite unique constraint
            
            $table->unique(['familyname', 'firstname', 'middlename'], 'unique_full_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracers');
    }
};
