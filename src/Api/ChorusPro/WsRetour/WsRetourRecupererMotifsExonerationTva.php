<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\ListeMotifsExonerationTva[] listeMotifsExonerationTva
 * @property int                                                             nbResultatsParPage
 * @property int                                                             pageCourante
 * @property int                                                             pages
 * @property int                                                             total
 */
class WsRetourRecupererMotifsExonerationTva extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'listeMotifsExonerationTva', FieldDefinition::TYPE_OBJECT_ARRAY, true, null, ListeMotifsExonerationTva::class ),
            new FieldDefinition( 'nbResultatsParPage', FieldDefinition::TYPE_INT_64BIT, true ),
            new FieldDefinition( 'pageCourante', FieldDefinition::TYPE_INT_64BIT, true ),
            new FieldDefinition( 'pages', FieldDefinition::TYPE_INT_64BIT, true ),
            new FieldDefinition( 'total', FieldDefinition::TYPE_INT_64BIT, true ),
        );
    }
}


























































