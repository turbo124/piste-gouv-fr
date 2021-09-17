<?php


namespace PhpChorusPiste;


interface IModeDepot
{
    const SAISIE_API = 'SAISIE_API';
    const DEPOT_PDF_API = 'DEPOT_PDF_API';
    const DEPOT_PDF_SIGNE_API = 'DEPOT_PDF_SIGNE_API';


    const LANFR = [
        self::SAISIE_API => 'Facture saisie par API',
        self::DEPOT_PDF_API => 'Facture déposé par API via deposerPDFFacture',
        self::DEPOT_PDF_SIGNE_API => 'Facture déposé par API via deposerPDFFacture, utilisant un PDF signé',
    ];
}
