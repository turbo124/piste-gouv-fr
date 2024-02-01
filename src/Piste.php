<?php

namespace PisteGouvFr;

use GuzzleHttp\Client;

/**
 * Class d'execution des appels des api de piste depuis le reseau internet
 */
abstract class Piste {

    // Url depuis internet
    const AUTH_SANDBOX_URL    = 'https://sandbox-oauth.piste.gouv.fr/api/oauth/token';
    const AUTH_PRODUCTION_URL = 'https://oauth.piste.gouv.fr/api/oauth/token';
    const API_SANDBOX_URL     = 'https://sandbox-api.piste.gouv.fr';
    const API_PRODUCTION_URL  = 'https://api.piste.gouv.fr';
    // Url depuis le Réseau Interministériel de l'État (RIE)
    const RIE_AUTH_SANDBOX_URL    = 'https://sandbox-oauth.aife.economie.gouv.fr/api/oauth/token';
    const RIE_AUTH_PRODUCTION_URL = 'https://oauth.aife.economie.gouv.fr/api/oauth/token';
    const RIE_API_SANDBOX_URL     = 'https://sandbox-api.aife.economie.gouv.fr';
    const RIE_API_PRODUCTION_URL  = 'https://api.aife.economie.gouv.fr';


    protected string  $client_id;
    protected string  $client_secret;
    protected bool    $sandbox;
    protected bool    $depuis_RIE;
    protected ?string $access_token;

    /** @var Client $client */
    protected ?Client $client;

    /**
     * @return \GuzzleHttp\Client
     */
    public final function Client(): Client {
        return $this->client;
    }

    abstract protected function initClient();


    /**
     * Methode pour recuperer l'url à appeler.
     *
     * @param bool $sandbox
     * @param bool $depuis_RIE
     *
     * @return string
     */
    public static function getAuthUrl( bool $sandbox, bool $depuis_RIE ): string {
        if ( true === $sandbox ) {
            if ( true === $depuis_RIE ) {
                return static::RIE_AUTH_SANDBOX_URL;
            }
            return static::AUTH_SANDBOX_URL;
        }
        if ( true === $depuis_RIE ) {
            return static::RIE_AUTH_PRODUCTION_URL;
        }
        return static::AUTH_PRODUCTION_URL;
    }

    /**
     * Methode pour recuperer l'url à appeler.
     *
     * @param bool $sandbox
     * @param bool $depuis_RIE
     *
     * @return string
     */
    public static function getApiUrl( bool $sandbox, bool $depuis_RIE ): string {
        if ( true === $sandbox ) {
            if ( true === $depuis_RIE ) {
                return static::RIE_API_SANDBOX_URL;
            }
            return static::API_SANDBOX_URL;
        }
        if ( true === $depuis_RIE ) {
            return static::RIE_API_PRODUCTION_URL;
        }
        return static::API_PRODUCTION_URL;
    }

    /**
     * ChorusPiste constructor.
     *
     * @param string $client_id
     * @param string $client_secret
     * @param bool   $sandbox
     * @param bool   $depuis_RIE
     *
     * @throws \PisteGouvFr\PisteException|\Exception
     */
    public function __construct( string $client_id, string $client_secret, bool $sandbox = true, bool $depuis_RIE = false ) {
        $this->client_id     = $client_id;
        $this->client_secret = $client_secret;
        $this->sandbox       = $sandbox;
        $this->depuis_RIE    = $depuis_RIE;

        $this->client = null;

        $authClient = new Client();
//        var_dump(static::getAuthUrl($this->sandbox, $this->depuis_RIE));
        $auth = $authClient->post(
            static::getAuthUrl( $this->sandbox, $this->depuis_RIE ),
            [
                'form_params' => [
                    'grant_type'    => 'client_credentials',
                    'client_id'     => $this->client_id,
                    'client_secret' => $this->client_secret,
                    'scope'         => 'openid',
                ],
            ]
        );

        $response = json_decode( $auth->getBody()
                                      ->getContents(),
                                 true );
        if ( null === $response ) {
            throw new \Exception( 'json_decode exception' );
        }
        if ( !array_key_exists( 'access_token', $response ) ) {
            throw new PisteException( 'Le retour ne contient pas d\'access_token' );
        }

        $this->access_token = $response[ 'access_token' ];
        $this->initClient();
        if ( null === $this->client ) {
            throw new \Exception( 'L\'attribut client n\'a pas été correctement initialisé via la méthode initClient!' );
        }
    }
}
