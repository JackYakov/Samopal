<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 16.07.2017
 * Time: 6:37
 */
require_once 'action/abstract.php';

class ActionArticle extends ActionAbstract {

    public $title = 'article';

    public $viewTemplate = 'view/article.phtml';

    public function run(){
        $query = 'SELECT * FROM article ORDER BY id';
        $dbLink = DbConnect::getInstance()->getLink();
        if ($result = mysqli_query($dbLink, $query)){
            while ($row = $result->fetch_assoc()) {
                echo '<span class="title">'.$row['tetle'].'</span><p>'.$row['news'].'</p><p>'.$row['ahtor'].'</p>';
            }
            echo '</div>';

        }
        mysqli_close($dbLink);
    }

}
