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
    public static function getRequest(){

        $command="SELECT * FROM `neezer_notes`";
        if(isset($_GET['id'])){
            $command.=" WHERE `ID`=$_GET[id]";
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

        $data=PDOController::getCommand($command);
        $tableID=$data[0]['notepad'];
        $tableName=PDOController::getCommand("SELECT `Name` FROM `neezer_notepads` WHERE `ID`=$tableID");

        $data[0]['notepad']=$tableName[0]['Name'];


       return PDOController::convJSON($data);

    }
    private function deleteRequest(){
        $command="DELETE FROM `neezer_notes`";
        if(isset($_GET['id'])){
            $command.=" WHERE `ID`=$_GET[id]";
          $number= PDOController::convJSON(PDOController::getCommand($command));
            if($number=="1")return "DELETE RECORD";
            if($number==0)return "RECORD WAS NOT DELETED";
            return "$number RECORDS WERE DELETED";
        }

        else return "NO ID WAS SELECTED";

    }
    private function addRequest(){

    }
    private function updateRequest($tableName,$request){

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