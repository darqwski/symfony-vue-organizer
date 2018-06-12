<?php
/**
 * Created by PhpStorm.
 * User: Darqwski
 * Date: 2018-06-12
 * Time: 18:44
 */

namespace App\Entity;

class notepadData extends PDOController {
    private static $tableName="neezer_notes";

    /**
     * @param $request -> GET REQUEST MAY CONTAIN
     * -notepad
     * -order
     * -id
     * -limit
     * if each of this are unset, nothing happened
     */
    public static function getRequest($request){

        $command="SELECT * FROM `neezer_notes`";

        if(isset($_GET['id'])){
            $command.=" WHERE `id`=$_GET[id]";
        }

        else if(isset($_GET['notepad'])){
            $command.=" WHERE `notepad`=$_GET[notepad]";
        }
        if(isset($_GET['order'])){
            switch ($_GET['order']){
                case "date":
                case "title":
                case "notepad":
                    $command.=" ORDER BY `$_GET[order]`";
                    break;
                default:
                    break;
            }
        }
        if(isset($_GET['limit'])){
            $command.=" LIMIT $_GET[limit],10";
        }

       return PDOController::convJSON(PDOController::getCommand($command));

    }
    private function deleteRequest($tableName,$request){

    }
    private function addRequest($tableName,$request){

    }
    private function updateRequest($tableName,$request){

    }
    public static function makeRequest($type,$request){
        switch ($type){
            case "get":
                return self::getRequest($request);
                break;
        }
    }
}