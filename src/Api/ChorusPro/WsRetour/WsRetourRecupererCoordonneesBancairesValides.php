<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property int                                                                              pageCourante
 * @property int                                                                              pages
 * @property int                                                                              nbResultatsParPage
 * @property int                                                                              total
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\RecupererCoordonneesBancairesValidesOutput[] listeCoordonneeBancaire
 */
class WsRetourRecupererCoordonneesBancairesValides extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('pageCourante', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('pages', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('nbResultatsParPage', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('total', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('listeCoordonneeBancaire', FieldDefinition::TYPE_OBJECT_ARRAY, true, null, RecupererCoordonneesBancairesValidesOutput::class)
        );
    }
}


























































