<?php
declare(strict_types=1);

namespace PijaStoGioco\Domain\Brand\ValueObject;

use Exception;
use PijaStoGioco\Domain\InvalidArgumentException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class BrandId
{
    public const INVALID_ID_ERROR_MESSAGE = 'Brand id is invalid';

    /**
     * @var UuidInterface
     */
    private $uuid;

    private function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function build(string $value): self
    {
        try {
            return new self(Uuid::fromString($value));
        } catch (Exception $e) {
            throw new InvalidArgumentException(self::INVALID_ID_ERROR_MESSAGE, $e->getCode(), $e);
        }
    }

    public static function generate(): self
    {
        return new self(Uuid::uuid4());
    }

    public function __toString(): string
    {
        return $this->uuid->toString();
    }
}