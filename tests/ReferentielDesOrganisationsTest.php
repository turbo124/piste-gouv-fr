<?php declare( strict_types=1 );

use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;
use PisteGouvFr\Api\ChorusPro;
use PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations\RechercheFieldString;
use PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations\StructureRechercheRequete;
use PisteGouvFr\Api\ChorusPro\ReferentielDesOrganisations;
use PisteGouvFr\Api\ChorusPro\TechnicalAccountCredentialUserPassword;

include_once( __DIR__ . '/const.php' );

final class ReferentielDesOrganisationsTest extends TestCase {

    /**
     * Test du chemin de base
     *
     * @return void
     */
    public function testBasePath(): void {
        $this->assertEquals('/cpro/organisations/v1', ReferentielDesOrganisations::getBasePath(), 'Le base path de la classe Transverse n\'est pas correct' );
    }

    /**
     * Test du constructeur avec obtention du token
     *
     * @return void
     * @throws \PisteGouvFr\PisteException
     */
    public function testBadTechAccountLogin(): void {

        $ChorusProApi = new ChorusPro( CLIENT_ID, CLIENT_SECRET, new TechnicalAccountCredentialUserPassword( 'bad_login', TECH_ACCOUNT_PASSWORD ), true, false );

        $Api = new ReferentielDesOrganisations( $ChorusProApi );

        try {
            $Api->healthCheck();
        }
        catch ( ClientException $e ) {
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
        $ChorusProApi = new ChorusPro( CLIENT_ID, CLIENT_SECRET, new TechnicalAccountCredentialUserPassword( TECH_ACCOUNT_LOGIN, 'bad_password' ), true, false );

        $Api = new ReferentielDesOrganisations( $ChorusProApi );

        try {
            $Api->healthCheck();
        }
        catch ( ClientException $e ) {
            $this->assertEquals( 401,$e->getCode(), 'Le status code de la requete doit être 401 en cas de mauvais credential ( tech account password ) ' );
        }

    }

    protected ?ReferentielDesOrganisations $Api = null;

    /**
     * @throws \PisteGouvFr\PisteException
     */
    public function getApi(): ReferentielDesOrganisations {
        if ( null === $this->Api ) {
            $ChorusProApi = new ChorusPro( CLIENT_ID, CLIENT_SECRET, new TechnicalAccountCredentialUserPassword( TECH_ACCOUNT_LOGIN, TECH_ACCOUNT_PASSWORD ), true, false );

            $this->Api = new ReferentielDesOrganisations( $ChorusProApi );
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
        $this->assertNotCount( 0, $WsRetourRechercherStructures->values, 'Aucune structure trouvée' );
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