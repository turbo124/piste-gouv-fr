<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property int    idStructureCPP
 * @property string identifiant
 * @property string designationStructure
 */
class RecupererStructureOutput extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('idStructureCPP', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('identifiant', FieldDefinition::TYPE_STRING),
            new FieldDefinition('designationStructure', FieldDefinition::TYPE_STRING)
        );
    }
}


























































