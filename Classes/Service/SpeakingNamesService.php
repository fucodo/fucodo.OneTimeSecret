<?php

declare(strict_types=1);

namespace fucodo\OneTimeSecret\Service;

class SpeakingNamesService
{
    protected const VOWELS = ['a',
        'e',
        'i',
        'o',
        'u'];

    protected const CONSONANTS = [
        'b',
        'c',
        'd',
        'f',
        'g',
        'h',
        'j',
        'k',
        'l',
        'm',
        'n',
        'p',
        'r',
        's',
        't',
        'v',
        'w',
        'x',
        'y',
        'z'
    ];
    public static function getName($wordCount = 2, $length = 6)
    {
        $string = '';
        for ($o = 1; $o <= $wordCount; $o++)
        {
            $word = '';
            for ($i = 1; $i <= $length; $i++)
            {
                $word .= static::CONSONANTS[random_int(0,19)];
                $word .= static::VOWELS[random_int(0,4)];
            }
            $string .= mb_substr($word, 0, $length);
            $string .= "-";
        }
        return mb_substr($string, 0, -1);
    }
}
