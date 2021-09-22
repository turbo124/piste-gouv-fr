<?php

namespace PisteGouvFr\Api\ChorusPro;

use PisteGouvFr\Api\ChorusPro;

/**
 * Class abstraite dont les classes d'API pour les API ChorusPro doivent hériter
 */
abstract class ChorusProApi {

    abstract public static function getBasePath():string;

    /**
     * @var \PisteGouvFr\Api\ChorusPro
     */
    protected $ChorusPro;

    public final function __construct(ChorusPro $ChorusPro) {
        $this->ChorusPro = $ChorusPro;
    }

}
