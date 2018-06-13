<?php
/**
 * Created by PhpStorm.
 * User: Darqwski
 * Date: 2018-06-12
 * Time: 18:44
 */

namespace App\Entity;
use App\Entity\DataFormat;
use App\Entity\PDOController;
class notepadsData extends DataFormat {
    private static $tableName="neezer_notepads";
    public static function getRequest(){
        $command="SELECT * FROM `neezer_notepads`";
        if(isset($_GET['id'])){
            $command.=" WHERE `ID`=$_GET[id]";
        }
        if(isset($_GET['limit'])){
            $command.=" LIMIT $_GET[limit],10";
        }

        return PDOController::convJSON(PDOController::getCommand($command));
    }
    public static function deleteRequest(){

    }
    public static function addRequest(){


    }
    public static function updateRequest(){


    }
    public static function makeRequest($type){
        switch ($type){
            case "get":
                return self::getRequest();
            case "delete":
                return self::deleteRequest();
            case "add":
                return self::addRequest();
            case "update":
                return self::updateRequest();

        }
    }
}