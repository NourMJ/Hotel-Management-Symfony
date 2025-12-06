<?php

namespace App\Form;

use App\Entity\Room;
use App\Entity\RoomCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('pricePerNight')
            ->add('capacity')
            ->add('roomNumber')
            ->add('floor')
            ->add('amenities', TextareaType::class, [
                'required' => false,
                'help' => 'Example: ["WiFi","TV","AC"]',
            ])
            ->add('image')
            ->add('category', EntityType::class, [
                'class' => RoomCategory::class,
                'choice_label' => 'name',
                'placeholder' => 'Choose a category',
            ])
        ;
        $builder->get('amenities')
            ->addModelTransformer(new CallbackTransformer(
                function ($array) {
                    // array -> string for display
                    return $array ? json_encode($array) : '';
                },
                function ($string) {
                    // string -> array for saving
                    if (!$string) {
                        return [];
                    }
                    $decoded = json_decode($string, true);
                    return is_array($decoded) ? $decoded : [];
                }
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Room::class,
        ]);
    }

}
