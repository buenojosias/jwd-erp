<?php

namespace App\Enums;

enum StepStatusEnum: string
{
    case AGUARDANDO = 'Aguardando';
    case EXECUTANDO = 'Em execução';
    case CONCLUIDO = 'Concluído';
    case ATRASADO = 'Atrasado';
}
