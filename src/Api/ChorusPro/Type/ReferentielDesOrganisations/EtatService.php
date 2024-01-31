<?php

namespace PisteGouvFr\Api\ChorusPro\Type\ReferentielDesOrganisations;


use PisteGouvFr\Api\ChorusPro\Type\Type;

/**
 * @method static Type ACTIF
 * @method static Type INACTIF
 * @method static Type SUPPRIME
 */
class EtatService extends Type {

    const ACTIF    = 'ACTIF';
    const INACTIF  = 'INACTIF';
    const SUPPRIME = 'SUPPRIME';

}
