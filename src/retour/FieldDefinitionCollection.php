<?php

namespace PhpChorusPiste\Retour;


class FieldDefinitionCollection {

    protected $FieldDefinition_a;

    public function __construct(FieldDefinition ...$FieldDefinitions) {
        $this->FieldDefinition_a = $FieldDefinitions;
    }

    /**
     * @return \PhpChorusPiste\Retour\FieldDefinition[]
     */
    public function FieldDefinitions_a(): array {
        return $this->FieldDefinition_a;
    }

}
