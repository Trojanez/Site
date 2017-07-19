<?php

require_once 'action/abstract.php';

class ActionAddpost extends ActionAbstract {

    public $viewTemplate = 'view/addpost.phtml';

    public function run() {
    	$this->title = 'addpost';
    	if ($_SERVER['REQUEST_METHOD']) == 'POST'){
		$addpost = (string)isset($_POST['posts']) ? trim($_POST['posts']) : '';
		$dat = date("Y-m-d");

			/* создаем подготавливаемый запрос */
			$dbLink = DbConnect::getInstance()->getLink();
			if($stmt = mysqli_prepare($dbLink, "INSERT INTO post(date, posts) VALUES(?, ?)")) {
				/* связываем параметры с метками */
                mysqli_stmt_bind_param($stmt, "ss", $addpost, $dte);

                /* запускаем запрос */
                mysqli_stmt_execute($stmt);

                /* закрываем запрос */
                mysqli_stmt_close($stmt);
			}
			$this->addpost = $addpost;
		}
    }
}
