<?php
declare(strict_types=1);

namespace PijaStoGioco\Domain\Brand\ValueObject;

use PijaStoGioco\Domain\InvalidArgumentException;
use function filter_var;

class Email
{
    public const INVALID_EMAIL_ERROR_MESSAGE = 'Brand email MUST be a valid email address';

    /**
     * @var string
     */
    private $value;

    /**
     * @throws InvalidArgumentException
     */
    public function __construct(string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(self::INVALID_EMAIL_ERROR_MESSAGE);
        }
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }
}