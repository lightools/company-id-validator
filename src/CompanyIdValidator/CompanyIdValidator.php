<?php

namespace Lightools\CompanyIdValidator;

/**
 * Based on code by David Grudl
 * https://phpfashion.com/jak-overit-platne-ic-a-rodne-cislo
 *
 * @author Jan Nedbal
 */
class CompanyIdValidator {

    const ID_LENGTH = 8;

    /**
     * @var bool
     */
    private $padLeft;

    /**
     * @param bool $padLeftZeros Add missing leading zeroes automatically?
     */
    public function __construct($padLeftZeros = TRUE) {
        $this->padLeft = $padLeftZeros;
    }

    /**
     * @param string $id
     * @return bool
     */
    public function isValidId($id) {

        $id = preg_replace('~\s+~', '', $id);

        if ($this->padLeft) {
            $id = str_pad($id, self::ID_LENGTH, '0', STR_PAD_LEFT);
        }

        if (!preg_match('~^[0-9]{8}$~', $id)) {
            return FALSE;
        }

        $a = 0;
        for ($i = 0; $i < 7; $i++) {
            $a += $id[$i] * (8 - $i);
        }

        $a = $a % 11;

        if ($a === 0) {
            $c = 1;
        } elseif ($a === 10) {
            $c = 1;
        } elseif ($a === 1) {
            $c = 0;
        } else {
            $c = 11 - $a;
        }

        return (int) $id[7] === $c;
    }

}
