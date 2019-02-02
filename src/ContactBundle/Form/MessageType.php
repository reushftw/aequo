<?php

namespace ContactBundle\Form;

use BlogBundle\Entity\BlogPost;
use ContactBundle\Entity\Message;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, array(
                'label' => 'First Name',

            ))
            ->add('lastName', TextType::class, array(
                'label' => 'Last Name',

            ))
            ->add('fonction', TextType::class, array(
                'label' => 'Fonction',
            ))
            ->add('email', TextType::class, array(
                'label' => 'Email',

            ))
            ->add('phone', IntegerType::class, array(
                'label' => 'Phone Number',

            ))
            ->add('message', TextareaType::class, array(
                'label' => 'Message',
                'attr' => array('rows' => 4)

            ))
            ->add('save',      SubmitType::class, array(
                'label' => 'Send',
                'attr' => array('class' => 'btn btn-see-all')

            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Message::class,
        ));
    }
}