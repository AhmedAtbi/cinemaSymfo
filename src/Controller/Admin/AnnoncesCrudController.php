<?php

namespace App\Controller\Admin;

use App\Entity\Annonces;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use App\VichImageField ;








class AnnoncesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Annonces::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('nom'),
            TextField::new('description'),
            ImageField::new('image')->setBasePath($this->getParameter('app.path.images'))->onlyOnIndex(),
            VichImageField::new('imageFile')->hideOnIndex(),
            IntegerField::new('prix'),
            DateTimeField::new('date'),
            AssociationField::new('salle')->autocomplete(),
            AssociationField::new('genre')->autocomplete(),
            IntegerField::new('nbr_pers'),
            AssociationField::new('categorie')->autocomplete(),

        ];
    }
    
}
