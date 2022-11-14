<?php
    namespace server\api;

    class User extends Connector {
        public function __construct() {
            parent::__construct("users", "localhost", "root", "");
        }

        public function GET_ALL() {
            return parent::GET_ALL("users");
        }

        public function GET($id) {
            return parent::GET("users", $id);
        }

        public function POST($data) {
            return parent::POST("users", $data);
        }

        public function PUT($id, $data) {
            return parent::PUT("users", $id, $data);
        }

        public function DELETE($id) {
            return parent::DELETE("users", $id);
        }

        public function GET_BY_USERNAME($username) {
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return null;
            }
        }

        public function GET_BY_EMAIL($email) {
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return null;
            }
        }

    }
?>