<?php

namespace LIV\UserBundle\Entity;

use FOS\UserBundle\Model\User as FOSUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="liv_user")
 */
class User extends FOSUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Assert\Regex(
     *  pattern="/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{7,}/",
     *  message="Le mot de passe doit comporter sept caractères ou plus et contenir au moins un chiffre, un caractère majuscule et un caractère minuscule. Password must be seven or more characters long and contain at least one digit, one upper- and one lowercase character."
     * )
     */
    protected $plainPassword;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
