<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property string codeDevise
 * @property string libelleDevise
 */
class RecupererDevisesOutput extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'codeDevise', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'libelleDevise', FieldDefinition::TYPE_STRING )
        );
    }
}


























































