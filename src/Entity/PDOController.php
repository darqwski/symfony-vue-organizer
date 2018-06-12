<?php
/**
 * Created by PhpStorm.
 * User: Darqwski
 * Date: 2018-06-12
 * Time: 18:48
 */

namespace App\Entity;

use PDO;
class PDOController
{
    public static function getCommand($command){
        $PDO_login='usbw';
        $PDO_passwd='root';
        $PDO_text='mysql:host=localhost;dbname=informacje;encoding=utf8;port=3307';
        try {$db = new PDO($PDO_text, $PDO_passwd, $PDO_login);}
        catch (PDOException $e) {print "Failed to connect database!: " . $e->getMessage() . "<br/>";}
        try{
            $records = $db->query($command);
            $return=$records->fetchAll(PDO::FETCH_ASSOC);
            return $return;
        } catch (PDOException $e){
            return "DATABASE ERROR";
        }
    }
    /*
     * @param $command -> SQL COMMAND
     * Function bassicly for insert command which return only number of new,change records
     * For : INSERT INTO, UPDATE, DELETE FROM and TABLE modulators
     */
    public static function putCommand($command){
        $PDO_login='usbw';
        $PDO_passwd='root';
        $PDO_text='mysql:host=localhost;dbname=informacje;encoding=utf8;port=3307';
        try {$db = new PDO($PDO_text, $PDO_passwd, $PDO_login);}
        catch (PDOException $e) {print "Failed to connect database!: " . $e->getMessage() . "<br/>";}
        $return = $db->exec($command);
        return $return;
    }
    /*
     * Because json_encode doesn't work
     * */
    public static function convJSON($data){
        $text="[";
        for($i=0;$i<count($data);$i++){

            $text.="{";
            foreach ($data[$i] as $key => $value){
                $text.='"'.$key.'":"'.$value.'",';
            }
            $text=substr($text,0,strlen($text)-1);
            $text.="},";
        }
        $text=substr($text,0,strlen($text)-1);
        $text.="]";
        return $text;
    }
}