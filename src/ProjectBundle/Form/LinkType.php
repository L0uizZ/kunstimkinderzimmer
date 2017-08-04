<?php

namespace ProjectBundle\Form;

use Enhavo\Bundle\AppBundle\Form\Type\PositionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use ProjectBundle\Entity\Link;


class LinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, array('label' => 'Name', 'translation' => true));
        $builder->add('link', TextType::class, array('label' => 'Link'));
        $builder->add('position', PositionType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => Link::class));
    }

    public function getName()
    {
        return 'project_link';
    }
}