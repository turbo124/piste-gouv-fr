<?php

namespace PisteGouvFr\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use PisteGouvFr\Piste;
use PisteGouvFr\PisteException;

/**
 * Class d'execution des appels des api de chorus pro
 */
class ChorusPro extends Piste {


    protected string $tech_username;
    protected string $tech_password;

    public function __construct(string $client_id, string $client_secret, string $tech_username, string $tech_password, bool $sandbox = true, bool $depuis_RIE = false) {
        $this->tech_username = $tech_username;
        $this->tech_password = $tech_password;

        parent::__construct($client_id, $client_secret, $sandbox, $depuis_RIE);
    }


    public function initClient(): void {
        $this->client = new Client(
            [
                'base_uri'        => static::getApiUrl($this->sandbox, $this->depuis_RIE),
                'allow_redirects' => true,
                'headers'         => [
                    'Authorization' => 'Bearer '.$this->access_token,
                    'cpro-account'  => base64_encode($this->tech_username.':'.$this->tech_password),
                    'Content-Type'  => 'application/json;charset=utf-8',
                    'Accept'        => 'application/json;charset=utf-8',
                ],
            ]
        );
    }

    /**
     * @param       $uri
     * @param array $options
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetour|array
     */
    public function post($uri, array $options = [], string $classe_objet_en_retour = null) {
        if (null !== $classe_objet_en_retour && !class_exists($classe_objet_en_retour)) {
            throw new PisteException('La classe fourni en parametre de la methode '.__FUNCTION__.' de la classe '.__CLASS__.' n\'existe pas !');
        }

        try {
            $request = $this->Client()
                            ->post( $uri, $options );
        }
        catch (ClientException $CE) {
            throw $CE;
//            var_dump((string)$CE->getResponse()->getBody()->getContents());
//            die();
        }
        $response = $request->getBody()
            ->getContents();
        $data     = json_decode($response, true);

        if (null === $data) {
            throw new \Exception('json_decode exception');
        }
        if ($data['codeRetour'] !== 0) {
            throw new PisteException($data['libelle']);
        }

//        var_dump($classe_objet_en_retour);

        return (null !== $classe_objet_en_retour) ? new $classe_objet_en_retour($data) : $data;
    }
}
