<?php

class CreateDB
{
    public $SERVER;
    public $USERNAME;
    public $PASSWORD;
    public $DBNAME;
    public $TABLENAME;
    public $CON;

    // Class constractor
    public function __construct(
        $DBNAME = "library",
        $TABLENAME = "user",
        $SERVER = "localhost",
        $USERNAME = "root",
        $PASSWORD = ""

    )
    {
        $this->SERVER= $SERVER;
        $this->USERNAME= $USERNAME;
        $this->PASSWORD= $PASSWORD;
        $this->DBNAME= $DBNAME;
        $this->TABLENAME= $TABLENAME;

        // Create Connection
        $this->CON = mysqli_connect($SERVER, $USERNAME, $PASSWORD);

        // Check validation
        if(!$this->CON){
            die("Connection failed: \n" . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $DBNAME";

        // execute query
        if(mysqli_query($this->CON,$sql)){
            $this->CON = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DBNAME);

            // Creat tables
            $sqluser = "CREATE TABLE IF NOT EXISTS $TABLENAME 
                (id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                user_name varchar(100),
                user_username varchar(16),
                user_password	varchar(16),
                user_email	varchar(100),
                user_role	int(10),
                user_verifystats	int(10),
                user_lastlogin	timestamp,
                user_avatarURL	varchar(3000)
                )";

            if(!mysqli_query($this->CON, $sql)){
                echo "Error creating table" . mysqli_error(($this->CON));
            }
            else{
                return false;
            }
        }
    }
}

?>