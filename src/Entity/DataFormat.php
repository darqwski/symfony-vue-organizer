<?php
/**
 * Created by PhpStorm.
 * User: Darqwski
 * Date: 2018-06-12
 * Time: 22:44
 */

namespace App\Entity;


abstract class DataFormat extends PDOController
{
    abstract static public function getRequest();
    abstract static public function deleteRequest();
    abstract static public function addRequest();
    abstract static public function updateRequest();
    abstract static public function makeRequest($type);
}