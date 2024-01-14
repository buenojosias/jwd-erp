<?php

namespace App\Enums;

enum ServiceStatus: string
{
    case Analisando = "Analisando";
    case Aguardando = "Aguardando";
    case EmExecucao = "Em execução";
    case EmAprovacao = "Enviado para aprovação";
    case Concluido = "Concluído";
    case Atrasado = "Atrasado";
}
