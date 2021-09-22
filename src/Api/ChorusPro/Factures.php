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

/**
 * Class d'execution des appels des api de piste depuis le reseau internet
 */
class Factures extends ChorusProApi {

    public static function getBasePath(): string {
        return '/cpro/factures';
    }

    /**
     * @param int    $idUtilisateurCourant
     * @param string $fichierFlux_path
     * @param string $nomFichier (Si null, sera remplacer par le nom du fichier correspondant au $fichierFlux_path)
     * @param string $syntaxeFlux
     * @param bool   $avecSignature
     *
     * @return WsRetourDeposerFluxFacture
     * @throws \Exception
     */
    public function deposerFlux(
        string $fichierFlux_path,
        string $syntaxeFlux = ISyntaxeFlux::IN_DP_E2_CII_FACTURX,
        string $nomFichier = null,
        bool $avecSignature = false,
        int $idUtilisateurCourant = 0
    ): WsRetour {
        $nomFichier = $nomFichier ?? basename($fichierFlux_path);

        return $this->ChorusPro->post(
            static::getBasePath().'/v1/deposer/flux',
            [
                'json' => [
                    'idUtilisateurCourant' => $idUtilisateurCourant,
                    'fichierFlux'          => base64_encode(file_get_contents($fichierFlux_path)),
                    'nomFichier'           => $nomFichier,
                    'syntaxeFlux'          => $syntaxeFlux,
                    'avecSignature'        => $avecSignature,
                ],
            ],
            WsRetourDeposerFluxFacture::class
        );
    }

    /**
     * @param string $fichierFacture_path
     * @param string $formatDepot
     * @param string $nomFichier (Si null, sera remplacer par le nom du fichier correspondant au $fichierFacture_path)
     * @param int    $idUtilisateurCourant
     *
     * @return WsRetourDeposerPdfFacture
     * @throws \Exception
     */
    public function deposerPDFFacture(
        string $fichierFacture_path,
        string $formatDepot = IFormatDepot::PDF_NON_SIGNE,
        string $nomFichier = null,
        int $idUtilisateurCourant = 0
    ): WsRetour {
        $nomFichier = $nomFichier ?? basename($fichierFacture_path);

        return $this->ChorusPro->post(
            static::getBasePath().'/v1/deposer/pdf',
            [
                'json' => [
                    'idUtilisateurCourant' => $idUtilisateurCourant,
                    'fichierFacture'       => base64_encode(file_get_contents($fichierFacture_path)),
                    'nomFichier'           => $nomFichier,
                    'formatDepot'          => $formatDepot,
                ],
            ],
            WsRetourDeposerPdfFacture::class
        );
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
        int $idUtilisateurCourant,
        string $numeroFactureSaisi,
        string $modeDepot,
        string $dateFacture,
        SoumettreFactureDestinataire $SoumettreFactureDestinataire,
        SoumettreFactureFournisseur $SoumettreFactureFournisseur,
        SoumettreFactureCadreDeFacturation $SoumettreFactureCadreDeFacturation,
        SoumettreFactureReferences $SoumettreFactureReferences,
        LignePosteSoumettreInputCollection $LignePosteSoumettreInputCollection,
        LigneTvaSoumettreInputCollection $LigneTvaSoumettreInputCollection,
        SoumettreFactureMontantTotal $SoumettreFactureMontantTotal,
        SoumettreFacturePieceJointePrincipaleCollection $SoumettreFacturePieceJointePrincipaleCollection,
        PieceJointeComplentaireSoumettreInputCollection $PieceJointeComplentaireSoumettreInputCollection,
        string $commentaire


    ): WsRetour {
        return $this->ChorusPro->post(
            static::getBasePath().'/v1/soumettre',
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
            static::getBasePath().'/v1/consulter/historique',
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

}
