<?php

namespace PisteGouvFr\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use PisteGouvFr\Api\ChorusPro\TechnicalAccountCredential;
use PisteGouvFr\Piste;
use PisteGouvFr\PisteException;

/**
 * Class d'execution des appels des api de chorus pro
 */
class ChorusPro extends Piste {


    protected TechnicalAccountCredential $_TechnicalAccountCredential;

    public function __construct( string $client_id, string $client_secret, TechnicalAccountCredential $TechnicalAccountCredential, bool $sandbox = true, bool $depuis_RIE = false ) {
        $this->_TechnicalAccountCredential = $TechnicalAccountCredential;

        parent::__construct( $client_id, $client_secret, $sandbox, $depuis_RIE );
    }


    protected function initClient(): void {
//        var_dump(base64_encode($this->tech_username.':'.$this->tech_password));
//        die();
        $this->client = new Client(
            [
                'base_uri'        => static::getApiUrl( $this->sandbox, $this->depuis_RIE ),
                'allow_redirects' => true,
                'headers'         => [
                    'Authorization' => 'Bearer ' . $this->access_token,
                    'cpro-account'  => (string)$this->_TechnicalAccountCredential,
                    'Content-Type'  => 'application/json;charset=utf-8',
                    'Accept'        => 'application/json;charset=utf-8',
                ],
            ]
        );
    }

    /**
     * @param             $uri
     * @param array       $options
     * @param string|null $classe_objet_en_retour
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetour|array
     * @throws \PisteGouvFr\PisteException
     */
    public function post( $uri, array $options = [], string $classe_objet_en_retour = null ) {
        if ( null !== $classe_objet_en_retour && !class_exists( $classe_objet_en_retour ) ) {
            throw new PisteException( 'La classe fourni en parametre de la methode ' . __FUNCTION__ . ' de la classe ' . __CLASS__ . ' n\'existe pas !' );
        }

        try {
            $request = $this->Client()
                            ->post( $uri, $options );
        }
        catch ( ClientException $CE ) {
            throw $CE;
//            var_dump((string)$CE->getResponse()->getBody()->getContents());
//            die();
        }
        $response = $request->getBody()
                            ->getContents();
        $data     = json_decode( $response, true );

        if ( null === $data ) {
            throw new \Exception( 'json_decode exception' );
        }
        if ( array_key_exists( 'codeRetour', $data ) && $data[ 'codeRetour' ] !== 0 ) {
            throw new PisteException( $data[ 'libelle' ], $data[ 'codeRetour' ] );
        }

//        var_dump($classe_objet_en_retour);

        return ( null !== $classe_objet_en_retour ) ? new $classe_objet_en_retour( $data ) : $data;
    }

    /**
     * @param             $uri
     * @param array       $options
     * @param string|null $classe_objet_en_retour
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetour|array
     * @throws \PisteGouvFr\PisteException
     */
    public function get( $uri, array $options = [], string $classe_objet_en_retour = null, bool $empty_response_allowed = false ) {
        if ( null !== $classe_objet_en_retour && !class_exists( $classe_objet_en_retour ) ) {
            throw new PisteException( 'La classe fourni en parametre de la methode ' . __FUNCTION__ . ' de la classe ' . __CLASS__ . ' n\'existe pas !' );
        }

        try {
            $request = $this->Client()
                            ->get( $uri, $options );
        }
        catch ( ClientException $CE ) {
            throw $CE;
//            var_dump((string)$CE->getResponse()->getBody()->getContents());
//            die();
        }
        $response = $request->getBody()
                            ->getContents();
        if ( empty( $response ) && true === $empty_response_allowed ) {
            return $response;
        }
        $data = json_decode( $response, true );
        if ( null === $data ) {
            throw new \Exception( 'json_decode exception' );
        }

        if ( array_key_exists( 'codeRetour', $data ) && $data[ 'codeRetour' ] !== 0 ) {
            throw new PisteException( $data[ 'libelle' ] );
        }

//        var_dump($classe_objet_en_retour);

        return ( null !== $classe_objet_en_retour ) ? new $classe_objet_en_retour( $data ) : $data;
    }

    /**
     * @param             $uri
     * @param array       $options
     * @param int         $status_code_ok
     *
     * @return bool|array
     * @throws \Exception
     */
    public function patch( $uri, array $options = [], int $status_code_ok = 204 ): bool|array {
        $request = $this->Client()
                        ->patch( $uri, $options );

        if ( $status_code_ok === $request->getStatusCode() ) {
            return true;
        }

        $response = $request->getBody()->getContents();
        $data     = json_decode( $response, true );

        if ( null === $data ) {
            throw new \Exception( 'json_decode exception' );
        }


        return $data;
    }
}
