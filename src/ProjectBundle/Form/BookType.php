<?php

namespace ProjectBundle\Form;


use Doctrine\ORM\EntityRepository;
use Enhavo\Bundle\AppBundle\Form\Type\ListType;
use Enhavo\Bundle\GridBundle\Form\Type\GridType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use ProjectBundle\Entity\Book;
use ProjectBundle\Form\LinkType;
use ProjectBundle\Entity\Link;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, array('label' => 'Titel', 'translation' => true));
        $builder->add('year', TextType::class, array('label' => 'Jahr'));
        $builder->add('cover', 'enhavo_files', array('label' => 'Cover', 'multiple' => false));
        $builder->add('pictures', 'enhavo_files', array(
            'label' => 'Bilder',
            'multiple' => true,
            'fields' => array('title' => array(
                'label' => 'media.form.label.title',
                'translationDomain' => 'FileInterface'
            ))
        ));
        $builder->add('author', EntityType::class, array(
            'class' => 'ProjectBundle:Author',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')->orderBy('u.name', 'ASC');
            },
            'label' => 'Autor',
            'choice_label' => 'name'
        ));
        $builder->add('content', GridType::class, array('label' => 'Inhalt'));
        $builder->add('biography', GridType::class, array('label' => 'Biografie'));
        $builder->add('link', ListType::class, array(
            'label' => 'Links',
            'sortable' => true,
            'border' => true,
            'type' => 'project_link'
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => Book::class));
    }

    public function getName()
    {
        return 'project_book';
    }
}