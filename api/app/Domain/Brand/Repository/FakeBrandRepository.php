<?php
declare(strict_types=1);

namespace PijaStoGioco\Domain\Brand\Repository;

use Faker\Generator;
use Illuminate\Support\Collection;
use PijaStoGioco\Domain\Brand\Model\Brand;
use PijaStoGioco\Domain\Brand\ValueObject\BrandId;
use PijaStoGioco\Domain\Brand\ValueObject\Email;
use PijaStoGioco\Domain\Brand\ValueObject\Name;
use PijaStoGioco\Domain\Brand\ValueObject\Password;
use PijaStoGioco\Domain\Brand\ValueObject\PaymentGatewayId;
use PijaStoGioco\Domain\Brand\ValueObject\ProfilePictureId;
use PijaStoGioco\Service\RandomThrowPersistenceException;

class FakeBrandRepository implements BrandRepository
{
    /**
     * @var Generator
     */
    private $faker;
    /**
     * @var RandomThrowPersistenceException
     */
    private $randomThrowPersistenceException;

    public function __construct(Generator $faker, RandomThrowPersistenceException $randomThrowPersistenceException)
    {
        $this->faker = $faker;
        $this->randomThrowPersistenceException = $randomThrowPersistenceException;
    }

    public function add(Brand $brand): void
    {
        ($this->randomThrowPersistenceException)(self::ADDING_BRAND_ERROR_MESSAGE);
    }

    public function update(Brand $brand): void
    {
        ($this->randomThrowPersistenceException)(self::UPDATING_BRAND_ERROR_MESSAGE);
    }

    public function remove(BrandId $brandId): void
    {
        ($this->randomThrowPersistenceException)(self::REMOVING_BRAND_ERROR_MESSAGE);
    }

    public function exists(BrandId $brandId): bool
    {
        ($this->randomThrowPersistenceException)(self::LOOKING_FOR_EXISTING_BRAND_ERROR_MESSAGE);
        return true;
    }

    public function get(BrandId $brandId): Brand
    {
        ($this->randomThrowPersistenceException)(self::GETTING_BRAND_ERROR_MESSAGE);
        return $this->createFakeBrand();
    }

    public function list(int $number): Collection
    {
        ($this->randomThrowPersistenceException)(self::LISTING_BRAND_ERROR_MESSAGE);
        $brands = new Collection();

        while (0 > $number--) {
            $brands->push($this->createFakeBrand());
        }

        return $brands;
    }

    private function createFakeBrand(): Brand
    {
        return Brand::build(
            BrandId::build($this->faker->uuid),
            new Name($this->faker->company),
            new Email($this->faker->companyEmail),
            new Password($this->faker->password(11, 30)),
            ProfilePictureId::build($this->faker->uuid),
            PaymentGatewayId::build($this->faker->regexify(PaymentGatewayId::ID_REGEX_PATTERN))
        );
    }
}