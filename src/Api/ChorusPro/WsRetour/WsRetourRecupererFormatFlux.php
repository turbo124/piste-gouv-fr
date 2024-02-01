<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\ListeFormatFlux[] listeFormatFlux
 * @property int                                                   nbResultatsParPage
 * @property int                                                   pageCourante
 * @property int                                                   pages
 * @property int                                                   total
 */
class WsRetourRecupererFormatFlux extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'listeFormatFlux', FieldDefinition::TYPE_OBJECT_ARRAY, true, null, ListeFormatFlux::class ),
            new FieldDefinition( 'nbResultatsParPage', FieldDefinition::TYPE_INT_64BIT, true ),
            new FieldDefinition( 'pageCourante', FieldDefinition::TYPE_INT_64BIT, true ),
            new FieldDefinition( 'pages', FieldDefinition::TYPE_INT_64BIT, true ),
            new FieldDefinition( 'total', FieldDefinition::TYPE_INT_64BIT, true ),
        );
    }
}


























































