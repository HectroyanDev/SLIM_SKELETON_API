<?php
declare(strict_types=1);

namespace App\User\Domain\ValueObjects;

class LastName
{
    const MIN_LENGTH = 3;
    const MAX_LENGTH = 50;
    private $rules = [
        'min' => self::MIN_LENGTH,
        'max' => self::MAX_LENGTH
    ];
    public function __construct(private string $name)
    {
        if(strlen($name) < $this->rules['min']) {
            throw new \InvalidArgumentException('Name must be at least 3 characters long');
        }
        if(strlen($name) > $this->rules['max']) {
            throw new \InvalidArgumentException('Name must be at most 255 characters long');
        }
        if(!is_string($name)) {
            throw new \InvalidArgumentException('Name must be a string');
        }
        $this->name = $this->set($name);
    }

    public function get(): string
    {
        return $this->name;
    }
    public function set(string $name): void
    {
        $this->name = strtolower($name);
    }
}