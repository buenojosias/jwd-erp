<?php

namespace App\Enums;

enum ServiceStatus: string
{
    case Analisando = 'analisando';
    case Aguardando = 'aguardando';
    case Executando = 'executando';
    case Aprovação = 'aprovação';
    case Concluído = 'concluído';
    case Atrasado = 'atrasado';
    case Cancelado = 'cancelado';
}
