<?php

namespace App\Enums;

enum KbStudentStatus: string
{
    case Ativo = 'ativo';
    case Inativo = 'inativo';
    case Desistente = 'desistente';
}
