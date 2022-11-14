<?php
    namespace server\api;
    class Review extends Connector {
        public function __construct() {
            parent::__construct("reviews", "localhost", "root", "");
        }
        public function GET_ALL() {
            return parent::GET_ALL("reviews");
        }
        public function GET($id) {
            return parent::GET("reviews", $id);
        }
        public function POST($data) {
            return parent::POST("reviews", $data);
        }
        public function PUT($id, $data) {
            return parent::PUT("reviews", $id, $data);
        }
        public function DELETE($id) {
            return parent::DELETE("reviews", $id);
        }

        public function GET_BY_USER($id) {
            $sql = "SELECT * FROM reviews WHERE user_id = $id";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return null;
            }
        }

        public function GET_BY_RESTAURANT($id) {
            $sql = "SELECT * FROM reviews WHERE restaurant_id = $id";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return null;
            }
        }

        public function GET_BY_USER_RESTAURANT($user_id, $restaurant_id) {
            $sql = "SELECT * FROM reviews WHERE user_id = $user_id AND restaurant_id = $restaurant_id";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return null;
            }
        }

        public function GET_BY_RESTAURANT_RATING($restaurant_id, $rating) {
            $sql = "SELECT * FROM reviews WHERE restaurant_id = $restaurant_id AND rating = $rating";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return null;
            }
        }

        
    }

?>