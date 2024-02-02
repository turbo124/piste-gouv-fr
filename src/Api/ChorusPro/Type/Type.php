<?php


namespace PisteGouvFr\Api\ChorusPro\Type;


abstract class Type implements \JsonSerializable {

    private string $_type;

    private final function __construct( string $type ) {
        $this->_type = $type;
    }

    public function jsonSerialize(): mixed {
        return $this->_type;
    }

    public function __toString(): string {
        return $this->_type;
    }

    /**
     * @throws \PisteGouvFr\Api\ChorusPro\Type\TypeException
     */
    public final static function __callStatic( string $name, array $arguments ): Type {
        $oClass  = new \ReflectionClass( static::class );
        $const_a = $oClass->getConstants();
        if ( array_key_exists( $name, $const_a ) ) {
            return new static( $const_a[ $name ] );
        }

        throw new TypeException( 'Type "' . $name . '" unkown for class : ' . static::class );
    }


    public final static function values(): array {
        return array_values( ( new \ReflectionClass( static::class ) )->getConstants() );
    }

}
