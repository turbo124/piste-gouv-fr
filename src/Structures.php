<?php

namespace PhpChorusPiste;

use PhpChorusPiste\Parameter\ParametresRechercherServicesStructure;
use PhpChorusPiste\Retour\WsRetour;
use PhpChorusPiste\Retour\WsRetourRechercherServicesStructure;

/**
 * Class d'execution capable d'effectuer les appels à l'Api Chorus-Pro Structures
 */
class Structures {

    const BASE_PATH = '/cpro/structures';

    /**
     * @var \PhpChorusPiste\Piste|\GuzzleHttp\Client
     */
    private $Piste;

    public function __construct(Piste $Piste) {
        $this->Piste = $Piste;
    }


    /**
     * @param int                                                                  $idStructure
     * @param \PhpChorusPiste\Parameter\ParametresRechercherServicesStructure|null $ParametresRechercherServicesStructure
     *
     * @return \PhpChorusPiste\Retour\WsRetourRechercherServicesStructure
     * @throws \PhpChorusPiste\PisteException
     */
    public function rechercherServicesStructure(int $idStructure, ParametresRechercherServicesStructure $ParametresRechercherServicesStructure = null): WsRetour {
        return $this->Piste->post(
            static::BASE_PATH.'/v1/rechercher/services',
            [
                'json' => [
                    'idStructure'                           => $idStructure,
                    'parametresRechercherServicesStructure' => $ParametresRechercherServicesStructure,
                ],
            ],
            WsRetourRechercherServicesStructure::class
        );
    }
}
