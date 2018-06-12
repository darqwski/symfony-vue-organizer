<?php
/**
 * Created by PhpStorm.
 * User: Darqwski
 * Date: 2018-06-11
 * Time: 22:57
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class notepadController extends Controller {
    /**
     * @Route("/notepad")
     */
    public function index(){
        return  $this->render('notepad.html.twig',['name'=>'Notepad']);
    }

}