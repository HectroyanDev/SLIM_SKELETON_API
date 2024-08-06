<?php

declare(strict_types=1);

namespace App\User\Domain\Model;

use App\User\Domain\ValueObjects\FirstName;
use App\User\Domain\ValueObjects\LastName;
use App\User\Domain\ValueObjects\UserId;
use App\User\Domain\ValueObjects\UserName;
use JsonSerializable;

class User implements JsonSerializable
{
    public function __construct(private ?UserId $id,private UserName $username,private FirstName $firstName,private LastName $lastName) {}

    public function getId(): ?UserId
    {
        return $this->id;
    }

    public function getUsername(): UserName
    {
        return $this->username;
    }

    public function getFirstName(): FirstName
    {
        return $this->firstName;
    }

    public function getLastName(): LastName
    {
        return $this->lastName;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
        ];
    }
}
