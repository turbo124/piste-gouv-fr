<?php

namespace PhpChorusPiste\Retour;


/**
 * @property \PhpChorusPiste\Retour\RecupererStructuresPourUtilisateurOutput[] $listeStructures
 */
class WsRetourStructuresPourUtilisateur extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('listeStructures', FieldDefinition::TYPE_OBJECT_ARRAY, true, null, RecupererStructuresPourUtilisateurOutput::class)
        );
    }
}


























































