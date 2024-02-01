<?php declare( strict_types=1 );

use PHPUnit\Framework\TestCase;

include_once( __DIR__ . '/const.php' );

final class TransversesTest extends TestCase {

    /**
     * Test du chemin de base
     *
     * @return void
     */
    public function testBasePath(): void {
        $this->assertEquals( '/cpro/transverses', \PisteGouvFr\Api\ChorusPro\Transverses::getBasePath(), 'Le base path de la classe Transverse n\'est pas correct' );
    }

    /**
     * Test du constructeur avec obtention du token
     *
     * @return void
     * @throws \PisteGouvFr\PisteException
     */
    public function testBadTechAccountLogin(): void {

        $ChorusProApi = new \PisteGouvFr\Api\ChorusPro( CLIENT_ID, CLIENT_SECRET, TECH_ACCOUNT_LOGIN.'error', TECH_ACCOUNT_PASSWORD, true, false );

        $Transverses = new \PisteGouvFr\Api\ChorusPro\Transverses( $ChorusProApi );

        try {
            $res = $Transverses->healthCheck();
        }
        catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->assertEquals( 401, $e->getCode(), 'Le status code de la requete doit être 401 en cas de mauvais credential ( tech account login ) ');
        }
    }

    /**
     * Test du constructeur avec obtention du token
     *
     * @return void
     * @throws \PisteGouvFr\PisteException
     */
    public function testBadTechAccountPassword(): void {
        $ChorusProApi = new \PisteGouvFr\Api\ChorusPro( CLIENT_ID, CLIENT_SECRET, TECH_ACCOUNT_LOGIN, TECH_ACCOUNT_PASSWORD.'error', true, false );

        $Transverses = new \PisteGouvFr\Api\ChorusPro\Transverses( $ChorusProApi );

        try {
            $res = $Transverses->healthCheck();
        }
        catch(\GuzzleHttp\Exception\ClientException $e) {
            $this->assertEquals( 401, $e->getCode(), 'Le status code de la requete doit être 401 en cas de mauvais credential ( tech account password ) ');
        }

    }


    /**
     * Test du constructeur avec obtention du token
     *
     * @return void
     * @throws \PisteGouvFr\PisteException
     */
    public function testHealthCheckSuccessReturn(): void {
        $ChorusProApi = new \PisteGouvFr\Api\ChorusPro( CLIENT_ID, CLIENT_SECRET, TECH_ACCOUNT_LOGIN, TECH_ACCOUNT_PASSWORD, true, false );

        $Transverses = new \PisteGouvFr\Api\ChorusPro\Transverses( $ChorusProApi );

        $res = $Transverses->healthCheck();
        $this->assertEquals( 200, $res[ 'statusCodeValue' ] );
        $this->assertEquals( "OK", $res[ 'statusCode' ] );
        $this->assertEquals( "L'API CPRO est actuellement disponible et fonctionnel.", $res[ 'body' ] );
    }
}