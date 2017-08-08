<?php
/**
 * Created by PhpStorm.
 * User: gseidel
 * Date: 03.08.17
 * Time: 18:08
 */

namespace ProjectBundle\Form;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use ProjectBundle\Model\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', TextType::class, [
            'label' => 'contact.firstName'
        ]);
        $builder->add('lastName', TextType::class, [
            'label' => 'contact.lastName'
        ]);
        $builder->add('email', TextType::class, [
            'label' => 'contact.email'
        ]);
        $builder->add('message', TextareaType::class, [
            'label' => 'contact.message'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class
        ]);
    }

    public function getName()
    {
        return 'contact';
    }

    public function getBlockPrefix()
    {
        return 'contact';
    }
}