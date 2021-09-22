<?php

namespace PisteGouvFr\Api\ChorusPro\Type;


interface ITypeFacture {

    const AVOIR   = 'AVOIR';
    const FACTURE = 'FACTURE';

    const LANFR = [
        self::AVOIR   => 'Avoir',
        self::FACTURE => 'Facture',
    ];
}
