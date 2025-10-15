<?php
namespace Factory\Models;

class Users extends Collection
{
    public function __construct(public ?array $users = null)
    {
        $users ??= [
            new User('tony.soprano@example.com', 'password', 'Tony', 'Soprano'),
            new User('carmela.soprano@example.com', 'password', 'Carmela', 'Soprano'),
            new User('christopher.moltisanti@example.com', 'password', 'Christopher', 'Moltisanti'),
            new User('paulie.gualtieri@example.com', 'password', 'Paulie', 'Gualtieri'),
            new User('silvio.dante@example.com', 'password', 'Silvio', 'Dante'),
        ];
        $this->users = $users;
        parent::__construct($users);
    }
}

