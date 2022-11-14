<?php
    namespace server\api;
    class Connector {
        private $database;
        private $host;
        private $user;
        private $password;
        private $connection;

        public function __construct($database, $host, $user, $password) {
            $this->database = $database;
            $this->host = $host;
            $this->user = $user;
            $this->password = $password;
        }

        public function connect() {
            $this->connection = new \mysqli($this->host, $this->user, $this->password, $this->database);
            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }
        }

        public function getConnection() {
            return $this->connection;
        }

        public function close() {
            $this->connection->close();
        }

        public function GET($table, $id) {
            $sql = "SELECT * FROM $table WHERE id = $id";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return null;
            }
        }

        public function GET_ALL($table) {
            $sql = "SELECT * FROM $table";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return null;
            }
        }

        public function POST($table, $data) {
            $sql = "INSERT INTO $table (";
            $keys = array_keys($data);
            $values = array_values($data);
            for ($i = 0; $i < count($keys); $i++) {
                $sql .= $keys[$i];
                if ($i < count($keys) - 1) {
                    $sql .= ", ";
                }
            }
            $sql .= ") VALUES (";
            for ($i = 0; $i < count($values); $i++) {
                $sql .= "'" . $values[$i] . "'";
                if ($i < count($values) - 1) {
                    $sql .= ", ";
                }
            }
            $sql .= ")";
            if ($this->connection->query($sql) === TRUE) {
                return $this->connection->insert_id;
            } else {
                return null;
            }
        }


        public function PUT($table, $id, $data) {
            $sql = "UPDATE $table SET ";
            $keys = array_keys($data);
            $values = array_values($data);
            for ($i = 0; $i < count($keys); $i++) {
                $sql .= $keys[$i] . " = '" . $values[$i] . "'";
                if ($i < count($keys) - 1) {
                    $sql .= ", ";
                }
            }
            $sql .= " WHERE id = $id";
            if ($this->connection->query($sql) === TRUE) {
                return $id;
            } else {
                return null;
            }
        }


        public function DELETE($table, $id) {
            $sql = "DELETE FROM $table WHERE id = $id";
            if ($this->connection->query($sql) === TRUE) {
                return $id;
            } else {
                return null;
            }
        }
    }
?>