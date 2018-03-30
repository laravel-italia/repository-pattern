<?php
declare(strict_types=1);

namespace PijaStoGioco\Service;

use PijaStoGioco\Domain\PersistenceException;

class RandomThrowPersistenceException
{
    /**
     * @var int|null
     */
    private $failOnceEvery;

    public function __construct(?int $failOnceEvery)
    {
        // This number will be used for throw a random persistence exception
        // If null the exception won't be thrown
        // Otherwise the exception will be thrown: once every $failOnceEvery times
        $this->failOnceEvery = $failOnceEvery;
    }

    /**
     * @throws PersistenceException
     */
    public function __invoke(string $errorMessage): void
    {
        if ($this->failOnceEvery === null) {
            return;
        }

        if ($this->failOnceEvery === random_int(1, $this->failOnceEvery)) {
            throw new PersistenceException($errorMessage);
        }
    }
}