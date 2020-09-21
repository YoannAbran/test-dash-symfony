<?php

namespace App\Controller;

use App\Entity\Livres;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\HttpFoundation\File\File;

class LivresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Livres::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('reference'),
            TextField::new('conseil'),
            TextField::new('categorie'),
            DateTimeField::new('dateAchat'),
            DateTimeField::new('dateGarantie'),
            MoneyField::new('prix')->setCurrency('EUR'),
            ImageField::new('ticketFile')->hideOnIndex(),
            ImageField::new('photoFile')->hideOnIndex(),
            ImageField::new('photoTicket')
            ->setBasePath('/img/ticket')
            ->hideOnForm(),
            ImageField::new('photo')
            ->setBasePath('/img/photo')
            ->hideOnForm(),

        ];
    }

}
