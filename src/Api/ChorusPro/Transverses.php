<?php

namespace PisteGouvFr\Api\ChorusPro;

use PisteGouvFr\Api\ChorusPro\Parameter\ParametresRechercherServiceExecutant;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetour;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourConsulterCRDetaille;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRechercherServiceExecutant;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererCoordonneesBancairesValides;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererStructure;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourStructuresPourUtilisateur;
use PisteGouvFr\Api\ChorusPro\Type\ISyntaxeFlux;

/**
 * Class d'execution capable d'effectuer les appels à l'Api Chorus-Pro Transverse
 */
class Transverses extends ChorusProApi {

    public static function getBasePath(): string {
        return '/cpro/transverses';
    }

    /**
     * @param string $invoiceId
     * @param string $syntax
     *
     * @return WsRetourConsulterCRDetaille
     */
    public function consulterCRDetaille(string $invoiceId, string $syntax = ISyntaxeFlux::IN_DP_E2_UBL_INVOICE_MIN): WsRetour {
        return $this->ChorusPro->post(
            static::getBasePath().'/v1/consulterCRDetaille',
            [
                'json' => [
                    'numeroFluxDepot' => $invoiceId,
                    'syntaxeFlux'     => $syntax,
                ],
            ],
            WsRetourConsulterCRDetaille::class
        );
    }


    /**
     * @param int $idStructure
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererCoordonneesBancairesValides
     * @throws \PisteGouvFr\PisteException
     */
    public function recupererCoordonneesBancairesValides(int $idStructure): WsRetour {
        return $this->ChorusPro->post(
            static::getBasePath().'/v1/recuperer/coordbanc/valides',
            [
                'json' => [
                    'idStructure' => $idStructure,
                ],
            ],
            WsRetourRecupererCoordonneesBancairesValides::class
        );
    }

    /**
     * @param int|null $espaceFo
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourStructuresPourUtilisateur
     * @throws \PisteGouvFr\PisteException
     * @throws \Exception
     */
    public function recupererStructuresPourUtilisateur(int $espaceFo = null): WsRetour {
        return $this->ChorusPro->post(
            static::getBasePath().'/v1/recuperer/structuresPourUtilisateur',
            [
                'json' => [
                    'espaceFo' => $espaceFo,
                ],
            ],
            WsRetourStructuresPourUtilisateur::class
        );
    }

    /**
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererStructure
     * @throws \PisteGouvFr\PisteException
     */
    public function recupererStructuresActivesPourFournisseur(): WsRetour {
        return $this->ChorusPro->post(
            static::getBasePath().'/v1/recuperer/structures/actives/fournisseur',
            [
                'body' => '{}',
            ],
            WsRetourRecupererStructure::class
        );
    }


    /**
     * @param int $idPieceJointeObjet
     *
     * @return bool
     * @throws \PisteGouvFr\PisteException
     */
    public function detacherPieceJointe(int $idPieceJointeObjet): bool {
        $this->ChorusPro->post(
            static::getBasePath().'/v1/detacherPieceJointe',
            [
                'json' => [
                    'idPieceJointeObjet' => $idPieceJointeObjet,
                ],
            ]
        );
        return true;
    }

    /**
     * @param int                                                                            $idDestinataireCPP
     * @param string|null                                                                    $codeServiceExecutant
     * @param string|null                                                                    $nomServiceExecutant
     * @param bool|null                                                                      $actif
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\ParametresRechercherServiceExecutant|null $ParametresRechercherServiceExecutant
     *
     * @return WsRetourRechercherServiceExecutant
     * @throws \PisteGouvFr\PisteException
     */
    public function rechercherServiceExecutant(int $idDestinataireCPP, string $codeServiceExecutant = null, string $nomServiceExecutant = null, bool $actif = null, ParametresRechercherServiceExecutant $ParametresRechercherServiceExecutant = null) {
        $this->ChorusPro->post(
            static::getBasePath().'/v1/rechercher/serviceexecutant',
            [
                'json' => [
                    'idDestinataireCPP' => $idDestinataireCPP,
                    'codeServiceExecutant' => $codeServiceExecutant,
                    'nomServiceExecutant' => $nomServiceExecutant,
                    'actif' => $actif,
                    'parametresRecherche' => $ParametresRechercherServiceExecutant,
                ],
            ],
            WsRetourRechercherServiceExecutant::class
        );
        return true;
    }
}
