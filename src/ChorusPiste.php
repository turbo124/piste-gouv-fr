<?php

namespace PhpChorusPiste;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use PhpChorusPiste\Parameter\LignePosteSoumettreInput;
use PhpChorusPiste\Parameter\SoumettreFactureCadreDeFacturation;
use PhpChorusPiste\Parameter\SoumettreFactureDestinataire;
use PhpChorusPiste\Parameter\SoumettreFactureFournisseur;
use PhpChorusPiste\Parameter\SoumettreFactureMontantTotal;
use PhpChorusPiste\Parameter\SoumettreFactureReferences;
use PhpChorusPiste\ParameterCollection\LignePosteSoumettreInputCollection;
use PhpChorusPiste\ParameterCollection\LigneTvaSoumettreInputCollection;
use PhpChorusPiste\ParameterCollection\PieceJointeComplentaireSoumettreInputCollection;
use PhpChorusPiste\ParameterCollection\SoumettreFacturePieceJointePrincipaleCollection;

class ChorusPiste {

    // URL depuis le Réseau Interministériel de l'État (RIE):
    //    const AUTH_SANDBOX_URL = 'https://sandbox-oauth.aife.economie.gouv.fr/api/oauth/token';
    //    const AUTH_PRODUCTION_URL = 'https://oauth.aife.economie.gouv.fr/api/oauth/token';
    //    const API_SANDBOX_URL = 'https://sandbox-api.aife.economie.gouv.fr';
    //    const API_PRODUCTION_URL = 'https://api.aife.economie.gouv.fr';
    // Url depuis internet
    const AUTH_SANDBOX_URL    = 'https://sandbox-oauth.piste.gouv.fr/api/oauth/token';
    const AUTH_PRODUCTION_URL = 'https://oauth.piste.gouv.fr/api/oauth/token';
    const API_SANDBOX_URL     = 'https://sandbox-api.piste.gouv.fr';
    const API_PRODUCTION_URL  = 'https://api.piste.gouv.fr';

    /** @var Client $client */
    private $client;

    /**
     * ChorusPiste constructor.
     *
     * @param string $client_id
     * @param string $client_secret
     * @param string $tech_username
     * @param string $tech_password
     * @param bool   $sandbox
     *
     * @throws GuzzleException
     */
    public function __construct(
        string $client_id,
        string $client_secret,
        string $tech_username,
        string $tech_password,
        bool $sandbox = true
    ) {
        $authClient = new Client();
        $auth       = $authClient->post(
            $sandbox ? self::AUTH_SANDBOX_URL : self::AUTH_PRODUCTION_URL,
            [
                'form_params' => [
                    'grant_type'    => 'client_credentials',
                    'client_id'     => $client_id,
                    'client_secret' => $client_secret,
                    'scope'         => 'openid',
                ],
            ]
        );
        $response   = json_decode($auth->getBody()
                                      ->getContents(),
                                  false,
                                  512);
        if (null === $response) {
            throw new \Exception('json_decode exception');
        }

        $token = $response->access_token;
        //        var_dump($token);
        $this->client = new Client(
            [
                'base_uri'        => $sandbox ? self::API_SANDBOX_URL : self::API_PRODUCTION_URL,
                'allow_redirects' => true,
                'headers'         => [
                    'Authorization' => 'Bearer '.$token,
                    'cpro-account'  => base64_encode($tech_username.':'.$tech_password),
                    'Content-Type'  => 'application/json;charset=utf-8',
                    'Accept'        => 'application/json;charset=utf-8',
                ],
            ]
        );
        $cpro = base64_encode($tech_username.':'.$tech_password);

        $cmd = <<<CMD
curl -is -H "accept: application/json;charset=utf-8" -H "cpro-account: $cpro" -H "Content-Type: application/json;charset=utf-8" -H "Authorization: Bearer $token" -X POST "https://sandbox-api.piste.gouv.fr/cpro/transverses/v1/recuperer/structures/actives/fournisseur"
CMD;
        echo "Commande : ".PHP_EOL;
        echo $cmd.PHP_EOL;
        echo "----------------------------------------------------------------------------------------------------------------".PHP_EOL;
        echo "Reponse : ".PHP_EOL;
        echo `$cmd`;
        die();
    }

    /**
     * @param string $invoiceId
     * @param string $syntax
     *
     * @return mixed
     */
    public function getStatusDepot(string $invoiceId, string $syntax = IFlux::IN_DP_E2_UBL_INVOICE_MIN)  {
        $request  = $this->client->post(
            '/cpro/transverses/v1/consulterCRDetaille',
            [
                'json' => [
                    'numeroFluxDepot' => $invoiceId,
                    'syntaxeFlux'     => $syntax,
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

        $request  = $this->client->post(
            '/cpro/factures/v1/deposer/flux',
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
     * @param int    $idUtilisateurCourant
     * @param string $fichierFlux_path
     * @param string $nomFichier (Si null, sera remplacer par le nom du fichier correspondant au $fichierFacture_path)
     * @param string $syntaxeFlux
     * @param bool   $avecSignature
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

        $request  = $this->client->post(
            '/cpro/factures/v1/deposer/pdf',
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
        $request  = $this->client->post(
            '/cpro/factures/v1/soumettre',
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
            throw new ChorusPisteException($data->libelle);
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
        $request  = $this->client->post(
            '/cpro/factures/v1/consulter/historique',
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
            throw new ChorusPisteException($data->libelle);
        }
        return $data;
    }


    public function recupererCoordonneesBancairesValides(int $idStructure) {
        $request  = $this->client->post(
            '/cpro/transverses/v1/recuperer/coordbanc/valides',
            [
                'json' => [
                    'idStructure' => $idStructure,
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
            throw new ChorusPisteException($data->libelle);
        }
        return $data;

    }
    public function recupererStructuresPourUtilisateur(int $espaceFo = null) {
        $request  = $this->client->post(
            '/cpro/transverses/v1/recuperer/structuresPourUtilisateur',
            [
                'json' => [
                    'espaceFo' => $espaceFo,
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
            throw new ChorusPisteException($data->libelle);
        }
        return $data;

    }
    public function recupererStructuresActivesPourFournisseur() {
        $request  = $this->client->post(
            '/cpro/transverses/v1/recuperer/structures/actives/fournisseur'
        );
        $response = $request->getBody()
            ->getContents();

        $data     = json_decode($response, false, 512);
        if (null === $data) {
            throw new \Exception('json_decode exception');
        }
        if ($data->codeRetour !== 0) {
            throw new ChorusPisteException($data->libelle);
        }
        return $data;

    }
}
