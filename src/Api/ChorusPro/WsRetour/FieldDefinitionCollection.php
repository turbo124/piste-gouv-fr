<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


class FieldDefinitionCollection {

    protected array $FieldDefinition_a;

    public function __construct(FieldDefinition ...$FieldDefinitions) {
        $this->FieldDefinition_a = $FieldDefinitions;
    }

    /**
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\FieldDefinition[]
     */
    public function FieldDefinitions_a(): array {
        return $this->FieldDefinition_a;
    }

}
