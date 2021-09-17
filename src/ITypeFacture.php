<?php

namespace PhpChorusPiste;


interface ITypeFacture {

    const AVOIR   = 'AVOIR';
    const FACTURE = 'FACTURE';

    const LANFR = [
        self::AVOIR   => 'Avoir',
        self::FACTURE => 'Facture',
    ];
}
