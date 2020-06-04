<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 6/4/2020
 * Time: 10:41 AM
 */

//Require our config file
require '/home/cwoodruf/config.php';

class datab
{
    private $_dbh;

    function __construct()
    {
        //Connect to database with PDO
        try {
            //Instantiate a database object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo 'Connected to database!';
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function writeOrder($order)
    {
        //var_dump($order);

        //Convert condiments array to a string
        $conds = $order->getCondiments();
        if (empty($conds)) {
            $conds = "";
        } else {
            $conds = implode(", ", $conds);
        }

        //Write to database
        //1. Define the query
        $sql = "INSERT INTO food_order (food, meal, condiments)
                VALUES (:food, :meal, :condiments)";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':food', $order->getFood());
        $statement->bindParam(':meal', $order->getMeal());
        $statement->bindParam(':condiments', $conds);

        //4. Execute the statement
        $statement->execute();

        //5. Process the results - SKIP
    }

    function getOrders()
    {
        //Read fro database
        //1. Define the query
        $sql = "SELECT * FROM food_order 
                ORDER BY date_time DESC";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters - SKIP

        //4. Execute the statement
        $statement->execute();

        //5. Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}