<?php

require_once 'action/abstract.php';

class ActionAddpost extends ActionAbstract {

    public $viewTemplate = 'view/addpost.phtml';

    public function run() {
			/* создаем подготавливаемый запрос */
			$dbLink = DbConnect::getInstance()->getLink();

			$stmt = mysqli_query($dbLink, "SELECT * FROM post WHERE (date = ?, posts = ?)"));
				while ($row = $stmt->mysqli_fetch_all($stmt, MYSQLI_ASSOC))
                    print_r($row);
    }
}
