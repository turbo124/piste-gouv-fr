<?php

namespace PhpChorusPiste\Retour;


/**
 * @property string identifiantFournisseur
 * @property string identifiantDestinataire
 * @property string numeroDP
 * @property string libelleErreurDP
 */
class WsRetourConsulterCRDetailleErreurDP extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('identifiantFournisseur', FieldDefinition::TYPE_STRING),
            new FieldDefinition('identifiantDestinataire', FieldDefinition::TYPE_STRING),
            new FieldDefinition('numeroDP', FieldDefinition::TYPE_STRING),
            new FieldDefinition('libelleErreurDP', FieldDefinition::TYPE_STRING)
        );
    }
}


























































