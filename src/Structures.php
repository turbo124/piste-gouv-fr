<?php

namespace PhpChorusPiste;

use PhpChorusPiste\Parameter\ParametresRechercherServicesStructure;

/**
 * Class d'execution capable d'effectuer les appels à l'Api Chorus-Pro Structures
 */
class Structures {

    const BASE_PATH = '/cpro/structures';

    /**
     * @var \PhpChorusPiste\Piste|\GuzzleHttp\Client
     */
    private $Piste;

    public function __construct(Piste $Piste) {
        $this->Piste = $Piste;
    }


    public function rechercherServicesStructure(int $idStructure, ParametresRechercherServicesStructure $ParametresRechercherServicesStructure = null) {
        $request  = $this->Piste->Client()->post(
            static::BASE_PATH.'/v1/rechercher/services',
            [
                'json' => [
                    'idStructure'                           => $idStructure,
                    'parametresRechercherServicesStructure' => $ParametresRechercherServicesStructure,
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
