<?php

namespace App\Controller\Admin;

use App\Entity\Soon;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\VichImageField ;


class SoonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Soon::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            VichImageField::new('imageFile')->hideOnIndex(),
            DateTimeField::new('date'),
        ];
    }
    
}
