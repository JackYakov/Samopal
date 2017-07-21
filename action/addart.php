<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 17.07.2017
 * Time: 16:50
 */
require_once 'action/abstract.php';
require_once 'action/users.php';

class AddArt extends ActionAbstract{

    public $title = 'article add';
    public $viewTemplate = 'view/addart.phtml';
    public function run(){
       if (Users::getFlag() == "a"){
            $dbLink = DbConnect::getInstance()->getLink();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $Title = (string)isset($_POST['Title']) ? trim($_POST['Title']) : '';
                $Articletext = (string)isset($_POST['news']) ? trim($_POST['news']) : '';
                $query = "insert INTO article (id ,tetle, news, ahtor) VALUES (NULL, ?,?,?)";
                $stmt = mysqli_prepare($dbLink, $query);

                    /* связываем параметры с метками */
                    mysqli_stmt_bind_param($stmt, "sss", $Title, $Articletext, Users::getName());


                    /* запускаем запрос */
                    mysqli_stmt_execute($stmt);

                }

            mysqli_close($dbLink);
        } else {
           echo "Вы не можете добавлять записи" ;
       }
    }
}