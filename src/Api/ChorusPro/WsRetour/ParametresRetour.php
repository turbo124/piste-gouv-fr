<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property int pageCourante
 * @property int pages
 * @property int nbResultatsParPage
 * @property int total
 */
class ParametresRetour extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('pageCourante', FieldDefinition::TYPE_INT_32BIT),
            new FieldDefinition('pages', FieldDefinition::TYPE_INT_32BIT),
            new FieldDefinition('nbResultatsParPage', FieldDefinition::TYPE_INT_32BIT),
            new FieldDefinition('total', FieldDefinition::TYPE_INT_32BIT)
        );
    }
}


























































