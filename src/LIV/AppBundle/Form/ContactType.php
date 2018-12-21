<?php
/**
 * Created by PhpStorm.
 * User: jaldo
 * Date: 20/12/18
 * Time: 14:27
 */

namespace LIV\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class)
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('object', TextType::class)
            ->add('message', TextareaType::class)
            ->add('submit', SubmitType::class);
    }
}
