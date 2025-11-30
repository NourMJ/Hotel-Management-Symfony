<?php

namespace App\Controller;

use App\Repository\StatisticsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin_dashboard')]
    public function index(StatisticsRepository $statisticsRepository): Response
    {
        // Take latest statistics (or null if none yet)
        $stats = $statisticsRepository->findOneBy([], ['monthYear' => 'DESC']);

        return $this->render('admin/dashboard.html.twig', [
            'stats' => $stats,
        ]);
    }
}
