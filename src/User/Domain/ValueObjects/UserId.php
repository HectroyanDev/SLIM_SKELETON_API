<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObjects;

class UserId
{
    public function __construct(private int $id)
    {
        $this->id = $id;
    }

    public function get(): int
    {
        return $this->id;
    }
}