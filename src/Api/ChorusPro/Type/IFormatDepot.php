<?php


namespace PisteGouvFr\Api\ChorusPro\Type;


interface IFormatDepot {
    const PDF_NON_SIGNE = 'PDF_NON_SIGNE';
    const PDF_SIGNE_PADES = 'PDF_SIGNE_PADES';
    const PDF_SIGNE_XADES = 'PDF_SIGNE_XADES';

    const LANFR = [
        self::PDF_NON_SIGNE => 'Ficher PDF non signé',
        self::PDF_SIGNE_PADES => 'Fichier PDF signé avec une signature electronique PAdES (PDF Advanced Electronic Signatures)',
        self::PDF_SIGNE_XADES => 'Fichier PDF signé avec une signature electronique XAdES (XML Advanced Electronic Signatures)',
    ];
}
