<?php declare( strict_types=1 );

use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;
use PisteGouvFr\Api\ChorusPro;
use PisteGouvFr\Api\ChorusPro\TechnicalAccountCredentialUserPassword;

include_once( __DIR__ . '/const.php' );

final class ChorusProTest extends TestCase {

    /**
     * Test du constructeur avec obtention du token
     *
     * @return void
     */
    public function testConstructorSuccess(): void {
        new class( $this ) extends ChorusPro {
            protected ChorusProTest $Test;

            public function __construct( ChorusProTest $Test ) {
                $this->Test = $Test;
                parent::__construct( CLIENT_ID, CLIENT_SECRET, new TechnicalAccountCredentialUserPassword( TECH_ACCOUNT_LOGIN, TECH_ACCOUNT_PASSWORD ), true, false );
            }

            protected function initClient(): void {
                $this->Test->assertIsString( $this->access_token, 'L\'access token n\'est pas une chaine' );
                parent::initClient();
            }
        };
    }

    /**
     * @throws \PisteGouvFr\PisteException
     */
    public function testConstructorError(): void {
        // bad client id : error 400
        try {
            new ChorusPro( 'bad_id', CLIENT_SECRET, new TechnicalAccountCredentialUserPassword( TECH_ACCOUNT_LOGIN, TECH_ACCOUNT_PASSWORD ), true, false );
        }
        catch ( ClientException $e ) {
            $this->assertEquals( 400, $e->getCode(), 'Le status code de la requete doit être 400 en cas de mauvais client_id' );
        }

        try {
            new ChorusPro( CLIENT_ID, 'bad_secret', new TechnicalAccountCredentialUserPassword( TECH_ACCOUNT_LOGIN, TECH_ACCOUNT_PASSWORD ), true, false );
        }
        catch ( ClientException $e ) {
            $this->assertEquals( 400, $e->getCode(), 'Le status code de la requete doit être 400 en cas de mauvais client_secret' );
        }


        try {
            new ChorusPro( CLIENT_ID, CLIENT_SECRET, new TechnicalAccountCredentialUserPassword( TECH_ACCOUNT_LOGIN, TECH_ACCOUNT_PASSWORD ), false, false );
        }
        catch ( ClientException $e ) {
            $this->assertEquals( 400, $e->getCode(), 'Le status code de la requete doit être 400 en cas de client_id/secret non valide sur le serveur' );
        }
    }

}