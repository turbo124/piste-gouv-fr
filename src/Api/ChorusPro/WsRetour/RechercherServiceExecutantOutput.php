<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property int    idServicesCPP
 * @property string codeServiceExecutant
 * @property string nomServiceExecutant
 */
class RechercherServiceExecutantOutput extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('idServicesCPP', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('codeServiceExecutant', FieldDefinition::TYPE_STRING),
            new FieldDefinition('nomServiceExecutant', FieldDefinition::TYPE_STRING)
        );
    }
}


























































