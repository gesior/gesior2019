<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Twig_Environment;

class AppExtension extends AbstractExtension
{
    private $templating;

    public function __construct(Twig_Environment $templating)
    {
        $this->templating = $templating;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('tooltip', [$this, 'generateTooltip']),
        ];
    }

    public function generateTooltip(string $text)
    {
        return $this->templating->render('helpers/tooltip.html.twig', ['text' => $text]);
    }
}