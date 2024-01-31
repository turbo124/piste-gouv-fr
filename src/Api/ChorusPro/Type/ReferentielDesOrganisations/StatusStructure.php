<?php

namespace PisteGouvFr\Api\ChorusPro\Type\ReferentielDesOrganisations;


use PisteGouvFr\Api\ChorusPro\Type\Type;

/**
 * @method static Type ACTIVE
 * @method static Type INACTIVE
 * @method static Type ACTIVATION_IN_PROGRESS
 */
class StatusStructure extends Type {

    const ACTIVE                 = 'active';
    const INACTIVE               = 'inactive';
    const ACTIVATION_IN_PROGRESS = 'activation in progress';

}
