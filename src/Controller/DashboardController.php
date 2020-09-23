<?php

namespace App\Controller;


use App\Entity\Livres;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // return parent::index();
        return $this->render('dash.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Test Dash Symfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Liste', 'icon class', Livres::class);
        yield MenuItem::linkToCrud('User', 'icon class', User::class);
        // yield MenuItem::linkToRoute('creer', 'icon class', 'create');
        yield MenuItem::linkToRoute('Register', 'icon class', 'app_register');

    }
    public function configureAssets(): Assets
   {

       return Assets::new()->addCssFile('css/dash.css');
     }


}
