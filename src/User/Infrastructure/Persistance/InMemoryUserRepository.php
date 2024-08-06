<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Persistance;

use App\User\Domain\Model\User;
use App\User\Domain\Exceptions\UserNotFoundException;
use App\User\Domain\Repository\UserRepository;
use App\User\Domain\ValueObjects\FirstName;
use App\User\Domain\ValueObjects\LastName;
use App\User\Domain\ValueObjects\UserId;
use App\User\Domain\ValueObjects\UserName;

class InMemoryUserRepository implements UserRepository
{
    /**
     * @var User[]
     */
    private array $users;

    /**
     * @param User[]|null $users
     */
    public function __construct(array $users = null)
    {
        $this->users = $users ?? [
            1 => new User(new UserId(1), new UserName('bill.gates'), new FirstName('Bill'), new LastName('Gates')),
            2 => new User(new UserId(2), new UserName('steve.jobs'), new FirstName('Steve'), new LastName('Jobs')),
            3 => new User(new UserId(3), new UserName('mark.zuckerberg'), new FirstName('Mark'), new LastName('Zuckerberg')),
            4 => new User(new UserId(4), new UserName('evan.spiegel'), new FirstName('Evan'), new LastName('Spiegel')),
            5 => new User(new UserId(5), new UserName('jack.dorsey'), new FirstName('Jack'), new LastName('Dorsey')),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->users);
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): User
    {
        if (!isset($this->users[$id])) {
            throw new UserNotFoundException();
        }

        return $this->users[$id];
    }
}
