<?php

namespace App\Enum;

enum AppointmentStatus: string
{
    case PROGRAMME = 'programme';
    case EN_COURS = 'en_cours';
    case TERMINE = 'termine';
}


?>