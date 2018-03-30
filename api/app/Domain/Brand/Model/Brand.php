<?php
declare(strict_types=1);

namespace PijaStoGioco\Domain\Brand\Model;

use PijaStoGioco\Domain\Brand\ValueObject\BrandId;
use PijaStoGioco\Domain\Brand\ValueObject\Email;
use PijaStoGioco\Domain\Brand\ValueObject\Name;
use PijaStoGioco\Domain\Brand\ValueObject\Password;
use PijaStoGioco\Domain\Brand\ValueObject\PaymentGatewayId;
use PijaStoGioco\Domain\Brand\ValueObject\ProfilePictureId;

class Brand
{
    /**
     * @var BrandId
     */
    private $id;

    /**
     * @var Name
     */
    private $name;

    /**
     * @var Email
     */
    private $email;

    /**
     * @var Password
     */
    private $password;

    /**
     * @var ProfilePictureId
     */
    private $profilePictureId;

    /**
     * @var PaymentGatewayId
     */
    private $paymentGatewayId;

    public static function build(
        BrandId $id,
        Name $name,
        Email $email,
        Password $password,
        ProfilePictureId $profilePictureId,
        PaymentGatewayId $paymentGatewayId
    ): Brand
    {
        $brand = new self();
        $brand->id = $id;
        $brand->name = $name;
        $brand->email = $email;
        $brand->password = $password;
        $brand->profilePictureId = $profilePictureId;
        $brand->paymentGatewayId = $paymentGatewayId;

        return $brand;
    }

    public function id(): BrandId
    {
        return $this->id;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function password(): Password
    {
        return $this->password;
    }

    public function profilePictureId(): ProfilePictureId
    {
        return $this->profilePictureId;
    }

    public function paymentGatewayId(): PaymentGatewayId
    {
        return $this->paymentGatewayId;
    }
}