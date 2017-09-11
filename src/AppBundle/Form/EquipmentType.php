<?php

namespace AppBundle\Form;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipmentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('inventoryNr')->add('serialNr')->add('verificationDate')->add('timeToVerification')->add('verificationResult')->add('productionDate')->add('userId')->add('engId')->add('place')->add('ifUsed')->add('etype');

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
        $date = $event->getData('verificationDate');
        $form = $event->getForm();
        $id = $date['etype'];
       // $time = strtotime($date);
      // $wynik = date("Y-m-d", strtotime("+$id months", $time));
      //  $form->setData(['timeToVerification'], $wynik);
    });
}
    
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Equipment'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_equipment';
    }


}
