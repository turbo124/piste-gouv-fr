<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property string codeMotifExonerationTva
 * @property string libelleMotifExonerationTva
 */
class ListeMotifsExonerationTva extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'codeMotifExonerationTva', FieldDefinition::TYPE_STRING, true ),
            new FieldDefinition( 'libelleMotifExonerationTva', FieldDefinition::TYPE_STRING, true ),
        );
    }
}


























































