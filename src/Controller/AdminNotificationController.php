<?php

namespace App\Controller;

use App\Repository\NotificationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/notifications')]
class AdminNotificationController extends AbstractController
{
    #[Route('/', name: 'app_admin_notifications')]
    public function index(NotificationRepository $notificationRepository): Response
    {
        $notifications = $notificationRepository->findBy(
            [],
            ['createdAt' => 'DESC']
        );

        return $this->render('admin/notification/index.html.twig', [
            'notifications' => $notifications,
        ]);
    }

    #[Route('/{id}/read', name: 'app_admin_notifications_read')]
    public function markRead(
        int $id,
        NotificationRepository $notificationRepository
    ): Response {
        $notification = $notificationRepository->find($id);

        if ($notification) {
            $notification->setIsRead(true);
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->redirectToRoute('app_admin_notifications');
    }
}
