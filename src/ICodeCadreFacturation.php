<?php


namespace PhpChorusPiste;


interface ICodeCadreFacturation {

    const A1_FACTURE_FOURNISSEUR            = 'A1_FACTURE_FOURNISSEUR';
    const A2_FACTURE_FOURNISSEUR_DEJA_PAYEE = 'A2_FACTURE_FOURNISSEUR_DEJA_PAYEE';
    const A9_FACTURE_SOUSTRAITANT           = 'A9_FACTURE_SOUSTRAITANT';
    const A12_FACTURE_COTRAITANT            = 'A12_FACTURE_COTRAITANT';


    const LANFR = [
        self::A1_FACTURE_FOURNISSEUR            => '',
        self::A2_FACTURE_FOURNISSEUR_DEJA_PAYEE => '',
        self::A9_FACTURE_SOUSTRAITANT           => '',
        self::A12_FACTURE_COTRAITANT            => '',
    ];
}
