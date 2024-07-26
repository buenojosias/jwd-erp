<?php

namespace App\Enums;

enum InvoiceStatusEnum: string
{
    case PREVIA = 'Prévia';
    case FECHADA = 'Fechada';
    case PAGA = 'Paga';
    case ATRASADA = 'Atrasada';
    case RENEGOCIADA = 'Renegociada';
}
