<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\ServiceExpose[]  listeServices
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\ParametresRetour parametresRetour
 */
class WsRetourRechercherServicesStructure extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('listeServices', FieldDefinition::TYPE_OBJECT_ARRAY, true, null, ServiceExpose::class),
            new FieldDefinition('parametresRetour', FieldDefinition::TYPE_OBJECT, true, null, ParametresRetour::class)
        );
    }
}


























































