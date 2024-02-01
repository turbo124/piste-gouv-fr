<?php declare( strict_types=1 );

use PHPUnit\Framework\TestCase;

include_once( __DIR__ . '/const.php' );

final class ChorusProTest extends TestCase {

    /**
     * Test du constructeur avec obtention du token
     *
     * @return void
     */
    public function testConstructorSuccess(): void {
        new class( $this ) extends \PisteGouvFr\Api\ChorusPro {
            protected ChorusProTest $Test;

            public function __construct( ChorusProTest $Test ) {
                $this->Test = $Test;
                parent::__construct( CLIENT_ID, CLIENT_SECRET, TECH_ACCOUNT_LOGIN, TECH_ACCOUNT_PASSWORD, true, false );
            }

            protected function initClient(): void {
                $this->Test->assertIsString( $this->access_token, 'L\'access token n\'est pas une chaine' );
                parent::initClient();
            }
        };
    }

    public function testConstructorError(): void {
        // bad client id : error 400
        try {
            new \PisteGouvFr\Api\ChorusPro( CLIENT_ID . 'error', CLIENT_SECRET, TECH_ACCOUNT_LOGIN, TECH_ACCOUNT_PASSWORD, true, false );
        }
        catch ( \GuzzleHttp\Exception\ClientException $e ) {
            $this->assertEquals( 400, $e->getCode(), 'Le status code de la requete doit être 400 en cas de mauvais client_id' );
        }

        try {
            new \PisteGouvFr\Api\ChorusPro( CLIENT_ID, CLIENT_SECRET . 'error', TECH_ACCOUNT_LOGIN, TECH_ACCOUNT_PASSWORD, true, false );
        }
        catch ( \GuzzleHttp\Exception\ClientException $e ) {
            $this->assertEquals( 400, $e->getCode(), 'Le status code de la requete doit être 400 en cas de mauvais client_secret' );
        }

        try {
            new \PisteGouvFr\Api\ChorusPro( CLIENT_ID, CLIENT_SECRET, TECH_ACCOUNT_LOGIN, TECH_ACCOUNT_PASSWORD, false, false );
        }
        catch ( \GuzzleHttp\Exception\ClientException $e ) {
            $this->assertEquals( 400, $e->getCode(), 'Le status code de la requete doit être 400 en cas de client_id/secret non valide sur le serveur' );
        }
    }

}