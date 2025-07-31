<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracer extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentnumber', // added this
        'familyname',
        'firstname',
        'middlename',
        'contact',
        'civil',
        'employer',
        'position',
        'sector',
        'placeofwork',
        'typeofemployment',
        'extentofemployment',
        'datehired',
        'averagemonthly',
        'resourcespeaker',
        'fieldofexpertise',
        'employmentstatus',
        
        // also add your education fields if you want mass assignment for those too
        'primary_school',
        'primary_yeargraduated',
        'secondary_school',
        'secondary_yeargraduated',
        'tertiary_course',
        'tertiary_yeargraduated',
        'tertiary_masters',
        'tertiary_doctors',
    ];
}
