<?php
namespace App\Form;

use App\Entity\Dette;
use App\Entity\Client;
use App\Entity\Article;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('montant', NumberType::class, [
                'label' => 'Montant',
            ])
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'nom',  // Correction ici
                'label' => 'Client',
            ])
            ->add('article', EntityType::class, [
                'class' => Article::class,
                'choice_label' => 'libelle',  // Correction ici
                'label' => 'Article',
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Payée' => 'payee',
                    'Impayée' => 'impayee',
                ],
                'label' => 'Statut',
                'expanded' => true, // Pour afficher sous forme de boutons radio
                'multiple' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Dette::class,
        ]);
    }
}
