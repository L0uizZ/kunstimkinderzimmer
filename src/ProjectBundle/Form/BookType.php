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


class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, array('label' => 'Title'));
        $builder->add('year', TextType::class, array('label' => 'Year'));
        $builder->add('pictures', 'enhavo_files', array('label' => 'Pictures', 'translation_domain' => 'FileInterface', 'information' => array('You can upload your pictures here'),
                      'multiple' => true, 'fields' => array('title' => array('label' => 'media.form.label.title', 'translationDomain' => 'FileInterface'))));
        $builder->add('content', GridType::class, array('label' => 'Content'));
        $builder->add('biography', GridType::class, array('label' => 'Biography'));
        $builder->add('author', EntityType::class, array('class' => 'ProjectBundle:Author',
                                                         'query_builder' => function(EntityRepository $er){
                                                              return $er->createQueryBuilder('u')->orderBy('u.name', 'ASC');
                                                          },
                                                          'choice_label' => 'name'));
        $builder->add('link', ListType::class, array('label' => 'Links'));
        $builder->getForm();
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