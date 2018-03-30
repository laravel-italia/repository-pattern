<?php
declare(strict_types=1);

namespace PijaStoGioco\Domain\Brand\ValueObject;

use Exception;
use PijaStoGioco\Domain\InvalidArgumentException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class ProfilePictureId
{
    public const INVALID_ID_ERROR_MESSAGE = 'Profile picture id is invalid';

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

    public function __toString(): string
    {
        return $this->uuid->toString();
    }
}