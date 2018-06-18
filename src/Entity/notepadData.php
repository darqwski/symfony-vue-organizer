<?php
/**
 * Created by PhpStorm.
 * User: Darqwski
 * Date: 2018-06-12
 * Time: 18:44
 */

namespace App\Entity;

class notepadData extends DataFormat {
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
        else
            $command.=" ORDER BY `date` DESC";
        if(isset($_GET['limit'])){
            $number=10;
            if(isset($_GET['number']))$number=$_GET['number'];
            $command.=" LIMIT $_GET[limit],$number";
        }

        $data=PDOController::getCommand($command);
        $tableID=$data[0]['notepad'];
        $tableName=PDOController::getCommand("SELECT `Name` FROM `neezer_notepads` WHERE `ID`=$tableID");
        $data[0]['notepad']=$tableName[0]['Name'];

       return PDOController::convJSON($data);

    }
    public static function deleteRequest(){
        $command="DELETE FROM `neezer_notes`";
        if(isset($_POST['id'])){
            $command.=" WHERE `ID`=$_POST[id]";
          $number= PDOController::convJSON(PDOController::getCommand($command));
            if($number=="1")return "DELETE RECORD";
            if($number==0)return "RECORD WAS NOT DELETED";
            return "$number RECORDS WERE DELETED";
        }

        else return "NO ID WAS SELECTED";

    }
    public static function addRequest(){

        $title=($_POST['title']);
        $text=($_POST['text']);
        $notepad=$_POST['notepad'];
        $words=explode(" ",$_POST['text']);
        $firstLine='';
        for($i=0;($i<count($words)&&$i<5);$i++)
            $firstLine.=$words[$i].' ';
        $date=Date("Y-m-d H:i:s");
        $command="INSERT INTO  `neezer_notes` (`title`,`text`,`firstLine`,`date`,`notepad`) VALUES ('$title','$text','$firstLine','$date','$notepad')";
        $added=PDOController::putCommand($command);
        $response=" ODPOWIEDZ Z SERWERA: ";
        if($added==1)$response.=" DODODANE ".$command."<br>".
            "INSERT INTO  `neezer_notepads` (`title`,`text`,`firstLine`,`date`,`notepad`) VALUES ('$title','$text','$firstLine','$date','$notepad')";
        else $response.=" NIE DODANE I CHUJ"."<br>".
        "INSERT INTO  `neezer_notepads` (`title`,`text`,`firstLine`,`date`,`notepad`) VALUES ('$title','$text','$firstLine','$date','$notepad')";

        return $response;
    }
    public static function updateRequest(){

        $title=($_POST['title']);
        $text=($_POST['text']);
        $ID=$_POST['ID'];
        $notepad=$_POST['notepad'];
        $words=explode(" ",$_POST['text']);
        $firstLine='';
        for($i=0;($i<count($words)&&$i<5);$i++)
            $firstLine.=$words[$i].' ';
        $date=Date("Y-m-d H:i:s");
        $command="UPDATE `neezer_notes` 
        SET `title`='".$title."',`text`='".$text."',`firstLine`='".$firstLine."' ,`date`='".$date."' ,`notepad`='".$notepad."' 
        WHERE `ID`='$ID'";
        $added=PDOController::putCommand($command);
        $response=" ODPOWIEDZ Z SERWERA: $added ".$command;
           return $response;
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