<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\RoomRepository;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(RoomRepository $roomRepository): Response
    {
        $rooms = $roomRepository->findBy([], null, 3); // 3 featured rooms
        return $this->render('Home/index.html.twig', [
            'rooms' => $rooms,
        ]);
    }

}
