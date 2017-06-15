<?php

namespace ProjectBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use ProjectBundle\Entity\Author;


class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, array('label' => 'Name'));
        $builder->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => Author::class));
    }

    public function getName()
    {
        return 'project_author';
    }
}