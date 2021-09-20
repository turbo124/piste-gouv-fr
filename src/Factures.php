<?php

namespace PhpChorusPiste;

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
 * Class d'execution des appels des api de piste depuis le reseau internet
 */
class Factures {

    const BASE_PATH = '/cpro/factures';

    /**
     * @var \PhpChorusPiste\Piste|\GuzzleHttp\Client
     */
    private $Piste;

    public function __construct(Piste $Piste) {
        $this->Piste = $Piste;
    }

    /**
     * @param int    $idUtilisateurCourant
     * @param string $fichierFlux_path
     * @param string $nomFichier (Si null, sera remplacer par le nom du fichier correspondant au $fichierFlux_path)
     * @param string $syntaxeFlux
     * @param bool   $avecSignature
     *
     * @return mixed
     * @throws \Exception
     */
    public function deposerFlux(
        string $fichierFlux_path,
        string $syntaxeFlux = IFlux::IN_DP_E2_CII_FACTURX,
        string $nomFichier = null,
        bool $avecSignature = false,
        int $idUtilisateurCourant = 0


    ) {
        $nomFichier = $nomFichier ?? basename($fichierFlux_path);

        $request  = $this->Piste->Client()->post(
            static::BASE_PATH.'/v1/deposer/flux',
            [
                'json' => [
                    'idUtilisateurCourant' => $idUtilisateurCourant,
                    'fichierFlux'          => base64_encode(file_get_contents($fichierFlux_path)),
                    'nomFichier'           => $nomFichier,
                    'syntaxeFlux'          => $syntaxeFlux,
                    'avecSignature'        => $avecSignature,
                ],
            ]
        );
        $response = $request->getBody()
            ->getContents();
        $data     = json_decode($response, false, 512);
        if (null === $data) {
            throw new \Exception('json_decode exception');
        }
        return $data;
    }

    /**
     * @param string $fichierFacture_path
     * @param string $formatDepot
     * @param string $nomFichier (Si null, sera remplacer par le nom du fichier correspondant au $fichierFacture_path)
     * @param int    $idUtilisateurCourant
     *
     * @return mixed
     * @throws \Exception
     */
    public function deposerPDFFacture(
        string $fichierFacture_path,
        string $formatDepot = IFormatDepot::PDF_NON_SIGNE,
        string $nomFichier = null,
        int $idUtilisateurCourant = 0
    ) {
        $nomFichier = $nomFichier ?? basename($fichierFacture_path);

        $request  = $this->Piste->Client()->post(
            static::BASE_PATH.'/v1/deposer/pdf',
            [
                'json' => [
                    'idUtilisateurCourant' => $idUtilisateurCourant,
                    'fichierFacture'       => base64_encode(file_get_contents($fichierFacture_path)),
                    'nomFichier'           => $nomFichier,
                    'formatDepot'          => $formatDepot,
                ],
            ]
        );
        $response = $request->getBody()
            ->getContents();
        $data     = json_decode($response, false, 512);
        if (null === $data) {
            throw new \Exception('json_decode exception');
        }
        return $data;
    }




    /**
     * @param string                                                                              $numeroFactureSaisi
     * @param string|IModeDepot                                                                   $modeDepot
     * @param string                                                                              $dateFacture
     * @param \PhpChorusPiste\Parameter\SoumettreFactureDestinataire                              $SoumettreFactureDestinataire
     * @param \PhpChorusPiste\Parameter\SoumettreFactureFournisseur                               $SoumettreFactureFournisseur
     * @param \PhpChorusPiste\Parameter\SoumettreFactureCadreDeFacturation                        $SoumettreFactureCadreDeFacturation
     * @param \PhpChorusPiste\Parameter\SoumettreFactureReferences                                $SoumettreFactureReferences
     * @param \PhpChorusPiste\ParameterCollection\LignePosteSoumettreInputCollection              $LignePosteSoumettreInputCollection
     * @param \PhpChorusPiste\ParameterCollection\LigneTvaSoumettreInputCollection                $LigneTvaSoumettreInputCollection
     * @param \PhpChorusPiste\Parameter\SoumettreFactureMontantTotal                              $SoumettreFactureMontantTotal
     * @param \PhpChorusPiste\ParameterCollection\SoumettreFacturePieceJointePrincipaleCollection $SoumettreFacturePieceJointePrincipaleCollection
     * @param \PhpChorusPiste\ParameterCollection\PieceJointeComplentaireSoumettreInputCollection $PieceJointeComplentaireSoumettreInputCollection
     * @param string                                                                              $commentaire
     *
     * @return mixed
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


    ) {
        $request  = $this->Piste->Client()->post(
            static::BASE_PATH.'/v1/soumettre',
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
            ]
        );
        $response = $request->getBody()
            ->getContents();
        $data     = json_decode($response, false, 512);
        if (null === $data) {
            throw new \Exception('json_decode exception');
        }
        if ($data->codeRetour !== 0) {
            throw new PisteException($data->libelle);
        }
        return $data;
    }

    /**
     * @param int $idUtilisateurCourant
     * @param int $idFacture
     * @param int $idEspace
     * @param int $nbResultatsMaximum
     *
     * @return mixed
     * @throws \Exception
     */
    public function consulterHistoriqueFacture(
        int $idUtilisateurCourant = 0,
        int $idFacture = 0,
        int $idEspace = 0,
        int $nbResultatsMaximum = 0
    ) {
        $request  = $this->Piste->Client()->post(
            static::BASE_PATH.'/v1/consulter/historique',
            [
                'json' => [
                    'idUtilisateurCourant' => $idUtilisateurCourant,
                    'idFacture'            => $idFacture,
                    'idEspace'             => $idEspace,
                    'nbResultatsMaximum'   => $nbResultatsMaximum,
                ],
            ]
        );
        $response = $request->getBody()
            ->getContents();
        $data     = json_decode($response, false, 512);
        if (null === $data) {
            throw new \Exception('json_decode exception');
        }
        if ($data->codeRetour !== 0) {
            throw new PisteException($data->libelle);
        }
        return $data;
    }

}
