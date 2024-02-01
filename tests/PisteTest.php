<?php declare( strict_types=1 );

use PHPUnit\Framework\TestCase;

include_once(__DIR__.'/const.php');

final class PisteTest extends TestCase {

    /**
     * Test de la methode getAuthUrl
     *
     * @return void
     */
    public function testGetAuthUrl(): void {
        $url = \PisteGouvFr\Piste::getAuthUrl( true, true );
        $this->assertEquals( \PisteGouvFr\Piste::RIE_AUTH_SANDBOX_URL, $url );

        $url = \PisteGouvFr\Piste::getAuthUrl( true, false );
        $this->assertEquals( \PisteGouvFr\Piste::AUTH_SANDBOX_URL, $url );

        $url = \PisteGouvFr\Piste::getAuthUrl( false, true );
        $this->assertEquals( \PisteGouvFr\Piste::RIE_AUTH_PRODUCTION_URL, $url );

        $url = \PisteGouvFr\Piste::getAuthUrl( false, false );
        $this->assertEquals( \PisteGouvFr\Piste::AUTH_PRODUCTION_URL, $url );

    }

    /**
     * Test de la methode getApiUrl
     *
     * @return void
     */
    public function testGetApiUrl(): void {
        $url = \PisteGouvFr\Piste::getApiUrl( true, true );
        $this->assertEquals( $url, \PisteGouvFr\Piste::RIE_API_SANDBOX_URL );

        $url = \PisteGouvFr\Piste::getApiUrl( true, false );
        $this->assertEquals( $url, \PisteGouvFr\Piste::API_SANDBOX_URL );

        $url = \PisteGouvFr\Piste::getApiUrl( false, true );
        $this->assertEquals( $url, \PisteGouvFr\Piste::RIE_API_PRODUCTION_URL );

        $url = \PisteGouvFr\Piste::getApiUrl( false, false );
        $this->assertEquals( $url, \PisteGouvFr\Piste::API_PRODUCTION_URL );

    }
}