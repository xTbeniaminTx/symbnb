<?php

namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    /**
     * Permet d avoir la configuration de base d'un champ
     *
     * @param $label
     * @param $placeholder
     * @return array
     */
    private function getConfiguration($label, $placeholder)
    {
        return [
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
        ];
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,
                $this->getConfiguration(
                    'Titre',
                    'Tapez votre titre ici'))
            ->add('slug', TextType::class,
                $this->getConfiguration(
                    'Chaine URL',
                    'Adresse web (automatique)'))
            ->add('coverImage', UrlType::class,
                $this->getConfiguration(
                    'URL de l\'image',
                    'Doneez l addresse d une image qui donne vraiment envie'))
            ->add('introduction', TextType::class,
                $this->getConfiguration(
                    'Introduction',
                    'Donnez une description globale de l annonce'))
            ->add('content', TextareaType::class,
                $this->getConfiguration(
                    'Description detaillée',
                    'Tapez une description qui donne envie de venir chez vous'))
            ->add('rooms', IntegerType::class,
                $this->getConfiguration(
                    'Nombre de chambres',
                    'Le nombre de chambres disponibles'))
            ->add('price', MoneyType::class,
                $this->getConfiguration(
                    'Prix par nuit',
                    'Indiquez le prix que vous voulez pour une nuit'))
            ->add('save', SubmitType::class,
                [
                    'label' => 'Creer la nouvelle annonce',
                    'attr' => [
                        'class' => 'btn btn-primary'
                    ]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}