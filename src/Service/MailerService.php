<?php

namespace App\Service;

use App\Entity\Account;
use Doctrine\ORM\EntityManagerInterface;
use LogicException;
use Swift_Mailer;
use Swift_Message;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig_Environment;

class MailerService
{
    use TranslatorTrait;

    const MAIL_TYPE_INFO = 1;
    const MAIL_TYPE_SECURITY = 2;

    private $entityManager;
    private $swiftMailer;
    private $templating;
    private $translator;
    private $requestStack;

    private $fromAddress;
    private $mailTitlePrefix;
    private $infoMailsPerMailPerHour;
    private $securityMailsPerMailPerHour;
    private $infoMailsPerIpPerHour;
    private $securityMailsPerIpPerHour;

    public function __construct(
        EntityManagerInterface $entityManager,
        Swift_Mailer $swiftMailer,
        Twig_Environment $templating,
        TranslatorInterface $translator,
        RequestStack $requestStack,
        string $fromAddress,
        string $mailTitlePrefix,
        $infoMailsPerMailPerHour,
        $securityMailsPerMailPerHour,
        $infoMailsPerIpPerHour,
        $securityMailsPerIpPerHour
    ) {
        $this->entityManager = $entityManager;
        $this->swiftMailer = $swiftMailer;
        $this->templating = $templating;
        $this->translator = $translator;
        $this->requestStack = $requestStack;

        $this->fromAddress = $fromAddress;
        $this->mailTitlePrefix = $mailTitlePrefix;
        $this->infoMailsPerMailPerHour = $infoMailsPerMailPerHour;
        $this->securityMailsPerMailPerHour = $securityMailsPerMailPerHour;
        $this->infoMailsPerIpPerHour = $infoMailsPerIpPerHour;
        $this->securityMailsPerIpPerHour = $securityMailsPerIpPerHour;
    }

    private function createMessage(Account $account, string $title, $type = self::MAIL_TYPE_INFO, $checkLimits = true)
    {
        $translatedTitle = $this->mailTitlePrefix . $this->translate($title);
        /* TODO: fix validators */
        if ($checkLimits) {
            if (!$account->getEmail()) {
                throw new LogicException($this->translator->trans(
                    'MAILER.MAIL_NOT_VERIFIED', ['%mail%' => $account->getEmail()]
                ));
            }

            $warningMessageData = [
                '%mail%' => $account->getEmail(),
                '%ip%' => $this->getIp(),
                '%title%' => $translatedTitle
            ];

            if ($type == self::MAIL_TYPE_INFO) {
                if ($this->getMailsCountInLastHourByIp() >= $this->infoMailsPerMailPerHour) {
                    throw new LogicException($this->translator->trans(
                        'MAILER.TOO_MANY_MAILS_PER_IP_PER_HOUR', $warningMessageData
                    ));
                }
                if ($this->getMailsCountInLastHourByMail($account->getEmail()) >= $this->infoMailsPerIpPerHour) {
                    throw new LogicException($this->translator->trans(
                        'MAILER.TOO_MANY_MAILS_PER_MAIL_PER_HOUR', $warningMessageData
                    ));
                }
            }

            if ($type == self::MAIL_TYPE_SECURITY) {
                if ($this->getMailsCountInLastHourByIp() >= $this->securityMailsPerMailPerHour) {
                    throw new LogicException($this->translator->trans(
                        'MAILER.TOO_MANY_MAILS_PER_IP_PER_HOUR', $warningMessageData
                    ));
                }
                if ($this->getMailsCountInLastHourByMail($account->getEmail()) >= $this->securityMailsPerIpPerHour) {
                    throw new LogicException($this->translator->trans(
                        'MAILER.TOO_MANY_MAILS_PER_MAIL_PER_HOUR', $warningMessageData
                    ));
                }
            }
        }

        $message = new Swift_Message();
        $message->setTo($account->getEmail());
        $message->setFrom($this->fromAddress);
        $message->setSubject($translatedTitle);

        return $message;
    }

    /**
     * @return int Count of mails sent to website user (by his IP) in last hour
     */
    private function getIp()
    {
        $request = $this->requestStack->getCurrentRequest();
        if (!$request) {
            return null;
        }

        return $request->getClientIp();
    }

    /**
     * @return int Count of mails sent to website user (by his IP) in last hour
     */
    private function getMailsCountInLastHourByIp()
    {
        $clientIp = $this->getIp();
        if ($clientIp === null) {
            return 0;
        }

        /** TODO: get from mails repository */
        return 1;
    }

    /**
     * @return int Count of mails sent to mail address in last hour
     */
    private function getMailsCountInLastHourByMail(string $emailAddress)
    {
        /** TODO: get from mails repository */
        return 1;
    }

    /**
     * @param Account $account
     * @param string $newPassword
     */
    public function sendChangePassword(Account $account, string $newPassword)
    {
        $message = $this->createMessage($account, 'MAILER.CHANGED_PASSWORD_TITLE', self::MAIL_TYPE_INFO);
        $message->setBody('test ' . $newPassword);

        if ($this->swiftMailer->send($message) == 0) {
            throw new LogicException($this->translator->trans('MAILER.FAILED_TO_SEND_EMAIL'));
        }
    }

    /**
     * @param Account $account
     */
    public function sendEnable2FA(Account $account)
    {
        $message = $this->createMessage($account, 'MAILER.ENABLE_2FA_TITLE', self::MAIL_TYPE_INFO);
        $message->setBody('test ' . $account->getSecret());

        // TODO: attach QR image
        if ($this->swiftMailer->send($message) == 0) {
            throw new LogicException($this->translator->trans('MAILER.FAILED_TO_SEND_EMAIL'));
        }
    }

    /**
     * @param Account $account
     */
    public function sendDisable2FA(Account $account)
    {
        $message = $this->createMessage($account, 'MAILER.DISABLE_2FA_TITLE', self::MAIL_TYPE_INFO);
        $message->setBody('test ' . $account->getSecret());

        if ($this->swiftMailer->send($message) == 0) {
            throw new LogicException($this->translator->trans('MAILER.FAILED_TO_SEND_EMAIL'));
        }
    }

}
