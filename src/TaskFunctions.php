<?php

/**
 * https://www.codewars.com/kata/563b662a59afc2b5120000c6/train/php
 *
 * @param integer $p0
 * @param float $percent
 * @param integer $aug
 * @param integer $p
 * @return integer
 */
function nb_year(int $p0, float $percent, int $aug, int $p): int
{
    if ($p0 < 0) {
        throw new InvalidArgumentException('The population can not be negative.');
    }

    if ($percent <= 0) {
        throw new InvalidArgumentException('The percent must be greater than zero.');
    }

    $pf = $percent / 100;

    $years = 0;
    $curP = $p0;
    while ($curP < $p) {
        $curP += (int) ($curP * $pf + $aug);
        $years++;
    }

    return $years;
}

/**
 * https://www.codewars.com/kata/52774a314c2333f0a7000688/train/javascript
 *
 * @param string $string
 * @return boolean
 */
function validate_parentheses(string $string): bool
{
    $length = mb_strlen($string);
    if (0 === $length) {
        return false;
    }

    $parenthese = $string[0];
    if ('(' !== $parenthese) {
        return false;
    }

    $position = 1;
    $marker = 1;
    do {
        $parenthese = $string[$position];
        switch ($parenthese) {
            case '(':
                $marker++;
                break;
            case ')':
                $marker--;
                break;
            default:
                return false;
        }

        $position++;
    } while ($position < $length);

    return 0 === $marker;
}

/**
 * https://www.codewars.com/kata/5277c8a221e209d3f6000b56/train/php
 *
 * @param string $string
 * @return boolean
 */
function validate_brackets(string $string): bool
{
    $length = mb_strlen($string);
    if (0 === $length) {
        return false;
    }

    $allowedChars = [
        '(' => true,
        ')' => true,
        '{' => true,
        '}' => true,
        '[' => true,
        ']' => true
    ];

    $brackets = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];

    $queue = [];
    $number = 0;
    for ($i = 0; $i < $length; $i++) {
        $bracket = $string[$i];
        $isAllowedChar = array_key_exists($bracket, $allowedChars);
        if (!$isAllowedChar) {
            return false;
        }

        $isClosingBracket = array_key_exists($bracket, $brackets);
        if (!$isClosingBracket) {
            $queue[] = $bracket;
            $number++;

            continue;
        }

        if (0 === $number) {
            return false;
        }

        $mustBeOpened = $brackets[$bracket];
        $lastOpened = array_pop($queue);
        if ($mustBeOpened !== $lastOpened) {
            return false;
        } else {
            $number--;
        }
    }

    return 0 === count($queue);
}
