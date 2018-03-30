<?php
declare(strict_types=1);

namespace PijaStoGioco\Domain\Brand\ValueObject;

use PijaStoGioco\Domain\InvalidArgumentException;
use function strlen;

class Password
{
    public const PASSWORD_INVALID_LENGTH_ERROR_MESSAGE = 'Brand password MUST be length at least 10 chars';

    /**
     * @var string
     */
    private $value;

    /**
     * @throws InvalidArgumentException
     */
    public static function fromPlainPassword(string $value): self
    {
        if (strlen($value) <= 10) {
            throw new InvalidArgumentException(self::PASSWORD_INVALID_LENGTH_ERROR_MESSAGE);
        }

        $self = new self();
        $self->value = password_hash($value, PASSWORD_ARGON2I);

        return $self;
    }

    public static function fromHashedPassword(string $value): self
    {
        $self = new self();
        $self->value = $value;

        return $self;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}