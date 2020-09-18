<?php namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class LivresType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $option)
  {
    $builder
    ->add('photoTicket',FileType::class,[
      'label'=>'Photo ticket (image file)',
      'mapped'=>false,
      'required'=>false,
      'constraints'=>[
        new File([
          'maxSize' => '1024k',
          'mimTypes'=>[
            'image/jpeg',
            'image/png',
          ],
          'mimeTypeMessage'=>'please upload a valid image format',
        ])
      ],
    ]);
  }
  public function configureOptions(OptionsResolver $resolver)
  {
      $resolver->setDefaults([
          'data_class' => Product::class,
      ]);
  }
}
