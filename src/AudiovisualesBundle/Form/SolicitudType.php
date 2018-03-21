<?php

namespace AudiovisualesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

//Importar los tipos
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\TelType;

use AudiovisualesBundle\Entity\Categoria;




class SolicitudType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreSolicitante', TextType::class)
                ->add('apellido1Solicitante', TextType::class)
                ->add('apellido2Solicitante', TextType::class)
                ->add('telefonoSolicitante', TelType::class)
                ->add('emailSolicitante', EmailType::class)
            ->add('lugarEvento', ChoiceType::class,
                array(
                    'choices' => array(
                       'Rectorado' => array(
                            'Salón de Actos' => 'Rectorado: Salón de Actos',
                        ),
                        'Móstoles' => array(
                            'Aula Magna 1' => 'Móstoles: Aula Magna 1',
                            'Aula Magna 2' => 'Móstoles: Aula Magna 2',
                            'Aula Magna 3' => 'Móstoles: Aula Magna 3',
                            'Salón de Grados 1' => 'Móstoles: Salón de Grados 1',
                            'Salón de Grados 2' => 'Móstoles: Salón de Grados 2',
                        ),
                        'Alcorcón' => array(
                            'Salón de Actos Gestión' => 'Alcorcón: Salón de Actos Gestión',
                            'Salón de Actos Departamental 2' => 'Alcorcón: Salón de Actos Departamental 2',
                            'Salón de Grados 1' => 'Alcorcón: Salón de Grados 1',
                            'Aula Magna 1' => 'Alcorcón: Aula Magna 1',
                        ),
                        'Fuenlabrada' => array(
                            'Salón de Actos' => 'Fuenlabrada: Salón de Actos',
                            'Salón de Grados' => 'Fuenlabrada: Salón de Grados',
                            'Aula Magna 1' => 'Fuenlabrada: Aula Magna 1',
                            'Aula Magna 3' => 'Fuenlabrada: Aula Magna 3',
                        ),
                        'Madrid' => array(
                            'Salón de Actos Biblioteca' => 'Madrid: Salón de Actos Biblioteca',
                            'Salón de Actos Manuel Becerra' => 'Madrid: Salón de Actos Manuel Becerra',
                            'Salón de Grados 1' => 'Madrid: Salón de Grados 1',
                        ),
                    ),//fin 'choices'
                )//fin array de choices
                )//fin add LugarEvento 
            
            ->add('serviciosContratados', ChoiceType::class, array(
                //'expanded' => true,
                'multiple' => true,
                'choices' => array(
                    'uno' => 1000,
                    'dos' => 2000,
                    'tres' => 3000,
                ),
                )
                )
            ->add('importeTotal', MoneyType::class)
            ->add('save', SubmitType::class, ['label' => 'Enviar Solicitud']);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AudiovisualesBundle\Entity\Solicitud'
        ));
    }

    

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'audiovisualesbundle_solicitud';
    }


}
