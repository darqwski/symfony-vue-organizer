<?php
/**
 * Created by PhpStorm.
 * User: Darqwski
 * Date: 2018-06-12
 * Time: 16:55
 */

namespace App\Controller;

use App\Entity\notepadData;
use App\Entity\notepadsData;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use PDO;
class DataController{

    /**
     * @Route("/data/{table}/{type}")
     *
     * Date request are forwarded here to special operator
     */
    public function data($table,$type){
        $text="";
        switch ($table){
            case "notepad":
                $text=notepadData::makeRequest($type);
                break;
            case "notepads":
                $text=notepadsData::makeRequest($type);
                break;
            case "todolist":
                break;
            case "calendar":
                break;
            default:
                break;
        }
        return new Response($text);
    }

}