<?php

namespace PisteGouvFr\Api\ChorusPro;


/**
 * Class d'erreur en cas d'erreur HTTP lors des appels à l'api chorus pro
 */
class HttpResponseError extends \Exception {

    private array|\stdClass $_body;

    public function __construct( string $message = "", int $code = 0, ?\Throwable $previous = null, string $body_data = null ) {
        parent::__construct( $message, $code, $previous );
        $this->_body = ( $body_data ? json_decode( $body_data ) : null ) ?? new \stdClass();
    }

    public function body(): array|\stdClass {
        return $this->_body;
    }


}
