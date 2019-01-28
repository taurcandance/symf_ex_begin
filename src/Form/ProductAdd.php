<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ProductAdd extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, ['attr'=>['maxlength'=>'70']])
            ->add('color', TextType::class)
            ->add('cut', IntegerType::class, ['attr'=>['maxlength' => 1]])
            ->add('height', IntegerType::class, ['attr'=>['maxlength' => 1]])
            ->add('groundCover', IntegerType::class, ['attr'=>['maxlength' => 1]])
            ->add('perennialAnnual', IntegerType::class, ['attr'=>['maxlength' => 1]])
            ->add('shadeLoving', IntegerType::class, ['attr'=>['maxlength' => 1]])
            ->add('price', MoneyType::class, ['currency' => false, 'label'=>'Cost', 'attr'=>['maxlength'=>7]])
            ->add('imagePath', TextType::class)
            ->add('description', TextareaType::class, ['attr'=>['maxlength' => 250]])
            ->add('Save', SubmitType::class);
    }
}