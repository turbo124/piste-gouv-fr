<?php

namespace PhpChorusPiste\Retour;


use PhpChorusPiste\PisteException;

class FieldDefinition {

    const TYPE_STRING          = 'string';
    const TYPE_STRING_DATETIME = 'string($date-time)';
    const TYPE_INT             = 'integer';
    const TYPE_INT_32BIT       = 'integer($int32)';
    const TYPE_INT_64BIT       = 'integer($int64)';
    const TYPE_NUMBER          = 'number';
    const TYPE_OBJECT          = 'object';
    const TYPE_OBJECT_ARRAY    = '[object]';
    const TYPE_BOOLEAN    = 'boolean';


    /** @var string */
    private $label;
    /** @var string */
    private $type;
    /** @var bool */
    private $requis;
    /** @var array */
    private $enumValues;
    /** @var string|null Nom de class pour les object imbriqué dans un retour */
    private $nomDeClasse;

    /**
     * @param string $label
     * @param string $type
     * @param array  $enumValues
     */
    public function __construct(string $label, string $type, bool $requis = false, array $enumValues = null, string $nomDeClasse = null) {
        $this->label       = $label;
        $this->type        = $type;
        $this->requis      = $requis;
        $this->enumValues  = $enumValues;
        $this->nomDeClasse = $nomDeClasse;
    }

    /**
     * @return string
     */
    public function label(): string {
        return $this->label;
    }


    /**
     * @throws \PhpChorusPiste\PisteException
     */
    public function castFromWsReturnArray(array $wsReturnArray) {
        if (!array_key_exists($this->label, $wsReturnArray)) {
            if (true === $this->requis) {
                throw new PisteException('Aucune valeur retournée pour le champ "'.$this->label.'". Celui-ci est requis.');
            }
            return null;
        }

        $value = $wsReturnArray[$this->label];

        switch ($this->type) {
            case static::TYPE_OBJECT :
                $value = new $this->nomDeClasse($value);
                break;
            case static::TYPE_OBJECT_ARRAY :
                $value_tmp = [];
                foreach ($value as $vs) {
                    $value_tmp[] = new $this->nomDeClasse($vs);
                }
                $value = $value_tmp;
                break;
            case static::TYPE_STRING :
                $value = (string)$value;
                break;
            case static::TYPE_INT:
            case static::TYPE_INT_32BIT:
            case static::TYPE_INT_64BIT:
                $value = (int)$value;
                break;
            case static::TYPE_NUMBER:
                $value = (float)$value;
                break;
            case static::TYPE_BOOLEAN:
                $value = (bool)$value;
                break;
            case static::TYPE_STRING_DATETIME:
                foreach ([
                             'Y-m-d\TH:i:s.vp',
                             'Y-m-d',
                         ] as $date_format_possible) {
                    $value_tmp = \DateTime::createFromFormat($date_format_possible, $value);
                    if ($value_tmp === false) {
                        continue;
                    }
                    if ($value_tmp->format($date_format_possible) !== $value) {
                        continue;
                    }
                    $value = $value_tmp;
                    break 2;
                }
                throw new PisteException('Aucun format de date compatible avec la valeur retournée dans le champ "'.$this->label.'".');
                break;
        }

        if (null !== $this->enumValues) {
            if (!in_array($value, $this->enumValues)) {
                throw new PisteException('Valeur retournée pour le champ "'.$this->label.'" non reconnue.');
            }
        }
        return $value;
    }

}
