<?php

namespace App\DataFixtures;

use App\Entity\Interfaces\IRole;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use symfony\component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements IRole
{
    private $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
        
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User;
        $user->setEmail("bourvil@youhou.fr");
        $user->addRole(self::ROLE_ADMIN);
        $user->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user,
                "123456"
            )
        );
        $manager->persist($user);

        $user = new User;
        $user->setEmail("defunes@youhou.com");
        $user->addRole(self::ROLE_ADMIN);
        $user->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user,
                "456123"
            )
        );
        $manager->persist($user);

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
