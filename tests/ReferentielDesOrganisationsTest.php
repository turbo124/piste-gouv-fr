<?php declare( strict_types=1 );

use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;
use PisteGouvFr\Api\ChorusPro;
use PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations\RechercheFieldString;
use PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations\ServiceRechercheRequete;
use PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations\StructureRechercheRequete;
use PisteGouvFr\Api\ChorusPro\ReferentielDesOrganisations;
use PisteGouvFr\Api\ChorusPro\TechnicalAccountCredentialUserPassword;
use PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations\WsRetourRechercherStructures;

include_once( __DIR__ . '/const.php' );

/**
 * Structure ID existing for France
 * string(32) "0027679d1bd1cd5065eac656464bcbb1"
 * string(32) "006accaa8785cd10dd5fc80e8bbb35f4"
 * string(32) "007e0a151b1d8d5065eac656464bcb7b"
 * string(32) "00a2831d1b11cd5065eac656464bcbbb"
 * string(32) "00bec839879d0110dd5fc80e8bbb357f"
 * string(32) "013559e11b0d891065eac656464bcb58"
 * string(32) "0140150e87198110dd5fc80e8bbb3580"
 * string(32) "01a6e73387980950bf7143bf8bbb3517"
 * string(32) "01b607ec1b4d451065eac656464bcb48"
 * string(32) "021ac7a41b8d451065eac656464bcb22"
 */
final class ReferentielDesOrganisationsTest extends TestCase {

    /**
     * Test du chemin de base
     *
     * @return void
     */
    public function testBasePath(): void {
        $this->assertEquals( '/cpro/organisations/v1', ReferentielDesOrganisations::getBasePath(), 'Le base path de la classe Transverse n\'est pas correct' );
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
        $res = null;
        try {
            $res = $Api->healthCheck();
        }
        catch ( ChorusPro\HttpResponseError $e ) {
            $this->assertEquals( 401, $e->getCode(), 'Le status code de la requete doit être 401 en cas de mauvais credential ( tech account login ) ' );
            $this->assertEquals( '401', $e->body()->ErrorCode, "Le corps de la reponse d'erreur ne contient pas le bon code d'erreur" );
            $this->assertEquals( "[invalid field]", $e->body()->Description, "Le corps de la reponse d'erreur ne contient pas la bonne description" );
        }
        $this->assertNull( $res, "L'API à retourné une reponse valide pour la methode health-check alors que l'identifant de connexion est incorrect" );
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
        $res = null;
        try {
            $res = $Api->healthCheck();
        }
        catch ( ChorusPro\HttpResponseError $e ) {
            $this->assertEquals( 401, $e->getCode(), 'Le status code de la requete doit être 401 en cas de mauvais credential ( tech account password ) ' );
            $this->assertEquals( '401', $e->body()->ErrorCode, "Le corps de la reponse d'erreur ne contient pas le bon code d'erreur" );
            $this->assertEquals( "[invalid field]", $e->body()->Description, "Le corps de la reponse d'erreur ne contient pas la bonne description" );
        }

        $this->assertNull( $res, "L'API à retourné une reponse valide pour la methode health-check alors que le mot de passe de connexion est incorrect" );

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
     * @throws \PisteGouvFr\Api\ChorusPro\HttpResponseError
     */
    public function testHealthCheckSuccessReturn(): void {
        $res = $this->getApi()->healthCheck();
        $this->assertTrue( $res );
    }

    public function testRecupererPieceJointeStructure(): void {
        // TODO : Ecrire le test
        $this->assertTrue( true );
    }

    /**
     * @throws \PisteGouvFr\PisteException
     * @throws \Exception
     */
    public function testRechercherServicesStructure(): void {
        // test avec un uuid existant
        $uuid_structure_exists                = '006accaa8785cd10dd5fc80e8bbb35f4';
        $WsRetourRechercherServicesStructures = $this->getApi()->rechercherServicesStructure( $uuid_structure_exists );
        $this->assertCount( 3, $WsRetourRechercherServicesStructures->values, 'La recherche des services de la structure n\'a pas retourné le bon nombre de résultat' );

        // test avec un uuid non existant
        $uuid_structure_notexists = 'no_exist_uuid';
        $res                      = null;
        try {
            $res = $this->getApi()->rechercherServicesStructure( $uuid_structure_notexists );
        }
        catch ( ChorusPro\HttpResponseError $e ) {
            $this->assertEquals( 400, $e->getCode(), "Le code d'erreur est mauvais en cas d'uuid de structure non existant" );
            $this->assertEquals( "ParamsInvalidUuidStructures", $e->body()[ 0 ]->error, "L'erreur est mauvaise en cas d'uuid de structure non existant" );
            $this->assertEquals( "L'identifiant passé en paramètre n'est ni un UUID, ni un SIRET, ni un numéro de TVA Intracommunautaire.", $e->body()[ 0 ]->message, "Le message est mauvaise en cas d'uuid de structure non existant" );
        }
        $this->assertNull( $res, "L'api à retourné une réponse alors que l'uuid de structure n'est pas valide !" );
    }

    /**
     * @throws \PisteGouvFr\PisteException
     */
    public function testConsulterStructure(): void {
        $uuid_structure    = '006accaa8785cd10dd5fc80e8bbb35f4';
        $WsRetourStructure = $this->getApi()->consulterStructure( $uuid_structure );
        $this->assertEquals( $uuid_structure, $WsRetourStructure->uuid, "L'uuid retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( 'Destinataire', $WsRetourStructure->libelleOrganisation, "Le libelleOrganisation retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '', $WsRetourStructure->numeroTvaIntracommunautaire, "Le numeroTvaIntracommunautaire retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( (string)ChorusPro\Type\ReferentielDesOrganisations\TypeOrganisation::PUBLIC(), $WsRetourStructure->typeOrganisation, "Le typeOrganisation retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '9c6a00ea8785cd10dd5fc80e8bbb3594', $WsRetourStructure->contactPrincipal, "Le contactPrincipal retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '', $WsRetourStructure->organisationParent, "Le organisationParent retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertFalse( $WsRetourStructure->estCentreGestionAgricole, "Le estCentreGestionAgricole retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertFalse( $WsRetourStructure->gestionNumeroEJOuCodeService, "Le gestionNumeroEJOuCodeService retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( 0, $WsRetourStructure->numeroPacage, "Le numeroPacage retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( (string)ChorusPro\Type\ReferentielDesOrganisations\StatusStructure::ACTIVE(), $WsRetourStructure->status, "Le status retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '50419910266307', $WsRetourStructure->identifiant, "Le identifiant retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '0', $WsRetourStructure->typeIdentifiant, "Le typeIdentifiant retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( 0, $WsRetourStructure->categorieFournisseurMemoireId, "Le categorieFournisseurMemoireId retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( 0, $WsRetourStructure->categorieBeneficiaireId, "Le categorieBeneficiaireId retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( 'test street', $WsRetourStructure->adresse, "Le adresse retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '', $WsRetourStructure->complementAdresse1, "Le complementAdresse1 retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '', $WsRetourStructure->complementAdresse2, "Le complementAdresse2 retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '99999', $WsRetourStructure->codePostal, "Le codePostal retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( 'test city', $WsRetourStructure->ville, "Le ville retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( 'France', $WsRetourStructure->pays, "Le pays retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '', $WsRetourStructure->adresseElectronique, "Le adresseElectronique retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '', $WsRetourStructure->telephone, "Le telephone retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertFalse( $WsRetourStructure->recevoirCyclesViesEdi, "Le recevoirCyclesViesEdi retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertFalse( $WsRetourStructure->emetteurFluxEdi, "Le emetteurFluxEdi retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertFalse( $WsRetourStructure->nonDiffusibleInsee, "Le nonDiffusibleInsee retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( \DateTime::class, get_class( $WsRetourStructure->derniereMaj ), "Le derniereMaj retourné pour la consultation d'une structure n'est pas bon type." );
        $this->assertEquals( '2022-09-14 13:00:08', $WsRetourStructure->derniereMaj->format( 'Y-m-d H:i:s' ), "Le derniereMaj retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '', $WsRetourStructure->nomStructure, "Le nomStructure retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '', $WsRetourStructure->prenomStructure, "Le prenomStructure retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '', $WsRetourStructure->numeroRcsStructure, "Le numeroRcsStructure retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertFalse( $WsRetourStructure->numeroEjDoitEtreRenseigne, "Le numeroEjDoitEtreRenseigne retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertFalse( $WsRetourStructure->codeServiceDoitEtreRenseigne, "Le codeServiceDoitEtreRenseigne retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertFalse( $WsRetourStructure->statutMiseEnPaiementNestPasRemonte, "Le statutMiseEnPaiementNestPasRemonte retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertFalse( $WsRetourStructure->avecMOA, "Le avecMOA retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertFalse( $WsRetourStructure->estMOAUniquement, "Le estMOAUniquement retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( 0, $WsRetourStructure->structureOrigine, "Le structureOrigine retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( 'Destinataire 50419910266307', $WsRetourStructure->raisonSociale, "Le raisonSociale retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '', $WsRetourStructure->categorieJuridique, "Le categorieJuridique retourné pour la consultation d'une structure n'est pas bon." );
        $this->assertEquals( '', $WsRetourStructure->categorieEntreprise, "Le categorieEntreprise retourné pour la consultation d'une structure n'est pas bon." );
    }

    /**
     * @throws \PisteGouvFr\PisteException
     * @throws \PisteGouvFr\Api\ChorusPro\HttpResponseError
     */
    public function testListerPiecesJointesStructure(): void {
        $uuid_structure_sans_pieces_jointes   = '006accaa8785cd10dd5fc80e8bbb35f4';
        $WsRetourListerPiecesJointesStructure = $this->getApi()->listerPiecesJointesStructure( $uuid_structure_sans_pieces_jointes );
        $this->assertCount( 0, $WsRetourListerPiecesJointesStructure->values, 'La liste des pièces jointes de la structure n\'a pas retourné le bon nombre de résultat' );
        // TODO : Il manque un test avec un structure qui contiendrait des pièces jointes mais il n'y en a aucune dans le matelas de test
    }

    /**
     * @throws \PisteGouvFr\PisteException
     */
    public function testModifierStructure(): void {
        $uuid_structure = '006accaa8785cd10dd5fc80e8bbb35f4';
        $res            = null;
        try {
            $res = $this->getApi()->modifierStructure( $uuid_structure, null, null );
        }
        catch ( ChorusPro\HttpResponseError $e ) {
            $this->assertEquals( 403, $e->getCode(), "L\'acces en modification de la structures devrait retourner une erreur 403" );
        }
        $this->assertNull( $res, "L'API à retourné une reponse valide pour la methode modifierStructure alors que ce n'etait pas autorisé" );

        // TODO : Il manque le cas ou on test une modifiction possible, mais je n'ai pas encore trouvé comment.
    }

    /**
     * @throws \PisteGouvFr\PisteException
     * @throws \Exception
     */
    public function testRechercherStructures(): void {
        $WsRetourRechercherStructures = $this->getApi()->rechercherStructures(
            ( new StructureRechercheRequete() )
                ->filtrerParPays( new RechercheFieldString( '=', 'France' ) )
                ->setFields( 'uuid' )
        );
        $this->assertNotCount( 0, $WsRetourRechercherStructures->values, 'Aucune structure trouvée' );
    }

    /**
     * @throws \PisteGouvFr\PisteException
     */
    public function testConsulterService(): void {
        // test avec un uuid qui n'existe pas
        $uuid_service_notexists = 'not_exist_service';
        $res                    = null;
        try {
            $res = $this->getApi()->consulterService( $uuid_service_notexists );
        }
        catch ( ChorusPro\HttpResponseError $e ) {
            $this->assertEquals( 400, $e->getCode(), "Le code d'erreur est mauvais en cas d'uuid non existant pour la methode consulterService" );
            $this->assertEquals( "NotFoundReference", $e->body()[ 0 ]->error, "L'error est mauvais en cas d'uuid non existant pour la methode consulterService" );
            $this->assertEquals( "Aucun Services trouvé", $e->body()[ 0 ]->message, "Le message est mauvais en cas d'uuid non existant pour la methode consulterService" );
            $this->assertEquals( "Aucune donnée de type Services n'a pu être trouvée avec la référence $uuid_service_notexists", $e->body()[ 0 ]->detail, "Le detail est mauvais en cas d'uuid non existant pour la methode consulterService" );
        }
        $this->assertNull( $res, "L'API à retourné une reponse valide pour la methode consulterService alors que le mot de passe de connexion est incorrect" );

        // test avec un service qui exist
        $uuid_service_exists = '1c6a84a61b49cd1065eac656464bcbde';
        $Service             = $this->getApi()->consulterService( $uuid_service_exists );
        $this->assertEquals( $uuid_service_exists, $Service->uuid, "Le champ \"uuid\" n'est pas correctement récuperé" );
        $this->assertEquals( "Service des factures publiques", $Service->libelle, "Le champ \"libelle\" n'est pas correctement récuperé" );
        $this->assertEquals( "", $Service->description, "Le champ \"description\" n'est pas correctement récuperé" );
        $this->assertEquals( "FACTURES_PUBLIQUES", $Service->codeService, "Le champ \"codeService\" n'est pas correctement récuperé" );
        $this->assertEquals( "006accaa8785cd10dd5fc80e8bbb35f4", $Service->rattachementOrganisation, "Le champ \"rattachementOrganisation\" n'est pas correctement récuperé" );
        $this->assertNull( $Service->dateCreation, "Le champ \"dateCreation\" n'est pas correctement récuperé" );
        $this->assertEquals( "2022-01-17 07:56:00", $Service->dateDebutActivation->format( 'Y-m-d H:i:s' ), "Le champ \"dateDebutActivation\" n'est pas correctement récuperé" );
        $this->assertNull( $Service->dateFinActivation, "Le champ \"dateFinActivation\" n'est pas correctement récuperé" );
        $this->assertNull( $Service->dateModification, "Le champ \"dateModification\" n'est pas correctement récuperé" );
        $this->assertNull( $Service->dateSuppression, "Le champ \"dateSuppression\" n'est pas correctement récuperé" );
        $this->assertEquals( (string)ChorusPro\Type\ReferentielDesOrganisations\EtatService::ACTIF(), $Service->etatService, "Le champ \"etatService\" n'est pas correctement récuperé" );
        $this->assertEquals( "test street", $Service->adresse, "Le champ \"adresse\" n'est pas correctement récuperé" );
        $this->assertEquals( "", $Service->complementAdresse1, "Le champ \"complementAdresse1\" n'est pas correctement récuperé" );
        $this->assertEquals( "", $Service->complementAdresse2, "Le champ \"complementAdresse2\" n'est pas correctement récuperé" );
        $this->assertEquals( "99999", $Service->codePostal, "Le champ \"codePostal\" n'est pas correctement récuperé" );
        $this->assertEquals( "test city", $Service->ville, "Le champ \"ville\" n'est pas correctement récuperé" );
        $this->assertEquals( "France", $Service->pays, "Le champ \"pays\" n'est pas correctement récuperé" );
        $this->assertEquals( "", $Service->telephone, "Le champ \"telephone\" n'est pas correctement récuperé" );
        $this->assertFalse( $Service->numeroEj, "Le champ \"numeroEj\" n'est pas correctement récuperé" );
        $this->assertEquals( "2022-05-04 16:54:55", $Service->derniereMaj->format( 'Y-m-d H:i:s' ), "Le champ \"derniereMaj\" n'est pas correctement récuperé" );
    }

    /**
     * @throws \PisteGouvFr\PisteException
     * @throws \Exception
     */
    public function testRechercherServiceOrganisation(): void {
        $WsRetourRechercherStructures = $this->getApi()->rechercherServiceOrganisation(
            ( new ServiceRechercheRequete() )
                ->filtrerParRattachementOrganisation(
                    new RechercheFieldString( '=', '006accaa8785cd10dd5fc80e8bbb35f4' )
                )
                ->setFields( 'uuid' )
        );
        $this->assertNotCount( 0, $WsRetourRechercherStructures->values, "La recherche des services d'une organisation n'a pas retourné de resultat" );
    }
}