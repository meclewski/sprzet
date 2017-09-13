<?php

namespace AppBundle\Form;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\EtypeType;

class EquipmentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('inventoryNr')->add('serialNr')
        ->add('verificationDate', DateType::class, array('widget' => 'single_text',
          'format' => 'dd-MM-yyyy',
          'attr' => [
              'class' => 'form-control input-inline datepicker',
              'data-provide' => 'datepicker',
              'data-date-format' => 'dd-mm-yyyy']))
        ->add('timeToVerification', DateType::class, array('widget' => 'single_text',
          'format' => 'dd-MM-yyyy',
          'attr' => [
              'class' => 'form-control input-inline datepicker',
              'data-provide' => 'datepicker',
              'data-date-format' => 'dd-mm-yyyy']))
        ->add('verificationResult')
        ->add('productionDate', DateType::class, array('widget' => 'single_text',
          'format' => 'dd-MM-yyyy',
          'attr' => [
              'class' => 'form-control input-inline datepicker',
              'data-provide' => 'datepicker',
              'data-date-format' => 'dd-mm-yyyy']))
        ->add('userId')->add('engId')->add('place')->add('ifUsed')->add('etype');

    
    //  $builder->addEventListener(
      //          FormEvents::PRE_SUBMIT,
        //        function(FormEvent $event) {
          //          $form = $event->getForm(); // FormInterface
            //        $data = $event->getData()->getEtype(); 
              //      $id_etype = $data->getId();
//
  //                  if($id_etype)
    //                    $form->get('engId')->setData($id_etype);

       // $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
      //  $date = $event->getData('verificationDate');
     //   $form = $event->getForm();
     //   $id = $date['etype'];
       // $time = strtotime($date);
      // $wynik = date("Y-m-d", strtotime("+$id months", $time));
      //  $form->setData(['timeToVerification'], $wynik);
   //});
}
    
   
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Equipment',

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
