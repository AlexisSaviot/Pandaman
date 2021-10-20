<?php

namespace App\Controller\Admin;

use App\Entity\Mangas;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MangasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mangas::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
