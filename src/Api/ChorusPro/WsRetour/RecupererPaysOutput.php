<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property string codePays
 * @property string libellePays
 */
class RecupererPaysOutput extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'codePays', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'libellePays', FieldDefinition::TYPE_STRING )
        );
    }
}


























































