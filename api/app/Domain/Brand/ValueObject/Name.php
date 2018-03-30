<?php
declare(strict_types=1);

namespace PijaStoGioco\Domain\Brand\ValueObject;

use PijaStoGioco\Domain\InvalidArgumentException;
use function strlen;
use function trim;

class Name
{
    public const NAME_INVALID_LENGTH_ERROR_MESSAGE = 'Brand name MUST be length between 1 and 100 chars';

    /**
     * @var string
     */
    private $value;

    /**
     * @throws InvalidArgumentException
     */
    public function __construct(string $value)
    {
        $value = trim($value);
        $length = strlen($value);

        if ($length === 0 || $length > 100) {
            throw new InvalidArgumentException(self::NAME_INVALID_LENGTH_ERROR_MESSAGE);
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}