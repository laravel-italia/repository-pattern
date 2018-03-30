<?php
declare(strict_types=1);

namespace Tests\Unit\Domain\Brand\Aggregate;

use PijaStoGioco\Domain\Brand\Model\BrandEloquentModel;
use PijaStoGioco\Domain\Brand\ValueObject\BrandId;
use PijaStoGioco\Domain\Brand\ValueObject\Email;
use PijaStoGioco\Domain\Brand\ValueObject\Name;
use PijaStoGioco\Domain\Brand\ValueObject\Password;
use PijaStoGioco\Domain\Brand\ValueObject\PaymentGatewayId;
use PijaStoGioco\Domain\Brand\ValueObject\ProfilePictureId;
use Tests\TestCase;
use function var_dump;

class BrandEloquentModelTest extends TestCase
{
    public function testMetest()
    {
        $b = BrandEloquentModel::build(
            BrandId::generate(),
            new Name('asd'),
            new Email('asdass' . random_int(1, 1000) . 'd@lkx.sdo'),
            Password::fromPlainPassword('asdasdasdasdasd'),
            ProfilePictureId::build('8397a49e-3456-11e8-b467-0ed5f89f718c'),
            PaymentGatewayId::build('asdasdasdasdasdasdasasdas')
        );

        var_dump($b->toArray(), $b->id(), $b->save());
    }
}