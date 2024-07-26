<?php

namespace App\Enums;

enum ServiceStatusEnum: string
{
    case PENDENTE = 'Pendente';
    case ANALISANDO = 'Analisando';
    case AGUARDANDOAPROVACAO = 'Aguardando aprovação';
    case AGUARDANDOINICIO = 'Aguardando início';
    case EXECUTANDO = 'Em execução';
    case CONCLUIDO = 'Concluído';
    case ATRASADO = 'Atrasado';
    case CANCELADO = 'Cancelado';

    public function color()
    {
        return match($this) {
            self::PENDENTE => 'warning',
            self::ANALISANDO => 'primary',
            self::AGUARDANDOAPROVACAO => 'purple',
            self::AGUARDANDOINICIO => 'sky',
            self::EXECUTANDO => 'primary',
            self::CONCLUIDO => 'positive',
            self::ATRASADO => 'negative',
            self::CANCELADO => 'slate',
        };
    }
}
