<?php
declare(strict_types=1);

namespace PijaStoGioco\Domain\Brand\ValueObject;

use PijaStoGioco\Domain\InvalidArgumentException;
use function preg_match;

class PaymentGatewayId
{
    public CONST ID_REGEX_PATTERN = '@^\w{25}$@';

    public const INVALID_ID_ERROR_MESSAGE = 'Payment Gateway id is invalid';

    /**
     * @var string
     */
    private $value;

    /**
     * @throws InvalidArgumentException
     */
    public static function build(string $value): self
    {
        if (preg_match(self::ID_REGEX_PATTERN, $value) === 0) {
            throw new InvalidArgumentException(self::INVALID_ID_ERROR_MESSAGE);
        }

        $self = new self();
        $self->value = $value;

        return $self;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}