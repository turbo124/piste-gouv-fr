<?php

namespace PisteGouvFr\Api\ChorusPro;

use PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureCadreDeFacturation;
use PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureDestinataire;
use PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureFournisseur;
use PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureMontantTotal;
use PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureReferences;
use PisteGouvFr\Api\ChorusPro\Parameter\Collection\LignePosteSoumettreInputCollection;
use PisteGouvFr\Api\ChorusPro\Parameter\Collection\LigneTvaSoumettreInputCollection;
use PisteGouvFr\Api\ChorusPro\Parameter\Collection\PieceJointeComplentaireSoumettreInputCollection;
use PisteGouvFr\Api\ChorusPro\Parameter\Collection\SoumettreFacturePieceJointePrincipaleCollection;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetour;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourConsulterHistoriqueFacture;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourDeposerFluxFacture;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourDeposerPdfFacture;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourSoumettreFacture;
use PisteGouvFr\Api\ChorusPro\Type\IFormatDepot;
use PisteGouvFr\Api\ChorusPro\Type\IModeDepot;
use PisteGouvFr\Api\ChorusPro\Type\ISyntaxeFlux;
use PisteGouvFr\PisteException;

/**
 * Class d'execution des appels des api de piste depuis le reseau internet
 */
class Factures extends ChorusProApi {

    public static function getBasePath(): string {
        return '/cpro/factures';
    }

    public function rechercherFactureATraiterParValideur() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function traiterFactureAValider() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function telechargerGroupeFacture() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }


    /**
     * @param string      $fichierFacture_path
     * @param string      $formatDepot
     * @param string|null $nomFichier (Si null, sera remplacer par le nom du fichier correspondant au
     *                                $fichierFacture_path)
     * @param int         $idUtilisateurCourant
     *
     * @return WsRetourDeposerPdfFacture
     * @throws \Exception
     */
    public function deposerPDFFacture(
        string $fichierFacture_path,
        string $formatDepot = IFormatDepot::PDF_NON_SIGNE,
        string $nomFichier = null,
        int    $idUtilisateurCourant = 0
    ): WsRetour {
        $nomFichier = $nomFichier ?? basename( $fichierFacture_path );

        return $this->ChorusPro->post(
            static::getBasePath() . '/v1/deposer/pdf',
            [
                'json' => [
                    'idUtilisateurCourant' => $idUtilisateurCourant,
                    'fichierFacture'       => base64_encode( file_get_contents( $fichierFacture_path ) ),
                    'nomFichier'           => $nomFichier,
                    'formatDepot'          => $formatDepot,
                ],
            ],
            WsRetourDeposerPdfFacture::class
        );
    }


    public function rechercherDemandePaiement() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function rechercherFactureParRecipiendaire() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function completerFacture() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function consulterFactureParRecipiendaire() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function rechercherFactureParValideur() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function traiterFactureRecue() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function consulterFactureParValideur() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }


    public function consulterFactureParFournisseur() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function rechercherFactureParFournisseur() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

    public function recyclerFacture() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }


    /**
     * @param string                                                                                          $numeroFactureSaisi
     * @param string|IModeDepot                                                                               $modeDepot
     * @param string                                                                                          $dateFacture
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureDestinataire                               $SoumettreFactureDestinataire
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureFournisseur                                $SoumettreFactureFournisseur
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureCadreDeFacturation                         $SoumettreFactureCadreDeFacturation
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureReferences                                 $SoumettreFactureReferences
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\Collection\LignePosteSoumettreInputCollection              $LignePosteSoumettreInputCollection
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\Collection\LigneTvaSoumettreInputCollection                $LigneTvaSoumettreInputCollection
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureMontantTotal                               $SoumettreFactureMontantTotal
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\Collection\SoumettreFacturePieceJointePrincipaleCollection $SoumettreFacturePieceJointePrincipaleCollection
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\Collection\PieceJointeComplentaireSoumettreInputCollection $PieceJointeComplentaireSoumettreInputCollection
     * @param string                                                                                          $commentaire
     *
     * @return WsRetourSoumettreFacture
     * @throws \Exception
     * @see https://developer.aife.economie.gouv.fr/api-center
     * @see https://communaute.chorus-pro.gouv.fr/soumettre-facture/
     */
    public function soumettreFacture(
        int                                             $idUtilisateurCourant,
        string                                          $numeroFactureSaisi,
        string                                          $modeDepot,
        string                                          $dateFacture,
        SoumettreFactureDestinataire                    $SoumettreFactureDestinataire,
        SoumettreFactureFournisseur                     $SoumettreFactureFournisseur,
        SoumettreFactureCadreDeFacturation              $SoumettreFactureCadreDeFacturation,
        SoumettreFactureReferences                      $SoumettreFactureReferences,
        LignePosteSoumettreInputCollection              $LignePosteSoumettreInputCollection,
        LigneTvaSoumettreInputCollection                $LigneTvaSoumettreInputCollection,
        SoumettreFactureMontantTotal                    $SoumettreFactureMontantTotal,
        SoumettreFacturePieceJointePrincipaleCollection $SoumettreFacturePieceJointePrincipaleCollection,
        PieceJointeComplentaireSoumettreInputCollection $PieceJointeComplentaireSoumettreInputCollection,
        string                                          $commentaire


    ): WsRetour {
        return $this->ChorusPro->post(
            static::getBasePath() . '/v1/soumettre',
            [
                'json' => [
                    'idUtilisateurCourant'      => $idUtilisateurCourant,
                    'modeDepot'                 => $modeDepot,
                    'numeroFactureSaisi'        => $numeroFactureSaisi,
                    'dateFacture'               => $dateFacture,
                    'destinataire'              => $SoumettreFactureDestinataire,
                    'fournisseur'               => $SoumettreFactureFournisseur,
                    'cadreDeFacturation'        => $SoumettreFactureCadreDeFacturation,
                    'references'                => $SoumettreFactureReferences,
                    'lignePoste'                => $LignePosteSoumettreInputCollection,
                    'ligneTva'                  => $LigneTvaSoumettreInputCollection,
                    'montantTotal'              => $SoumettreFactureMontantTotal,
                    'pieceJointePrincipale'     => $SoumettreFacturePieceJointePrincipaleCollection,
                    'pieceJointeComplementaire' => $PieceJointeComplentaireSoumettreInputCollection,
                    'commentaire'               => $commentaire,
                ],
            ],
            WsRetourSoumettreFacture::class
        );
    }

    /**
     * @return mixed
     * @throws \PisteGouvFr\PisteException
     * @deprecated A été déprécié avant l'implémentation.
     */
    public function rechercherFactureATraiterParRecipiendaire() {
        throw new PisteException( __FUNCTION__ . ' est dépréciée.' );
    }

    /**
     * @return mixed
     * @throws \PisteGouvFr\PisteException
     * @deprecated A été déprécié avant l'implémentation.
     */
    public function rechercherFactureATraiterParFournisseur() {
        throw new PisteException( __FUNCTION__ . ' est dépréciée.' );
    }


    public function traiterRejet() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }


    /**
     * @param int $idUtilisateurCourant
     * @param int $idFacture
     * @param int $idEspace
     * @param int $nbResultatsMaximum
     *
     * @return WsRetourConsulterHistoriqueFacture
     * @throws \Exception
     */
    public function consulterHistoriqueFacture(
        int $idUtilisateurCourant = 0,
        int $idFacture = 0,
        int $idEspace = 0,
        int $nbResultatsMaximum = 0
    ): WsRetour {
        return $this->ChorusPro->post(
            static::getBasePath() . '/v1/consulter/historique',
            [
                'json' => [
                    'idUtilisateurCourant' => $idUtilisateurCourant,
                    'idFacture'            => $idFacture,
                    'idEspace'             => $idEspace,
                    'nbResultatsMaximum'   => $nbResultatsMaximum,
                ],
            ],
            WsRetourConsulterHistoriqueFacture::class
        );
    }


    public function corrigerValideurFacture() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }


    /**
     * @param string      $fichierFlux_path
     * @param string      $syntaxeFlux
     * @param string|null $nomFichier (Si null, sera remplacer par le nom du fichier correspondant au $fichierFlux_path)
     * @param bool        $avecSignature
     * @param int         $idUtilisateurCourant
     *
     * @return WsRetourDeposerFluxFacture
     * @throws \Exception
     */
    public function deposerFluxFacture(
        string $fichierFlux_path,
        string $syntaxeFlux = ISyntaxeFlux::IN_DP_E2_CII_FACTURX,
        string $nomFichier = null,
        bool   $avecSignature = false,
        int    $idUtilisateurCourant = 0
    ): WsRetour {
        $nomFichier = $nomFichier ?? basename( $fichierFlux_path );

        return $this->ChorusPro->post(
            static::getBasePath() . '/v1/deposer/flux',
            [
                'json' => [
                    'idUtilisateurCourant' => $idUtilisateurCourant,
                    'fichierFlux'          => base64_encode( file_get_contents( $fichierFlux_path ) ),
                    'nomFichier'           => $nomFichier,
                    'syntaxeFlux'          => $syntaxeFlux,
                    'avecSignature'        => $avecSignature,
                ],
            ],
            WsRetourDeposerFluxFacture::class
        );
    }

    /**
     * @param string      $fichierFlux_path
     * @param string      $syntaxeFlux
     * @param string|null $nomFichier
     * @param bool        $avecSignature
     * @param int         $idUtilisateurCourant
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetour
     * @throws \Exception
     * @deprecated Nouvelle methode : deposerFluxFacture
     */
    public function deposerFlux(
        string $fichierFlux_path,
        string $syntaxeFlux = ISyntaxeFlux::IN_DP_E2_CII_FACTURX,
        string $nomFichier = null,
        bool   $avecSignature = false,
        int    $idUtilisateurCourant = 0
    ): WsRetour {
        return $this->deposerFluxFacture( $fichierFlux_path, $syntaxeFlux, $nomFichier, $avecSignature, $idUtilisateurCourant );
    }


    public function recupererStatutsFactureVisiblesParValideur() {
        // TODO : Implementer cette methode
        throw new PisteException( __FUNCTION__ . ' pas encore implémentée.' );
    }

}
