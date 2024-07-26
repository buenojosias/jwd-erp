<?php

namespace App\Enums;

enum KbQueueStatusEnum: string
{
    case AGUARDANDO = 'Aguardando';
    case INICIOU = 'Iniciou';
    case DESISTIU = 'Desistiu';
}
