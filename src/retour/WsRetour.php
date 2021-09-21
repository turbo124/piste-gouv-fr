<?php

namespace PhpChorusPiste\Retour;


abstract class WsRetour {


    protected abstract static function getFieldDefinitions(): FieldDefinitionCollection;

    /**
     * @throws \PhpChorusPiste\PisteException
     */
    public final function __construct(array $wsReturnArray) {
        $Definitions_a = $this::getFieldDefinitions()
            ->FieldDefinitions_a();
        foreach ($Definitions_a as $Definitions) {
            $this->{$Definitions->label()} = $Definitions->castFromWsReturnArray($wsReturnArray);
        }
    }


}
