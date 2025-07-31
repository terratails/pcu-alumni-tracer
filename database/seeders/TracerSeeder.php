<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use League\Csv\Reader;

class TracerSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/public/tracers.csv');
        if (!file_exists($path)) {
            echo "CSV file not found at: $path\n";
            return;
        }

        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0); // use first row as header

        foreach ($csv as $row) {
            DB::table('tracers')->insert([
                'familyname' => $row['familyname'],
                'firstname' => $row['firstname'],
                'middlename' => $row['middlename'],
                'contact' => $row['contact'],
                'email' => $row['email'],
                'civil' => $row['civil'],
                'studentnumber' => $row['studentnumber'] ?? null,

                'primary_school' => $row['primary_school'] ?? null,
                'primary_yeargraduated' => $row['primary_yeargraduated'] ?? null,
                'secondary_school' => $row['secondary_school'] ?? null,
                'secondary_yeargraduated' => $row['secondary_yeargraduated'] ?? null,
                'tertiary_course' => $row['tertiary_course'] ?? null,
                'tertiary_yeargraduated' => $row['tertiary_yeargraduated'] ?? null,
                'tertiary_masters' => $row['tertiary_masters'] ?? null,
                'tertiary_doctors' => $row['tertiary_doctors'] ?? null,

                'employer' => $row['employer'] ?? null,
                'position' => $row['position'] ?? null,
                'sector' => $row['sector'] ?? null,
                'placeofwork' => $row['placeofwork'] ?? null,
                'typeofemployment' => $row['typeofemployment'] ?? null,
                'extentofemployment' => $row['extentofemployment'] ?? null,
                'datehired' => $row['datehired'] ?? null,
                'averagemonthly' => $row['averagemonthly'] ?? null,

                'resourcespeaker' => filter_var($row['resourcespeaker'] ?? false, FILTER_VALIDATE_BOOLEAN),
                'fieldofexpertise' => $row['fieldofexpertise'] ?? null,
                'employmentstatus' => $row['employmentstatus'] ?? null,

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
