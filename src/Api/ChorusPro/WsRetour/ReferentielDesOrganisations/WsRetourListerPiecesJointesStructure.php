<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations;


use PisteGouvFr\Api\ChorusPro\WsRetour\FieldDefinition;
use PisteGouvFr\Api\ChorusPro\WsRetour\FieldDefinitionCollection;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetour;

/**
 * @property PieceJointeStructure[] values
 */
class WsRetourListerPiecesJointesStructure extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( null, FieldDefinition::TYPE_OBJECT_ARRAY, true, null, PieceJointeStructure::class ),
        );
    }
}


























































