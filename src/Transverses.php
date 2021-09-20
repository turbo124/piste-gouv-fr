<?php

namespace PhpChorusPiste;

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
     * @return mixed
     */
    public function getStatusDepot(string $invoiceId, string $syntax = IFlux::IN_DP_E2_UBL_INVOICE_MIN) {
        $request  = $this->Piste->Client()->post(
            static::BASE_PATH.'/v1/consulterCRDetaille',
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




    public function recupererCoordonneesBancairesValides(int $idStructure) {
        $request  = $this->Piste->Client()->post(
            static::BASE_PATH.'/v1/recuperer/coordbanc/valides',
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
            throw new PisteException($data->libelle);
        }
        return $data;
    }

    public function recupererStructuresPourUtilisateur(int $espaceFo = null) {
        $request  = $this->Piste->Client()->post(
            static::BASE_PATH.'/v1/recuperer/structuresPourUtilisateur',
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
            throw new PisteException($data->libelle);
        }
        return $data;
    }

    public function recupererStructuresActivesPourFournisseur() {
        $request  = $this->Piste->Client()->post(
            static::BASE_PATH.'/v1/recuperer/structures/actives/fournisseur',
            [
                'body' => '{}',
            ]
        );
        $response = $request->getBody()
            ->getContents();

        $data = json_decode($response, false, 512);
        if (null === $data) {
            throw new \Exception('json_decode exception');
        }
        if ($data->codeRetour !== 0) {
            throw new PisteException($data->libelle);
        }
        return $data;
    }



    public function detacherPieceJointe(int $idPieceJointeObjet) {
        $request  = $this->Piste->Client()->post(
            static::BASE_PATH.'/v1/detacherPieceJointe',
            [
                'json' => [
                    'idPieceJointeObjet' => $idPieceJointeObjet,
                ],
            ]
        );
        $response = $request->getBody()
            ->getContents();

        $data = json_decode($response, false, 512);
        if (null === $data) {
            throw new \Exception('json_decode exception');
        }
        if ($data->codeRetour !== 0) {
            throw new PisteException($data->libelle);
        }
        return $data;
    }
}
