<?php

namespace App\Controller\Admin;

use App\Entity\Profile;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;

class ProfileCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Profile::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('fullname', 'Nom complet'),
            TextField::new('accountNumber', 'Numéro Compte'),
            AssociationField::new('user'),
            CountryField::new('country', 'Pays'),
            TextField::new('address', 'Adresse'),
            TextField::new('iban', 'IBAN'),
            TextField::new('swift', 'SWIFT'),
            MoneyField::new('currency', 'Devise')->setCurrency(''),
            CountryField::new('country', 'Pays'),
        ];
    }
 
}
