<?php

namespace PhpChorusPiste;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use PhpChorusPiste\Parameter\LignePosteSoumettreInput;
use PhpChorusPiste\Parameter\ParametresRechercherServicesStructure;
use PhpChorusPiste\Parameter\SoumettreFactureCadreDeFacturation;
use PhpChorusPiste\Parameter\SoumettreFactureDestinataire;
use PhpChorusPiste\Parameter\SoumettreFactureFournisseur;
use PhpChorusPiste\Parameter\SoumettreFactureMontantTotal;
use PhpChorusPiste\Parameter\SoumettreFactureReferences;
use PhpChorusPiste\ParameterCollection\LignePosteSoumettreInputCollection;
use PhpChorusPiste\ParameterCollection\LigneTvaSoumettreInputCollection;
use PhpChorusPiste\ParameterCollection\PieceJointeComplentaireSoumettreInputCollection;
use PhpChorusPiste\ParameterCollection\SoumettreFacturePieceJointePrincipaleCollection;
/**
 * Class d'execution des appels des api de piste depuis le Réseau Interministériel de l'État (RIE):
 */
class PisteRIE extends Piste {

    const AUTH_SANDBOX_URL = 'https://sandbox-oauth.aife.economie.gouv.fr/api/oauth/token';
    const AUTH_PRODUCTION_URL = 'https://oauth.aife.economie.gouv.fr/api/oauth/token';
    const API_SANDBOX_URL = 'https://sandbox-api.aife.economie.gouv.fr';
    const API_PRODUCTION_URL = 'https://api.aife.economie.gouv.fr';
}
