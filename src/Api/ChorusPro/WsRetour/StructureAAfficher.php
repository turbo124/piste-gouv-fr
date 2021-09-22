<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


use PisteGouvFr\Api\ChorusPro\Type\IStatutStructure;
use PisteGouvFr\Api\ChorusPro\Type\ITypeIdentifiantStructure;

/**
 * @property int    idService
 * @property string codeService
 * @property string libelleService
 * @property string statutService
 * @property bool   estActif
 */
class StructureAAfficher extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('idStructureCPP', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('typeIdentifiantStructure', FieldDefinition::TYPE_STRING, false, [
                ITypeIdentifiantStructure::SIRET,
                ITypeIdentifiantStructure::UE_HORS_FRANCE,
                ITypeIdentifiantStructure::HORS_UE,
                ITypeIdentifiantStructure::RIDET,
                ITypeIdentifiantStructure::TAHITI,
                ITypeIdentifiantStructure::AUTRE,
                ITypeIdentifiantStructure::PARTICULIER,
            ]),
            new FieldDefinition('identifiantStructure', FieldDefinition::TYPE_STRING),
            new FieldDefinition('designationStructure', FieldDefinition::TYPE_STRING),
            new FieldDefinition('statut', FieldDefinition::TYPE_STRING, false, [
                IStatutStructure::ACTIVE,
                IStatutStructure::INACTIVE,
            ])
        );
    }
}


























































