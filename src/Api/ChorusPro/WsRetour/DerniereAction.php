<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


use PisteGouvFr\Api\ChorusPro\Type\IDerniereActionCode;

/**
 * @property int       derniereActionId
 * @property string    derniereActionCode
 */
class DerniereAction extends WsRetour {

    /** @noinspection PhpClassConstantAccessedViaChildClassInspection */
    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('derniereActionId', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('derniereActionCode', FieldDefinition::TYPE_STRING, false, [
                IDerniereActionCode::TELECHARGEMENT_FACTURE,
                IDerniereActionCode::ACQUITTEMENT_REJET,
                IDerniereActionCode::ACQUITTEMENT_SUSPENSION,
                IDerniereActionCode::TRAITEMENT_REJET,
            ])
        );
    }
}


























































