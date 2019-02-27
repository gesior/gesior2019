<?php

namespace App\Model;


class ValidatorResponse
{
    private $value = '';
    private $validationMessage = '';
    private $isValid = false;

    /**
     * ValidatorResponse constructor.
     * @param string $value
     * @param string $validationMessage
     * @param bool $isValid
     */
    public function __construct(string $value, string $validationMessage, bool $isValid)
    {
        $this->value = $value;
        $this->validationMessage = $validationMessage;
        $this->isValid = $isValid;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValidationMessage(): string
    {
        return $this->validationMessage;
    }

    /**
     * @param string $validationMessage
     */
    public function setValidationMessage(string $validationMessage): void
    {
        $this->validationMessage = $validationMessage;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * @param bool $isValid
     */
    public function setIsValid(bool $isValid): void
    {
        $this->isValid = $isValid;
    }

}
