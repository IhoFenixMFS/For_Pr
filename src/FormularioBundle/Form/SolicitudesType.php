<?php

namespace FormularioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FormularioBundle\Entity\Solicitudes;

use AppBundle\Entity\Post;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class SolicitudesType extends AbstractType
{
    /**
     * {@inheritdoc}
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
                ->add('idSolicitante')
                ->add('cIFNIFFactura')
                ->add('idLugar')
                ->add('totalCiva')
                ->add('totalSiva')
                /*->add('Guardar', SubmitType::class)*/
                ;
            /*
                http://symfony.com/doc/2.3/best_practices/forms.html
            */
        }

    /**
    * @param OptionsResolverInterface $resolver
    */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
        {
            $resolver->setDefaults(array('data_class' => '@FormularioBundle\Entity\Solicitudes'));
        }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults(array(
                'data_class' => 'FormularioBundle\Entity\Solicitudes'
            ));
        }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
        {
            return 'formulariobundle_solicitudes';
        }


}
