<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property int    idStructure
 * @property string identifiantStructure
 * @property string designationStructure
 * @property string typeIdentifiantStructure
 */
class RecupererStructuresPourUtilisateurOutput extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('idStructure', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('identifiantStructure', FieldDefinition::TYPE_STRING),
            new FieldDefinition('designationStructure', FieldDefinition::TYPE_STRING),
            new FieldDefinition('typeIdentifiantStructure', FieldDefinition::TYPE_STRING, false, [
                'SIRET',
                'UE_HORS_FRANCE',
                'HORS_UE',
                'RIDET',
                'TAHITI',
                'AUTRE',
                'PARTICULIER',
            ])
        );
    }
}


























































