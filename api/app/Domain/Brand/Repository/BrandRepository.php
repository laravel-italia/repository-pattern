<?php
declare(strict_types=1);

namespace PijaStoGioco\Domain\Brand\Repository;

use Illuminate\Support\Collection;
use PijaStoGioco\Domain\Brand\Model\Brand;
use PijaStoGioco\Domain\Brand\ValueObject\BrandId;
use PijaStoGioco\Domain\PersistenceException;

interface BrandRepository
{
    public const ADDING_BRAND_ERROR_MESSAGE = '';

    public const UPDATING_BRAND_ERROR_MESSAGE = '';

    public const REMOVING_BRAND_ERROR_MESSAGE = '';

    public const LOOKING_FOR_EXISTING_BRAND_ERROR_MESSAGE = '';

    public const GETTING_BRAND_ERROR_MESSAGE = '';

    public const LISTING_BRAND_ERROR_MESSAGE = '';

    /**
     * @throws PersistenceException
     */
    public function add(Brand $brand): void;

    /**
     * @throws PersistenceException
     */
    public function update(Brand $brand): void;

    /**
     * @throws PersistenceException
     */
    public function remove(BrandId $brandId): void;

    /**
     * @throws PersistenceException
     */
    public function exists(BrandId $brandId): bool;

    /**
     * @throws PersistenceException
     */
    public function get(BrandId $brandId): Brand;

    /**
     * @throws PersistenceException
     */
    public function list(int $number): Collection;
}