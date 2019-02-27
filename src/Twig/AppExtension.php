<?php

namespace App\Twig;

use App\Entity\Account;
use App\Entity\Player;
use App\Service\PlayerService;
use App\Service\TownService;
use App\Service\VocationService;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use Twig_Environment;

class AppExtension extends AbstractExtension
{
    private $playerService;
    private $townService;
    private $vocationService;
    private $templating;
    private $otsName;

    public function __construct(
        PlayerService $playerService,
        TownService $townService,
        VocationService $vocationService,
        Twig_Environment $templating,
        string $otsName
    ) {
        $this->playerService = $playerService;
        $this->townService = $townService;
        $this->vocationService = $vocationService;
        $this->templating = $templating;
        $this->otsName = $otsName;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('tooltip', [$this, 'generateTooltip']),
            new TwigFunction('isPlayerOnline', [$this, 'isPlayerOnline']),
        ];
    }

    public function getFilters()
    {
        return [
            new TwigFilter('playerOnlineStatus', [$this, 'playerOnlineStatus']),
            new TwigFilter('townName', [$this, 'townName']),
            new TwigFilter('vocationName', [$this, 'vocationName']),
            new TwigFilter('vocationShortName', [$this, 'vocationShortName']),
            new TwigFilter('accountQrCodeImage', [$this, 'accountQrCodeImage']),
        ];
    }

    public function generateTooltip(string $text)
    {
        return $this->templating->render('helpers/tooltip.html.twig', ['text' => $text]);
    }

    public function isPlayerOnline(Player $player)
    {
        return $this->playerService->isOnline($player);
    }

    public function playerOnlineStatus(Player $player)
    {
        return $this->isPlayerOnline($player) ? 'PLAYER.ONLINE' : 'PLAYER.OFFLINE';
    }

    public function townName(string $townId)
    {
        return $this->townService->getName($townId);
    }

    public function vocationName(string $vocationId)
    {
        return $this->vocationService->getName($vocationId);
    }

    public function vocationShortName(string $vocationId)
    {
        return $this->vocationService->getShortName($vocationId);
    }

    public function accountQrCodeImage(Account $account)
    {
        $urlFormat = 'otpauth://totp/%s:%s?secret=%s&issuer=%s';
        $url = sprintf($urlFormat, $this->otsName, $account->getName(), $account->getSecret(), $this->otsName);

        $qrCode = new QrCode($url);
        $qrCode->setErrorCorrectionLevel(new ErrorCorrectionLevel(ErrorCorrectionLevel::HIGH));
        $qrCode->setSize(400);

        return $qrCode->writeDataUri();
    }
}
