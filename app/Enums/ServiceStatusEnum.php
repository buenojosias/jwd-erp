<?php

namespace App\Enums;

enum ServiceStatusEnum: string
{
    case PENDENTE = 'Pendente';
    case ANALISANDO = 'Analisando';
    case AGUARDANDOAPROVACAO = 'Aguardando aprovação';
    case AGUARDANDOINICIO = 'Aguardando início';
    case EXECUTANDO = 'Em executando';
    case CONCLUIDO = 'Concluído';
    case ATRASADO = 'Atrasado';
    case CANCELADO = 'Cancelado';
}
