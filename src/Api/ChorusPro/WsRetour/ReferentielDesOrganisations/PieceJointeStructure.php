<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations;


use PisteGouvFr\Api\ChorusPro\WsRetour\FieldDefinition;
use PisteGouvFr\Api\ChorusPro\WsRetour\FieldDefinitionCollection;
use PisteGouvFr\Api\ChorusPro\WsRetour\WsRetour;

/**
 * @property int         sizeBytes
 * @property string      fileName
 * @property string      uuid
 * @property string      contentType
 * @property string|null attachmentData
 */
class PieceJointeStructure extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'sizeBytes', FieldDefinition::TYPE_INT_64BIT, true ),
            new FieldDefinition( 'fileName', FieldDefinition::TYPE_STRING, true ),
            new FieldDefinition( 'uuid', FieldDefinition::TYPE_STRING, true ),
            new FieldDefinition( 'contentType', FieldDefinition::TYPE_STRING, true ),
            new FieldDefinition( 'attachmentData', FieldDefinition::TYPE_STRING )
        );
    }
}


























































