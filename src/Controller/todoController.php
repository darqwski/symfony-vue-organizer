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
class todoController extends Controller {
    /**
     * @Route("/todo")
     */
    public function index(){
        return  $this->render('notepad.html.twig',['name'=>'Todo list']);
    }

}