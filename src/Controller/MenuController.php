<?php

namespace App\Controller;

use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    /**
     * @Route("/menu", name="menu")
     */
    public function index(MenuRepository $menuRepository)
    {
        $menus = $menuRepository->findAll();

        $dayNow = new \DateTime();
        $timestamp = $dayNow->getTimestamp();
        $weekNow = date('W',$timestamp);
        $dayD = date('D',$timestamp);

        $weekNext = $weekNow+1;


        $menuWeekS = $menuRepository->findBy(['weekDate' => $weekNow]);
        $menuWeeknext = $menuRepository->findBy(['weekDate' => $weekNext]);



        return $this->render('menu/index.html.twig', [
            'menus' => $menus,
            'menuWeekS' => $menuWeekS,
            'menuWeekNext' => $menuWeeknext
        ]);
    }
}
