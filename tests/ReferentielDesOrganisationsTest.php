<?php declare( strict_types=1 );

use PHPUnit\Framework\TestCase;
use PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations\RechercheFieldString;
use PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations\StructureRechercheRequete;
use PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations\WsRetourRechercherStructures;

include_once( __DIR__ . '/const.php' );

final class ReferentielDesOrganisationsTest extends TestCase {

    /**
     * Test du chemin de base
     *
     * @return void
     */
    public function testBasePath(): void {
        $this->assertEquals('/cpro/organisations/v1', \PisteGouvFr\Api\ChorusPro\ReferentielDesOrganisations::getBasePath(), 'Le base path de la classe Transverse n\'est pas correct' );
    }

    /**
     * Test du constructeur avec obtention du token
     *
     * @return void
     */
    public function testBadTechAccountLogin(): void {

        $ChorusProApi = new \PisteGouvFr\Api\ChorusPro( CLIENT_ID, CLIENT_SECRET, TECH_ACCOUNT_LOGIN . 'error', TECH_ACCOUNT_PASSWORD, true, false );

        $Api = new \PisteGouvFr\Api\ChorusPro\ReferentielDesOrganisations( $ChorusProApi );

        try {
            $res = $Api->healthCheck();
        }
        catch ( \GuzzleHttp\Exception\ClientException $e ) {
            $this->assertEquals( 401, $e->getCode(), 'Le status code de la requete doit être 401 en cas de mauvais credential ( tech account login ) ' );
        }
    }

    /**
     * Test du constructeur avec obtention du token
     *
     * @return void
     * @throws \PisteGouvFr\PisteException
     */
    public function testBadTechAccountPassword(): void {
        $ChorusProApi = new \PisteGouvFr\Api\ChorusPro( CLIENT_ID, CLIENT_SECRET, TECH_ACCOUNT_LOGIN, TECH_ACCOUNT_PASSWORD . 'error', true, false );

        $Api = new \PisteGouvFr\Api\ChorusPro\ReferentielDesOrganisations( $ChorusProApi );

        try {
            $res = $Api->healthCheck();
        }
        catch ( \GuzzleHttp\Exception\ClientException $e ) {
            $this->assertEquals( 401,$e->getCode(), 'Le status code de la requete doit être 401 en cas de mauvais credential ( tech account password ) ' );
        }

    }

    protected ?\PisteGouvFr\Api\ChorusPro\ReferentielDesOrganisations $Api = null;

    public function getApi(): \PisteGouvFr\Api\ChorusPro\ReferentielDesOrganisations {
        if ( null === $this->Api ) {
            $ChorusProApi = new \PisteGouvFr\Api\ChorusPro( CLIENT_ID, CLIENT_SECRET, TECH_ACCOUNT_LOGIN, TECH_ACCOUNT_PASSWORD, true, false );

            $this->Api = new \PisteGouvFr\Api\ChorusPro\ReferentielDesOrganisations( $ChorusProApi );
        }
        return $this->Api;
    }


    /**
     * Test du constructeur avec obtention du token
     *
     * @return void
     * @throws \PisteGouvFr\PisteException
     */
    public function testHealthCheckSuccessReturn(): void {
        $res = $this->getApi()->healthCheck();
        $this->assertTrue( $res );
    }

    public function testRecupererPieceJointeStructure(): void {
        // TODO : Ecrire le test
        $this->assertTrue(true);
    }

    public function testRechercherServicesStructure(): void {
        // TODO : Ecrire le test
        $this->assertTrue(true);
    }

    public function testConsulterStructure(): void {
        // TODO : Ecrire le test
        $this->assertTrue(true);
    }

    public function testListerPiecesJointesStructure(): void {
        // TODO : Ecrire le test
        $this->assertTrue(true);
    }

    public function testModifierStructure(): void {
        // TODO : Ecrire le test
        $this->assertTrue(true);
    }

    /**
     * @throws \PisteGouvFr\PisteException
     */
    public function testRechercherStructures(): void {
        $WsRetourRechercherStructures = $this->getApi()->rechercherStructures(
            ( new StructureRechercheRequete() )
                ->filtrerParTypeIdentifiant(
                    new RechercheFieldString( '=', CHORUSPRO_IDENTIFIANT_TYPE )
                )
                ->filtrerParIdentifiant(
                    new RechercheFieldString( '=', CHORUSPRO_IDENTIFIANT_STRUCTURE )
                )
        );
        $this->assertNotEquals(0,count($WsRetourRechercherStructures->values),'Aucune structure trouvée');
    }

    public function testConsulterService(): void {
        // TODO : Ecrire le test
        $this->assertTrue(true);
    }

    public function testRechercherServiceOrganisation(): void {
        // TODO : Ecrire le test
        $this->assertTrue(true);
    }
}