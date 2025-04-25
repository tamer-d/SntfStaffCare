<?php

namespace App;

enum TypeVisite: string
{
    case Admission = 'Admission';
    case Periodique = 'Periodique';
    case Spontane = 'Spontane';
    case Reprise = 'Reprise';
    case Controle = 'Controle';
    case AccidentDeTravail = 'Accident de travail';
    case ContreVisite = 'Contre-visite';
    case Reintegration = 'Reintegration';
}
