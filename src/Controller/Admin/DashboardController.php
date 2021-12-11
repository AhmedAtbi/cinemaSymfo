<?php

namespace App\Controller\Admin;

use App\Entity\Annonces;
use App\Entity\Categories;
use App\Entity\Genre;
use App\Entity\Salle;
use App\Entity\Soon;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController ;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;




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
            ->setTitle('Salle de Cinema');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Categories', 'fas fa-video', Categories::class);
        yield MenuItem::linkToCrud('Annonces', 'fas fa-film', Annonces::class);
        yield MenuItem::linkToCrud('Salle', 'fas fa-person-booth', Salle::class);
        yield MenuItem::linkToCrud('Genre', 'fas fa-file-video', Genre::class);
        yield MenuItem::linkToCrud('Soon', 'fas fa-file-video', Soon::class);
    }
}
