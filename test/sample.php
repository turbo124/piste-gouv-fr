<?php
error_reporting(E_ALL|E_WARNING);

use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourDeposerPdfFacture;

include(dirname(__DIR__).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

define('CLIENT_ID', "b2ebd80e-0dc7-46c5-bf23-d531e5411d6c");
define('CLIENT_SECRET', "b2486e42-3a0a-4dbd-88e1-79af2d90eb3e");
define('TECH_ACCOUNT_LOGIN', "TECH_000000000415049@cpp2017.fr");
define('TECH_ACCOUNT_PASSWORD', "H9-{7&:k|cOE|+;N");
define('CHORUSPRO_IDENTIFIANT_STRUCTURE', "00000000415049"); // Compte > Modification de la structure > Identifiant*
define('CHORUSPRO_IBAN_LABEL', "IBAN SANDBOX"); // Compte > Modification de la structure > Identifiant*
define('CHORUSPRO_CODESERVICE_FOURNISSEUR', "SERVICE_FOURNISSEUR26370408"); // Compte > Modification de la structure > Identifiant*
// Base 64 login:password = VEVDSF8wMDAwMDAwMDA0MTUwNDlAY3BwMjAxNy5mcjpIOS17NyY6a3xjT0V8KztO

//$flux = $ChorusPro->deposerFlux(__DIR__.DIRECTORY_SEPARATOR.'incoice1.pdf');

function deposerFactureEtSoumettre() {
    $codeDestinataire     = '11000201100044'; // SIRET
    $codeServiceExecutant = 'SFACETAT'; // Code du Service

    $codeDestinataire     = '00000000415073'; // SIRET
    $codeServiceExecutant = 'SERVICE_DESTINATAIRE26370408'; // Code du Service


    $deviseFacture = 'EUR';
    $numeroFacture = 'FR-001'.mt_rand(0, 10000);

    $ChorusPro = new \PisteGouvFr\Api\ChorusPro(CLIENT_ID, CLIENT_SECRET, TECH_ACCOUNT_LOGIN, TECH_ACCOUNT_PASSWORD, true);
//    die();
    $Transverses = new \PisteGouvFr\Api\ChorusPro\Transverses($ChorusPro);
    $Structures  = new \PisteGouvFr\Api\ChorusPro\Structures($ChorusPro);
    $Factures    = new \PisteGouvFr\Api\ChorusPro\Factures($ChorusPro);

    $recupererStructureResult = $Transverses->recupererStructuresPourUtilisateur();

    if (empty($recupererStructureResult->listeStructures)) {
        throw new Exception('Pas de structures accessible');
    }
    $idStructure = null;

    foreach ($recupererStructureResult->listeStructures as $Structure) {
        if ($Structure->identifiantStructure === CHORUSPRO_IDENTIFIANT_STRUCTURE) {
            $idStructure = $Structure->idStructure;
        }
    }


    if (null === $idStructure) {
        throw new Exception('La structure '.CHORUSPRO_IDENTIFIANT_STRUCTURE.' n\'a pas été trouvé');
    }


    $recupererCoordonneesBancairesValidesResult = $Transverses->recupererCoordonneesBancairesValides($idStructure);
    if (empty($recupererCoordonneesBancairesValidesResult->listeCoordonneeBancaire)) {
        throw new Exception('Pas de coordonnée bancaire pour attacher la facture.');
    }

    //    var_dump($recupererCoordonneesBancairesValidesResult);
    //    die();

    $idCoordonneeBancaire = null;
    foreach ($recupererCoordonneesBancairesValidesResult->listeCoordonneeBancaire as $CoordonneeBancaire) {
        if ($CoordonneeBancaire->nomCoordonneeBancaire === CHORUSPRO_IBAN_LABEL) {
            $idCoordonneeBancaire = $CoordonneeBancaire->idCoordonneeBancaire;
        }
    }

    if (null === $idCoordonneeBancaire) {
        throw new Exception('La coordonnee bancaire '.CHORUSPRO_IBAN_LABEL.' n\'a pas été trouvé');
    }

    $codeCoordonneesBancairesFournisseur = $idCoordonneeBancaire;

    $recupererStructuresActivesPourFournisseurResult = $Transverses->recupererStructuresActivesPourFournisseur();
    if (empty($recupererStructuresActivesPourFournisseurResult->listeStructures)) {
        throw new Exception('Pas de de structure selectionnable en tant que fournisseur.');
    }
    $idFournisseur = null;
    foreach ($recupererStructuresActivesPourFournisseurResult->listeStructures as $Structure) {
        if ($Structure->idStructureCPP === $idStructure) {
            $idFournisseur = $idStructure;
        }
    }

    if (null === $idFournisseur) {
        throw new Exception('La structure ne peut pas être fournisseur.');
    }

    $rechercherServicesStructureResult = $Structures->rechercherServicesStructure($idStructure);
    if (empty($rechercherServicesStructureResult->listeServices)) {
        throw new Exception('Pas de de service dans la structure.');
    }
    $idService = null;
    foreach ($rechercherServicesStructureResult->listeServices as $Service) {
        if ($Service->codeService === CHORUSPRO_CODESERVICE_FOURNISSEUR) {
            $idService = $Service->idService;
        }
    }

    if (null === $idService) {
        throw new Exception('Le service '.CHORUSPRO_CODESERVICE_FOURNISSEUR.' n\'a pas été trouvé');
    }
    $idServiceFournisseur = $idService;

    $deposerPDFFactureResult = $Factures->deposerPDFFacture(__DIR__.DIRECTORY_SEPARATOR.'incoice1.pdf');
    //    var_dump($deposerPDFFactureResult->numeroFacture);
    //    var_dump($deposerPDFFactureResult);
    //    $codeRetour        = $deposerPDFFactureResult->codeRetour;
    //    $libelle           = $deposerPDFFactureResult->libelle;
    //    $numeroFacture     = $deposerPDFFactureResult->numeroFacture;
    $dateFacture = $deposerPDFFactureResult->dateFacture->format('Y-m-d');
    //    $codeDeviseFacture = $deposerPDFFactureResult->codeDeviseFacture;
    //    $typeFacture       = $deposerPDFFactureResult->typeFacture;
    //    $typeTva           = $deposerPDFFactureResult->typeTva;
    //    $numeroBonCommande = $deposerPDFFactureResult->numeroBonCommande;
    $numeroBonCommande = null;
    //    $montantHtTotal    = $deposerPDFFactureResult->montantHtTotal;
    //    $montantTVA        = $deposerPDFFactureResult->montantTVA;
    $pieceJointeId = $deposerPDFFactureResult->pieceJointeId;
    try {
        /** @var WsRetourDeposerPdfFacture $soumettreFactureResult */
        $soumettreFactureResult = $Factures->soumettreFacture(0,
                                                              $numeroFacture,
                                                              \PisteGouvFr\Api\ChorusPro\Type\IModeDepot::DEPOT_PDF_API,
                                                              $dateFacture,
                                                              new \PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureDestinataire($codeDestinataire, $codeServiceExecutant),
                                                              new \PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureFournisseur($idFournisseur, $idServiceFournisseur, $codeCoordonneesBancairesFournisseur),
                                                              new \PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureCadreDeFacturation(\PisteGouvFr\Api\ChorusPro\Type\ICodeCadreFacturation::A1_FACTURE_FOURNISSEUR),
                                                              new \PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureReferences($deviseFacture, \PisteGouvFr\Api\ChorusPro\Type\ITypeFacture::FACTURE, \PisteGouvFr\Api\ChorusPro\Type\ITypeTva::TVA_SUR_ENCAISSEMENT, null, '', $numeroBonCommande, $numeroFacture, \PisteGouvFr\Api\ChorusPro\Type\IModePaiement::VIREMENT),
                                                              new \PisteGouvFr\Api\ChorusPro\Parameter\Collection\LignePosteSoumettreInputCollection(new \PisteGouvFr\Api\ChorusPro\Parameter\LignePosteSoumettreInput(1, '1', '10Heures', 1, 'Lot', 50, null, null, 20)),
                                                              new \PisteGouvFr\Api\ChorusPro\Parameter\Collection\LigneTvaSoumettreInputCollection(new \PisteGouvFr\Api\ChorusPro\Parameter\LigneTvaSoumettreInput(null, 41.67, 8.33, 20)),
                                                              new \PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFactureMontantTotal(41.67, 8.33, 50, null, null, 50),
                                                              new \PisteGouvFr\Api\ChorusPro\Parameter\Collection\SoumettreFacturePieceJointePrincipaleCollection(new \PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFacturePieceJointePrincipale('Facture', $pieceJointeId)),
                                                              new \PisteGouvFr\Api\ChorusPro\Parameter\Collection\PieceJointeComplentaireSoumettreInputCollection(),
                                                              'Post Automatique de Facture'


        );
        var_dump($soumettreFactureResult);
    }
    catch (\PisteGouvFr\PisteException $CPE) {
        throw $CPE;
        $Transverses->detacherPieceJointe($pieceJointeId);
    }
}


deposerFactureEtSoumettre();

