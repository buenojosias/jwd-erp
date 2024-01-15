<?php

namespace App\Enums;

enum StepStatus: string
{
    case Aguardando = 'aguardando';
    case Executando = 'executando';
    case Concluído = 'concluído';
}
