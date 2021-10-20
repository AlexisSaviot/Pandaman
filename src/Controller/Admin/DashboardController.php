<?php

namespace App\Controller\Admin;

use App\Entity\Author;
use App\Entity\Categories;
use App\Entity\Editors;
use App\Entity\Mangas;
use App\Entity\Themes;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{   
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Pandaman2');
    }

    public function configureMenuItems(): iterable
    {
            $user = $this->getUser();
            $user_role = $user->getRoles();
            if (in_array('ROLE_ADMIN', $user_role )) {
                yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
                // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
                yield MenuItem::section('Users');
                yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
                yield MenuItem::section('Pandaman');
                yield MenuItem::linkToCrud('Mangas', 'fas fa-tags', Mangas::class);
                yield MenuItem::linkToCrud('Editors', 'fas fa-tags', Editors::class);
                yield MenuItem::linkToCrud('Authors', 'fas fa-tags', Author::class);
                yield MenuItem::linkToCrud('Category', 'fas fa-tags', Categories::class);
                yield MenuItem::linkToCrud('Themes', 'fas fa-tags', Themes::class);
            };
    }
}
