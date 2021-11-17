<?php

namespace PisteGouvFr\Api\ChorusPro;

use PisteGouvFr\Api\ChorusPro\Parameter\ParametresRechercherServicesStructure;
use PisteGouvFr\Api\ChorusPro\Parameter\ParametresRechercherStructure;
use PisteGouvFr\Api\ChorusPro\Parameter\RechercherStructureInput;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetour;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRechercherServicesStructure;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRechercherStructure;

/**
 * Class d'execution capable d'effectuer les appels à l'Api Chorus-Pro Structures
 */
class Structures extends ChorusProApi {

    public static function getBasePath(): string {
        return '/cpro/structures';
    }

    /**
     * @param int                                                                            $idStructure
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\ParametresRechercherServicesStructure|null $ParametresRechercherServicesStructure
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRechercherServicesStructure
     * @throws \PisteGouvFr\PisteException
     */
    public function rechercherServicesStructure(int $idStructure, ParametresRechercherServicesStructure $ParametresRechercherServicesStructure = null): WsRetour {
        return $this->ChorusPro->post(
            static::getBasePath().'/v1/rechercher/services',
            [
                'json' => [
                    'idStructure'                           => $idStructure,
                    'parametresRechercherServicesStructure' => $ParametresRechercherServicesStructure,
                ],
            ],
            WsRetourRechercherServicesStructure::class
        );
    }


    /**
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\RechercherStructureInput      $RechercherStructureInput
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\ParametresRechercherStructure $ParametresRechercherStructure
     * @param bool                                                               $restreindreStructuresPrivees
     *
     * @return array|\PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRechercherStructure
     * @throws \PisteGouvFr\PisteException
     */
    public function rechercherStructure(RechercherStructureInput $RechercherStructureInput, ParametresRechercherStructure $ParametresRechercherStructure = null, bool $restreindreStructuresPrivees = false):WsRetourRechercherStructure {
        return $this->ChorusPro->post(
            static::getBasePath().'/v1/rechercher',
            [
                'json' => [
                    'structure'                    => $RechercherStructureInput,
                    'parametres'                   => $ParametresRechercherStructure,
                    'restreindreStructuresPrivees' => $restreindreStructuresPrivees,
                ],
            ],
            WsRetourRechercherStructure::class
        );
    }
}
