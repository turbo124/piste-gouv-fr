<?php

namespace PisteGouvFr\Api\ChorusPro;

use PisteGouvFr\Api\ChorusPro\Parameter\ParametresRechercherServicesStructure;
use PisteGouvFr\Api\ChorusPro\Parameter\ParametresRechercherStructure;
use PisteGouvFr\Api\ChorusPro\Parameter\RechercherStructureInput;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetour;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRechercherServicesStructure;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRechercherStructure;
use PisteGouvFr\PisteException;

/**
 * Class d'execution capable d'effectuer les appels à l'Api Chorus-Pro Structures
 */
class Structures extends ChorusProApi {

    public static function getBasePath(): string {
        return '/cpro/structures';
    }

    /**
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\RechercherStructureInput           $RechercherStructureInput
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\ParametresRechercherStructure|null $ParametresRechercherStructure
     * @param bool                                                                    $restreindreStructuresPrivees
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRechercherStructure
     * @throws \PisteGouvFr\PisteException
     */
    public function rechercherStructure( RechercherStructureInput $RechercherStructureInput, ParametresRechercherStructure $ParametresRechercherStructure = null, bool $restreindreStructuresPrivees = false ): WsRetourRechercherStructure {
        /** @var WsRetourRechercherStructure $retour */
        $retour = $this->ChorusPro->post(
            static::getBasePath() . '/v1/rechercher',
            [
                'json' => [
                    'structure'                    => $RechercherStructureInput,
                    'parametres'                   => $ParametresRechercherStructure,
                    'restreindreStructuresPrivees' => $restreindreStructuresPrivees,
                ],
            ],
            WsRetourRechercherStructure::class
        );
        return $retour;

    }

    public function consulterServiceStructure() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }


    public function listerRattachementsStructureUtilisateur() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }



    /**
     * @param int                                                                             $idStructure
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\ParametresRechercherServicesStructure|null $ParametresRechercherServicesStructure
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRechercherServicesStructure
     * @throws \PisteGouvFr\PisteException
     */
    public function rechercherServicesStructure( int $idStructure, ParametresRechercherServicesStructure $ParametresRechercherServicesStructure = null ): WsRetour {
        return $this->ChorusPro->post(
            static::getBasePath() . '/v1/rechercher/services',
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
     * @return mixed
     * @throws \PisteGouvFr\PisteException
     * @deprecated A été déprécié avant l'implémentation.
     */
    public function rechercherEspaces() {
        throw new PisteException( __FUNCTION__ . ' est dépréciée.' );
    }


    public function consulterStructure() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }



}
