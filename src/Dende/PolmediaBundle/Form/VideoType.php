<?php

namespace Dende\PolmediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VideoType extends AbstractType {

    protected $uploaderHelper;

    public function __construct($uploaderHelper) {
        $this->uploaderHelper = $uploaderHelper;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title', null, array("label" => "Tytuł"))
                ->add('directorsName', null, array("label" => "Reżyser"))
                ->add('productionYear', null, array("label" => "Rok produkcji"))
                ->add('cast', null, array("label" => "Obsada"))
                ->add('duration', null, array("label" => "Czas trwania"))
                ->add('prizes', null, array("label" => "Nagrody"))
                ->add('plot', "textarea", array("label" => "Fabuła"))
                ->add('youtube', null, array("label" => "Id filmu youtube"))
                ->add('isFront', null, array("label" => "Wyświetl na stronie głównej"))
                ->add('isMain', null, array("label" => "Wyświetl w nagłówku strony głównej"))
                ->add('mainImage', "hidden")
                ->add('imageFile', "file", array(
                    "mapped" => false,
                    "attr"   => array(
                        "data-url" => $this->uploaderHelper->endpoint('gallery')
                    ),
                    "required" => false,
                    "label"  => "Obraz okładki"
                ))
                ->add('category', null, array("label" => "Kategoria filmu"))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Dende\PolmediaBundle\Entity\Video'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'dende_polmediabundle_video';
    }

}
