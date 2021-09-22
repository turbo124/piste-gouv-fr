<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property int    idService
 * @property string codeService
 * @property string libelleService
 * @property string statutService
 * @property bool   estActif
 */
class ServiceExpose extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('idService', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('codeService', FieldDefinition::TYPE_STRING),
            new FieldDefinition('libelleService', FieldDefinition::TYPE_STRING),
            new FieldDefinition('statutService', FieldDefinition::TYPE_STRING),
            new FieldDefinition('estActif', FieldDefinition::TYPE_BOOLEAN)
        );
    }
}


























































