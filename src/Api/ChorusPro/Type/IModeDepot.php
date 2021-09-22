<?php


namespace PisteGouvFr\Api\ChorusPro\Type;


interface IModeDepot {
    const SAISIE_WEB = 'SAISIE_WEB';
    const PORTAIL_PDF = 'PORTAIL_PDF';
    const EDI_XML_STRUCT = 'EDI_XML_STRUCT';
    const EDI_MIXTE = 'EDI_MIXTE';
    const EDI_PDF_ARCHIVE = 'EDI_PDF_ARCHIVE';
    const SAISIE_PORTAIL = 'SAISIE_PORTAIL';
    const SAISIE_API = 'SAISIE_API';
    const DEPOT_PDF_PORTAIL = 'DEPOT_PDF_PORTAIL';
    const DEPOT_PDF_SIGNE_PORTAIL = 'DEPOT_PDF_SIGNE_PORTAIL';
    const DEPOT_PDF_API = 'DEPOT_PDF_API';
    const DEPOT_PDF_SIGNE_API = 'DEPOT_PDF_SIGNE_API';
    const EDI = 'EDI';
    const UPLOAD_PORTAIL = 'UPLOAD_PORTAIL';
    const UPLOAD_API = 'UPLOAD_API';
    const EDI_NUMERISATION = 'EDI_NUMERISATION';



    const LANFR = [
        self::SAISIE_WEB => 'Facture saisie sur l\'interface web',
        self::PORTAIL_PDF => '',
        self::EDI_XML_STRUCT => '??',
        self::EDI_MIXTE => '??',
        self::EDI_PDF_ARCHIVE => '??',
        self::SAISIE_PORTAIL => 'Facture saisie sur le portail',
        self::SAISIE_API => 'Facture saisie par API',
        self::DEPOT_PDF_PORTAIL => '',
        self::DEPOT_PDF_SIGNE_PORTAIL => '',
        self::DEPOT_PDF_API => 'Facture déposé par API via deposerPDFFacture',
        self::DEPOT_PDF_SIGNE_API => 'Facture déposé par API via deposerPDFFacture, utilisant un PDF signé',
        self::EDI => '',
        self::UPLOAD_PORTAIL => '',
        self::UPLOAD_API => '',
        self::EDI_NUMERISATION => '',
    ];
}
