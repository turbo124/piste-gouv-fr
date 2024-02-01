<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations;


use PisteGouvFr\Api\ChorusPro\Type\ReferentielDesOrganisations\StatusStructure;
use PisteGouvFr\Api\ChorusPro\Type\ReferentielDesOrganisations\TypeOrganisation;
use PisteGouvFr\Api\ChorusPro\WsRetour\FieldDefinition;
use PisteGouvFr\Api\ChorusPro\WsRetour\FieldDefinitionCollection;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetour;

/**
 * @property string    libelleOrganisation                                  libellé de l'organisation
 * @property string    numeroTvaIntracommunautaire                          numero de TVA Intracommunautaire
 * @property string    typeOrganisation                                     type d'organisation
 * @property string    contactPrincipal                                     contact principal
 * @property string    organisationParent                                   organisation rattachée à la structure
 * @property bool      estCentreGestionAgricole                             est un centre de gestion agricole
 * @property bool      gestionNumeroEJOuCodeService                         le numéro d'engagement ou le code service
 *           doit être renseigné par le fournisseur
 * @property int       numeroPacage                                         numero du paquet
 * @property string    status                                               statut de la structure
 * @property string    identifiant                                          identifiant de la structure
 * @property string    typeIdentifiant                                      type d'identifiant de la structure
 * @property string    categorieFournisseurMemoireId                        categorie du fournisseur memoire
 * @property string    categorieBeneficiaireId                              categorie du beneficiaire
 * @property string    adresse                                              adresse
 * @property string    complementAdresse1                                   complement d'adresse
 * @property string    complementAdresse2                                   complement d'adresse
 * @property string    codePostal                                           code postal
 * @property string    ville                                                ville
 * @property string    pays                                                 pays
 * @property string    adresseElectronique                                  email
 * @property string    telephone                                            telephone
 * @property bool      recevoirCyclesViesEdi                                recevoir les cycles de vies Edi
 * @property bool      emetteurFluxEdi                                      emettre des flux Edi
 * @property bool      nonDiffusibleInsee                                   Insee diffusable
 * @property \DateTime derniereMaj                                          date de derniere mise a jour
 * @property string    uuid                                                 id unique de la structure
 * @property string    nomStructure                                         nom
 * @property string    prenomStructure                                      prenom
 * @property string    numeroRcsStructure                                   identifiant fiscal RCS de la structure
 * @property bool      numeroEjDoitEtreRenseigne                            indique s'il est obligatoire de renseigner
 *           le N° d'engagement dans les factures simples et les factures de travaux
 * @property bool      codeServiceDoitEtreRenseigne                         indique s'il est obligatoire de renseigner
 *           le code service dans les factures simples et les factures de travaux
 * @property bool      statutMiseEnPaiementNestPasRemonte                   indique si le statut de mise en paiement
 *           est remonté dans les factures simples et les factures de travaux
 * @property bool      avecMOA                                              permet de définir si pour cette structure
 *           publique, un acteur MOA intervient dans le circuit des factures de travaux
 * @property bool      estMOAUniquement                                     permet de définir si pour cette structure
 *           publique, un acteur MOA intervient systématiquement dans le circuit des factures de travaux
 * @property bool      structureOrigine                                     identifiant fonctionnel de la
 *           structure d'origine
 * @property string    raisonSociale                                        raison sociale
 * @property string    categorieJuridique                                   catégorie juridique
 * @property string    categorieEntreprise                                  catégorie d'entreprise
 */
class Structure extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'libelleOrganisation', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'numeroTvaIntracommunautaire', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'typeOrganisation', FieldDefinition::TYPE_STRING, false, TypeOrganisation::values() ),
            new FieldDefinition( 'contactPrincipal', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'organisationParent', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'estCentreGestionAgricole', FieldDefinition::TYPE_BOOLEAN ),
            new FieldDefinition( 'gestionNumeroEJOuCodeService', FieldDefinition::TYPE_BOOLEAN ),
            new FieldDefinition( 'numeroPacage', FieldDefinition::TYPE_INT_32BIT ),
            new FieldDefinition( 'status', FieldDefinition::TYPE_STRING, false, StatusStructure::values() ),
            new FieldDefinition( 'identifiant', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'typeIdentifiant', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'categorieFournisseurMemoireId', FieldDefinition::TYPE_INT_32BIT ),
            new FieldDefinition( 'categorieBeneficiaireId', FieldDefinition::TYPE_INT_32BIT ),
            new FieldDefinition( 'adresse', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'complementAdresse1', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'complementAdresse2', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'codePostal', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'ville', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'pays', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'adresseElectronique', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'telephone', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'recevoirCyclesViesEdi', FieldDefinition::TYPE_BOOLEAN ),
            new FieldDefinition( 'emetteurFluxEdi', FieldDefinition::TYPE_BOOLEAN ),
            new FieldDefinition( 'nonDiffusibleInsee', FieldDefinition::TYPE_BOOLEAN ),
            // date de derniere mise a jour( format ISO 8601, ex 1978 - 05 - 10T06:06:06 + 00:00)
            new FieldDefinition( 'derniereMaj', FieldDefinition::TYPE_STRING_DATETIME ),
            new FieldDefinition( 'uuid', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'nomStructure', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'prenomStructure', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'numeroRcsStructure', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'numeroEjDoitEtreRenseigne', FieldDefinition::TYPE_BOOLEAN ),
            new FieldDefinition( 'codeServiceDoitEtreRenseigne', FieldDefinition::TYPE_BOOLEAN ),
            new FieldDefinition( 'statutMiseEnPaiementNestPasRemonte', FieldDefinition::TYPE_BOOLEAN ),
            new FieldDefinition( 'avecMOA', FieldDefinition::TYPE_BOOLEAN ),
            new FieldDefinition( 'estMOAUniquement', FieldDefinition::TYPE_BOOLEAN ),
            new FieldDefinition( 'structureOrigine', FieldDefinition::TYPE_INT_32BIT ),
            new FieldDefinition( 'raisonSociale', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'categorieJuridique', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'categorieEntreprise', FieldDefinition::TYPE_STRING ),
        );
    }
}



















































