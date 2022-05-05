<?php
    class Database
    {
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $db = "wp_db";

        protected $connection;

        // Create connection to the database. If connection failed, display error message.
        public function __construct()
        {
            // check if connection exists, if there is none, create one
            if (!isset($this->connection)) {
                $this->connection = new mysqli($this->host, $this->username, $this->password, $this->db);
                
                // if failed to create connection
                if (!$this->connection) {
                    echo 'Cannot connect to database server';
                    exit;
                }            
            }   
            // if there is connection, return it 
            return $this->connection;
        }

        function read($query)
        {
            $conn = $this->__construct();
            $result = mysqli_query($conn, $query);

            if(!$result)
            {
                return false;
            }
            else
            {
                $data = false;
                while ($row = mysqli_fetch_assoc($result))
                {
                    $data[] = $row;
                }

                return $data;
            }
        }

        function save($query)
        {
            $conn = $this->__construct();
            $result = mysqli_query($conn, $query);

            if(!$result)
            {
                return false;
            }
            else 
            {
                return true;;
            }
        }

        // function write($query)
        // {
        //     $conn = $this->__construct();
        //     $result = mysqli_query($conn, $query);

        //     if(!$result)
        //     {
        //         return false;
        //     }
        //     else 
        //     {
        //         return true;;
        //     }
        // }
    }
?>