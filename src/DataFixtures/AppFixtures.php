<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Destination;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    private function encode($user, $plaintextpassword)
    {
        return $this->passwordEncoder->encodePassword(
            $user,
            $plaintextpassword
        );
    }
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $simpleUser = new User();
            $simpleUser->setUsername("Jack" . $i);
            $simpleUser->setPassword("soleil123");
            $simpleUser->setRoles(['ROLE_USER']);
            $manager->persist($simpleUser);
            for ($j = 0; $j < 10; $j++) {
                $oneDestination = new Destination();
                $oneDestination->setCity("Bali $j");
                $oneDestination->setCountry("Indonésie $j");
                $oneDestination->setDescription("Bali est une île du Sud de l'Indonésie située entre les îles de Java et de Lombok
                Lieux importants :   Sanur (Plages conviviales, temple Pura Blanjong), Pura Luhur Uluwatu (Temple hindou historique, vue sur océan)");
                $oneDestination->setImgURL("blabla.com $j");
                $oneDestination->setAuthor($simpleUser);
                $manager->persist($oneDestination);
            }
        }

        $manager->flush();
    }
}
