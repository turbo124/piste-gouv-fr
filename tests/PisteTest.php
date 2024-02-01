<?php declare( strict_types=1 );

use PHPUnit\Framework\TestCase;
use PisteGouvFr\Piste;

include_once(__DIR__.'/const.php');

final class PisteTest extends TestCase {

    /**
     * Test de la methode getAuthUrl
     *
     * @return void
     */
    public function testGetAuthUrl(): void {
        $url = Piste::getAuthUrl( true, true );
        $this->assertEquals( Piste::RIE_AUTH_SANDBOX_URL, $url );

        $url = Piste::getAuthUrl( true, false );
        $this->assertEquals( Piste::AUTH_SANDBOX_URL, $url );

        $url = Piste::getAuthUrl( false, true );
        $this->assertEquals( Piste::RIE_AUTH_PRODUCTION_URL, $url );

        $url = Piste::getAuthUrl( false, false );
        $this->assertEquals( Piste::AUTH_PRODUCTION_URL, $url );

    }

    /**
     * Test de la methode getApiUrl
     *
     * @return void
     */
    public function testGetApiUrl(): void {
        $url = Piste::getApiUrl( true, true );
        $this->assertEquals( Piste::RIE_API_SANDBOX_URL, $url );

        $url = Piste::getApiUrl( true, false );
        $this->assertEquals( Piste::API_SANDBOX_URL, $url );

        $url = Piste::getApiUrl( false, true );
        $this->assertEquals( Piste::RIE_API_PRODUCTION_URL, $url );

        $url = Piste::getApiUrl( false, false );
        $this->assertEquals( Piste::API_PRODUCTION_URL, $url );

    }
}