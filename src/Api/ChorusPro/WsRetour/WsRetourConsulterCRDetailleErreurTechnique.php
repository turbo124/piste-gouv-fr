<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property string natureErreur
 * @property string codeErreur
 * @property string libelleErreur
 */
class WsRetourConsulterCRDetailleErreurTechnique extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('natureErreur', FieldDefinition::TYPE_STRING),
            new FieldDefinition('codeErreur', FieldDefinition::TYPE_STRING),
            new FieldDefinition('libelleErreur', FieldDefinition::TYPE_STRING)
        );
    }
}


























































