<?php

namespace PhpChorusPiste;


interface IModePaiement {

    const CHEQUE      = 'CHEQUE';
    const PRELEVEMENT = 'PRELEVEMENT';
    const VIREMENT    = 'VIREMENT';
    const ESPECE      = 'ESPECE';
    const AUTRE       = 'AUTRE';
    const REPORT      = 'REPORT';


    const LANFR = [
        self::CHEQUE      => 'Cheque',
        self::PRELEVEMENT => 'Prelevement',
        self::VIREMENT    => 'Virement',
        self::ESPECE      => 'Espece',
        self::AUTRE       => 'Autre',
        self::REPORT      => 'Report',
    ];
}
