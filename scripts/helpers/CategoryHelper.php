<?php

class CategoryHelper
{

    /**
     * Method which gets all categories
     * @return array Array with categories data.
     */
    public static function getCategories()
    {
        $stmt = Database::getInstance()->getConnection()->prepare("SELECT * FROM category");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

}