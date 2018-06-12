<?php
/**
 * Created by PhpStorm.
 * User: Darqwski
 * Date: 2018-06-12
 * Time: 00:06
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class calendarController extends Controller {
    /**
     * @Route("/calendar")
     */
    public function index(){
       // $data=PDOController::getCommand("SELECT * FROM `neezer_notes`");
        return  $this->render('typicalPage.html.twig',['name'=>"Kalendarz",'appName'=>"calendarApp"]);
    }


}