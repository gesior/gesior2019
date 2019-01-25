<?php

namespace App\Service;

use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @property TranslatorInterface $translator
 */
trait TranslatorTrait
{
    /**
     * @param string $text
     * @param mixed $params
     * @return string
     */
    private function translate(string $text, $params = null)
    {
        if ($params === null) {
            return $this->translator->trans($text);
        } elseif (is_array($params)) {
            return $this->translator->trans($text, $params);
        } else {
            return $this->translator->trans($text, [$params]);
        }
    }

}