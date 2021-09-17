<?php

namespace PhpChorusPiste;


interface ITypeTva {

    const TVA_SUR_DEBIT        = 'TVA_SUR_DEBIT';
    const TVA_SUR_ENCAISSEMENT = 'TVA_SUR_ENCAISSEMENT';
    const EXONERATION          = 'EXONERATION';
    const SANS_TVA             = 'SANS_TVA';


    const LANFR = [
        self::TVA_SUR_DEBIT        => 'Tva sur debit',
        self::TVA_SUR_ENCAISSEMENT => 'Tva sur encaissement',
        self::EXONERATION          => 'Exoneration',
        self::SANS_TVA             => 'Sans tva',
    ];
}
