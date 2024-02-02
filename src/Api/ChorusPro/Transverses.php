<?php

namespace PisteGouvFr\Api\ChorusPro;

use PisteGouvFr\Api\ChorusPro\Parameter\ParametresRechercherServiceExecutant;
use PisteGouvFr\Api\ChorusPro\Type\CodeLangueType;
use PisteGouvFr\Api\ChorusPro\Type\SyntaxeFluxType;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererDevises;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetour;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourConsulterCR;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourConsulterCRDetaille;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRechercherServiceExecutant;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererCoordonneesBancairesValides;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererFormatFlux;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererModeDepot;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererMotifsExonerationTva;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererPays;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererStructure;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererTypeFactureTravaux;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourStructuresPourUtilisateur;
use PisteGouvFr\Api\ChorusPro\Type\ISyntaxeFlux;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourTelechargerAnnuaireDestinataire;
use PisteGouvFr\PisteException;

/**
 * Class d'execution capable d'effectuer les appels à l'Api Chorus-Pro Transverse
 */
class Transverses extends ChorusProApi {

    public static function getBasePath(): string {
        return '/cpro/transverses';
    }

    /**
     * @return array
     * @throws \PisteGouvFr\PisteException|\PisteGouvFr\Api\ChorusPro\HttpResponseError
     */
    public function healthCheck() {
        return $this->ChorusPro->get(
            static::getBasePath() . '/v1/health-check',
            [
                'json' => [],
            ]
        );
    }

    /**
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererFormatFlux
     * @throws \PisteGouvFr\PisteException
     */
    public function recupererFormatFlux(): WsRetourRecupererFormatFlux {
        /** @var WsRetourRecupererFormatFlux $retour */
        $retour = $this->ChorusPro->post(
            static::getBasePath() . '/v1/recuperer/formatflux',
            [
                'json' => [],
            ],
            WsRetourRecupererFormatFlux::class
        );
        return $retour;
    }

    /**
     *
     * @param string $codeLangue
     *
     * @return WsRetourRecupererMotifsExonerationTva
     * @throws \PisteGouvFr\PisteException
     */
    public function recupererMotifsExonerationTva( string $codeLangue ): WsRetourRecupererMotifsExonerationTva {
        /** @var WsRetourRecupererMotifsExonerationTva $retour */
        $retour = $this->ChorusPro->post(
            static::getBasePath() . '/v1/recuperer/motifs/exonerationtva',
            [
                'json' => [
                    'codeLangue' => $codeLangue
                ]
            ]
        );
        return $retour;
    }

    /**
     *
     * @param \DateTime                                       $DateDepot
     * @param string                                          $numeroFluxDepot
     * @param \PisteGouvFr\Api\ChorusPro\Type\SyntaxeFluxType $SyntaxFluxType
     *
     * @return WsRetourConsulterCR
     * @throws \PisteGouvFr\PisteException
     */
    public function consulterCR( \DateTime $DateDepot, string $numeroFluxDepot, SyntaxeFluxType $SyntaxFluxType ): WsRetourConsulterCR {
        /** @var WsRetourConsulterCR $retour */
        $retour = $this->ChorusPro->post(
            static::getBasePath() . '/v1/consulterCR',
            [
                'json' => [
                    'dateDepot'       => $DateDepot->format( 'Y-m-d\TH:i:sp' ),
                    'numeroFluxDepot' => $numeroFluxDepot,
                    'syntaxFluxType'  => $SyntaxFluxType,
                ],
            ],
            WsRetourConsulterCR::class
        );
        return $retour;
    }

    /**
     * @param string|null $codeLangue (varchar(2))
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererDevises
     * @throws \PisteGouvFr\PisteException
     */
    public function recupererDevise( ?string $codeLangue = null ): WsRetourRecupererDevises {
        /** @var WsRetourRecupererDevises $retour */
        $retour = $this->ChorusPro->post(
            static::getBasePath() . '/v1/recuperer/devises',
            [
                'json' => [
                    'codeLangue' => $codeLangue,
                ],
            ],
            WsRetourConsulterCR::class
        );
        return $retour;
    }


    public function telechargerAnnuaireDestinataire(): WsRetourTelechargerAnnuaireDestinataire {
        /** @var WsRetourTelechargerAnnuaireDestinataire $retour */
        $retour = $this->ChorusPro->post(
            static::getBasePath() . '/v1/telecharger/annuaire/destinataire',
            [
                'json' => [],
            ],
            WsRetourTelechargerAnnuaireDestinataire::class
        );
        return $retour;
    }

    /**
     * @param string                                               $invoiceId
     * @param \PisteGouvFr\Api\ChorusPro\Type\SyntaxeFluxType|null $syntaxFlux Default IN_DP_E2_UBL_INVOICE_MIN
     *
     * @return WsRetourConsulterCRDetaille
     * @throws \PisteGouvFr\PisteException
     */
    public function consulterCRDetaille( string $invoiceId, ?SyntaxeFluxType $syntaxFlux ): WsRetour {
        $syntaxFlux = $syntaxFlux ?? SyntaxeFluxType::IN_DP_E2_UBL_INVOICE_MIN();
        return $this->ChorusPro->post(
            static::getBasePath() . '/v1/consulterCRDetaille',
            [
                'json' => [
                    'numeroFluxDepot' => $invoiceId,
                    'syntaxeFlux'     => $syntaxFlux,
                ],
            ],
            WsRetourConsulterCRDetaille::class
        );
    }


    /**
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererModeDepot
     * @throws \PisteGouvFr\PisteException
     */
    public function recupererModeDepot(): WsRetourRecupererModeDepot {
        /** @var WsRetourRecupererModeDepot $retour */
        $retour = $this->ChorusPro->post(
            static::getBasePath() . '/v1/recuperer/modedepot',
            [
                'json' => [],
            ],
            WsRetourRecupererModeDepot::class
        );
        return $retour;
    }

    /**
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererTypeFactureTravaux
     * @throws \PisteGouvFr\PisteException
     */
    public function recupererTypeFactureTravaux(): WsRetourRecupererTypeFactureTravaux {
        /** @var WsRetourRecupererTypeFactureTravaux $retour */
        $retour = $this->ChorusPro->post(
            static::getBasePath() . '/v1/recuperer/modedepot',
            [
                'json' => [],
            ],
            WsRetourRecupererTypeFactureTravaux::class
        );
        return $retour;
    }


    public function rechercherSousCategorieSollicitation() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function recupererSyntaxeFlux() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    /**
     * @return mixed
     * @throws \PisteGouvFr\PisteException
     * @deprecated A été déprécié avant l'implémentation.
     */
    public function recupererServicesExecutantEtat() {
        throw new PisteException( __FUNCTION__ . ' est dépréciée.' );
    }

    public function recupererEtatParTypeDemandePaiement() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    /**
     * @param \PisteGouvFr\Api\ChorusPro\Type\CodeLangueType|null $CodeLangue Default : CodeLangueType(FR)
     *
     * @return WsRetourRecupererPays
     * @throws \PisteGouvFr\PisteException
     */
    public function recupererPays( ?CodeLangueType $CodeLangue = null ): WsRetourRecupererPays {
        $CodeLangue = $CodeLangue ?? CodeLangueType::FR();
        /** @var WsRetourRecupererPays $retour */
        $retour = $this->ChorusPro->post(
            static::getBasePath() . '/v1/recuperer/pays',
            [
                'json' => [
                    'codeLangue' => $CodeLangue
                ]
            ],
            WsRetourRecupererPays::class
        );
        return $retour;
    }


    public function recupererTypeDemandePaiement() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function telechargerPieceJointe() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function recupererMotifsRefusFactureAValider() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }



    public function recupererStructuresActivesPourFacturesTravaux() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }


    /**
     * @param int|null $espaceFo
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourStructuresPourUtilisateur
     * @throws \PisteGouvFr\PisteException
     * @throws \Exception
     * @deprecated
     */
    public function recupererStructuresPourUtilisateur( int $espaceFo = null ): WsRetour {
        return $this->ChorusPro->post(
            static::getBasePath() . '/v1/recuperer/structuresPourUtilisateur',
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
            static::getBasePath() . '/v1/recuperer/structures/actives/fournisseur',
            [
                'body' => '{}',
            ],
            WsRetourRecupererStructure::class
        );
    }


    public function consulterInformationSIRET() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }


    public function recupererTauxTva() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }


    public function rechercherCategorieSollicitation() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }


    public function recupererTypePieceJointe() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }



    public function rechercherPieceJointeStructure() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function ajouterFichierDansSysteme() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function rechercherDestinataire() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function recupererModeReglements() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function recupererCadreFacturation() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function recupererEtatsPossiblesPourTraitement() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function recupererTypeStructure() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    /**
     * @param int $idStructure
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourRecupererCoordonneesBancairesValides
     * @throws \PisteGouvFr\PisteException
     */
    public function recupererCoordonneesBancairesValides( int $idStructure ): WsRetour {
        return $this->ChorusPro->post(
            static::getBasePath() . '/v1/recuperer/coordbanc/valides',
            [
                'json' => [
                    'idStructure' => $idStructure,
                ],
            ],
            WsRetourRecupererCoordonneesBancairesValides::class
        );
    }


    public function recupererTypeIdentifiantStructure() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }


    public function rechercherPieceJointeSurMonCompte() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function recupererStructuresActivesPourDestinataire() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
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
     * @deprecated
     */
    public function rechercherServiceExecutant( int $idDestinataireCPP, string $codeServiceExecutant = null, string $nomServiceExecutant = null, bool $actif = null, ParametresRechercherServiceExecutant $ParametresRechercherServiceExecutant = null ): WsRetourRechercherServiceExecutant {
        /** @var WsRetourRechercherServiceExecutant $retour */
        $retour = $this->ChorusPro->post(
            static::getBasePath() . '/v1/rechercher/serviceexecutant',
            [
                'json' => [
                    'idDestinataireCPP'    => $idDestinataireCPP,
                    'codeServiceExecutant' => $codeServiceExecutant,
                    'nomServiceExecutant'  => $nomServiceExecutant,
                    'actif'                => $actif,
                    'parametresRecherche'  => $ParametresRechercherServiceExecutant,
                ],
            ],
            WsRetourRechercherServiceExecutant::class
        );
        return $retour;
    }











    /**
     * @param int $idPieceJointeObjet
     *
     * @return bool
     * @throws \PisteGouvFr\PisteException
     * @deprecated
     */
    public function detacherPieceJointe( int $idPieceJointeObjet ): bool {
        $this->ChorusPro->post(
            static::getBasePath() . '/v1/detacherPieceJointe',
            [
                'json' => [
                    'idPieceJointeObjet' => $idPieceJointeObjet,
                ],
            ]
        );
        return true;
    }


}
