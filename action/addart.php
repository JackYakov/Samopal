<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 17.07.2017
 * Time: 16:50
 */
require_once 'action/abstract.php';

class AddArt extends ActionAbstract{

    public $title = 'article add';
    public $viewTemplate = 'view/addart.phtml';

    public function run(){
        $dbLink = DbConnect::getInstance()->getLink();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Title = (string)isset($_POST['Title']) ? trim($_POST['Title']) : '';
            $Articletext = (string)isset($_POST['news']) ? trim($_POST['news']) : '';

            $query = "insert INTO article (id ,tetle, news) VALUES (NULL, ?,?)";
            $stmt = mysqli_prepare($dbLink, $query);

                /* связываем параметры с метками */
                mysqli_stmt_bind_param($stmt, "ss", $Title, $Articletext);

            var_dump($Title, $Articletext);

                /* запускаем запрос */
                mysqli_stmt_execute($stmt);

            }

        mysqli_close($dbLink);
    }
}