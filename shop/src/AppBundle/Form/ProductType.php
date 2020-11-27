<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', 'text',
                array(
                    'attr' => array(
                        'class' => 'form-control margin__tb__8',
                        'placeholder' => 'Produktname',
                    ),
                    'label' => false,
                )
            )
            ->add('price', 'number',
                array(
                    'attr' => array(
                        'class' => 'form-control margin__tb__8',
                        'placeholder' => 'Preis',
                    ),
                    'label' => false,
                    'scale' => 2
                )
            )
            ->add('description', 'text',
                array(
                    'attr' => array(
                        'class' => 'form-control margin__tb__8',
                        'placeholder' => 'Beschreibung',
                    ),
                    'label' => false,
                )
            )
            ->add('brand', 'text',
                array(
                    'attr' => array(
                        'class' => 'form-control margin__tb__8',
                        'placeholder' => 'Marke',
                    ),
                    'label' => false,
                )
            )
            ->add('image', 'text',
                array(
                    'attr' => array(
                        'class' => 'form-control margin__tb__8',
                        'placeholder' => 'Image Link',
                    ),
                    'label' => false,
                )
            )
            ->add('save', 'submit',
                array(
                    'attr' => array(
                        'class' => 'btn btn-primary margin__tb__8 width__full'
                    ),
                    'label' => 'Produkt anlegen'
                )
            )
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_product';
    }
}
