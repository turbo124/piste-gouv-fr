<?php

namespace PhpChorusPiste;

use PhpChorusPiste\Retour\WsRetour;
use PhpChorusPiste\Retour\WsRetourConsulterCRDetaille;
use PhpChorusPiste\Retour\WsRetourRecupererCoordonneesBancairesValides;
use PhpChorusPiste\Retour\WsRetourRecupererStructure;
use PhpChorusPiste\Retour\WsRetourStructuresPourUtilisateur;

/**
 * Class d'execution capable d'effectuer les appels à l'Api Chorus-Pro Transverse
 */
class Transverses {

    const BASE_PATH = '/cpro/transverses';

    /**
     * @var \PhpChorusPiste\Piste|\GuzzleHttp\Client
     */
    private $Piste;

    public function __construct(Piste $Piste) {
        $this->Piste = $Piste;
    }

    /**
     * @param string $invoiceId
     * @param string $syntax
     *
     * @return WsRetourConsulterCRDetaille
     */
    public function consulterCRDetaille(string $invoiceId, string $syntax = ISyntaxeFlux::IN_DP_E2_UBL_INVOICE_MIN): WsRetour {
        return $this->Piste->post(
            static::BASE_PATH.'/v1/consulterCRDetaille',
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
     * @return \PhpChorusPiste\Retour\WsRetourRecupererCoordonneesBancairesValides
     * @throws \PhpChorusPiste\PisteException
     */
    public function recupererCoordonneesBancairesValides(int $idStructure): WsRetour {
        return $this->Piste->post(
            static::BASE_PATH.'/v1/recuperer/coordbanc/valides',
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
     * @return \PhpChorusPiste\Retour\WsRetourStructuresPourUtilisateur
     * @throws \PhpChorusPiste\PisteException
     * @throws \Exception
     */
    public function recupererStructuresPourUtilisateur(int $espaceFo = null): WsRetour {
        return $this->Piste->post(
            static::BASE_PATH.'/v1/recuperer/structuresPourUtilisateur',
            [
                'json' => [
                    'espaceFo' => $espaceFo,
                ],
            ],
            WsRetourStructuresPourUtilisateur::class
        );
    }

    /**
     * @return \PhpChorusPiste\Retour\WsRetourRecupererStructure
     * @throws \PhpChorusPiste\PisteException
     */
    public function recupererStructuresActivesPourFournisseur(): WsRetour {
        return $this->Piste->post(
            static::BASE_PATH.'/v1/recuperer/structures/actives/fournisseur',
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
     * @throws \PhpChorusPiste\PisteException
     */
    public function detacherPieceJointe(int $idPieceJointeObjet): bool {
        $this->Piste->post(
            static::BASE_PATH.'/v1/detacherPieceJointe',
            [
                'json' => [
                    'idPieceJointeObjet' => $idPieceJointeObjet,
                ],
            ]
        );
        return true;
    }
}
