<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\StructureAAfficher[] listeServices
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\ParametresRetour     parametresRetour
 */
class WsRetourRechercherStructure extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('listeStructures', FieldDefinition::TYPE_OBJECT_ARRAY, true, null, StructureAAfficher::class),
            new FieldDefinition('parametresRetour', FieldDefinition::TYPE_OBJECT, true, null, ParametresRetour::class)
        );
    }
}


























































