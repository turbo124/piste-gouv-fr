<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations;


use PisteGouvFr\Api\ChorusPro\Type\ReferentielDesOrganisations\EtatService;
use PisteGouvFr\Api\ChorusPro\WsRetour\FieldDefinition;
use PisteGouvFr\Api\ChorusPro\WsRetour\FieldDefinitionCollection;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetour;

/**
 * @property string    libelle                         libelle du service
 * @property string    description                     description du service
 * @property string    codeService                     id du service
 * @property string    rattachementOrganisation        organisation à laquelle est rattaché le service
 * @property \DateTime dateCreation                    date de creation
 * @property \DateTime dateDebutActivation             date de debut d'activation
 * @property \DateTime dateFinActivation               date de fin d'activation
 * @property \DateTime dateModification                date de modification
 * @property \DateTime dateSuppression                 date de suppression
 * @property string    etatService                     etat du service
 * @property string    adresse                         adresse
 * @property string    complementAdresse1              complement d'adresse
 * @property string    complementAdresse2              complement d'adresse
 * @property string    codePostal                      code postal
 * @property string    ville                           ville
 * @property string    pays                            pays
 * @property bool      numeroEj                        uniquement pour les structures publiques true : le numéro
 *           d'engagement juridique est obligatoire false : le numéro d'engagement juridique n'est pas obligatoire
 * @property \DateTime derniereMaj                     date de derniere mise à jour
 * @property string    uuid                            id unique du service
 */
class Service extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'libelle', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'description', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'codeService', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'rattachementOrganisation', FieldDefinition::TYPE_STRING ),
            // (format ISO 8601, ex 1978-05-10T06:06:06+00:00)
            new FieldDefinition( 'dateCreation', FieldDefinition::TYPE_STRING_DATETIME ),
            // (format ISO 8601, ex 1978-05-10T06:06:06+00:00)
            new FieldDefinition( 'dateDebutActivation', FieldDefinition::TYPE_STRING_DATETIME ),
            // (format ISO 8601, ex 1978-05-10T06:06:06+00:00)
            new FieldDefinition( 'dateFinActivation', FieldDefinition::TYPE_STRING_DATETIME ),
            // (format ISO 8601, ex 1978-05-10T06:06:06+00:00)
            new FieldDefinition( 'dateModification', FieldDefinition::TYPE_STRING_DATETIME ),
            // (format ISO 8601, ex 1978-05-10T06:06:06+00:00)
            new FieldDefinition( 'dateSuppression', FieldDefinition::TYPE_STRING_DATETIME ),
            new FieldDefinition( 'etatService', FieldDefinition::TYPE_STRING, false, EtatService::values() ),
            new FieldDefinition( 'adresse', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'complementAdresse1', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'complementAdresse2', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'codePostal', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'ville', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'pays', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'telephone', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'numeroEj', FieldDefinition::TYPE_BOOLEAN ),
            // (format ISO 8601, ex 1978-05-10T06:06:06+00:00)
            new FieldDefinition( 'derniereMaj', FieldDefinition::TYPE_STRING_DATETIME ),
            new FieldDefinition( 'uuid', FieldDefinition::TYPE_STRING ),
        );
    }
}


























































