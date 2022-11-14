<?php
    namespace server\api;
    class Restaurant extends Connector {
        public function __construct() {
            parent::__construct("restaurants", "localhost", "root", "");
        }

        public function GET_ALL() {
            return parent::GET_ALL("restaurants");
        }

        public function GET($id) {
            return parent::GET("restaurants", $id);
        }

        public function POST($data) {
            return parent::POST("restaurants", $data);
        }

        public function PUT($id, $data) {
            return parent::PUT("restaurants", $id, $data);
        }

        public function DELETE($id) {
            return parent::DELETE("restaurants", $id);
        }

        public function GET_BY_NAME($name) {
            $sql = "SELECT * FROM restaurants WHERE name = '$name'";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return null;
            }
        }

        public function GET_BY_CITY($city) {
            $sql = "SELECT * FROM restaurants WHERE city = '$city'";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return null;
            }
        }

        public function GET_BY_COUNTRY($country) {
            $sql = "SELECT * FROM restaurants WHERE country = '$country'";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return null;
            }
        }

        public function GET_BY_CITY_COUNTRY($city, $country) {
            $sql = "SELECT * FROM restaurants WHERE city = '$city' AND country = '$country'";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return null;
            }
        }

        public function GET_BY_RATING($rating) {
            $sql = "SELECT * FROM restaurants WHERE rating = $rating";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return null;
            }
        }

        public function GET_BY_CITY_RATING($city, $rating) {
            $sql = "SELECT * FROM restaurants WHERE city = '$city' AND rating = $rating";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return null;
            }
        }

        public function GET_BY_COUNTRY_RATING($country, $rating) {
            $sql = "SELECT * FROM restaurants WHERE country = '$country' AND rating = $rating";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return null;
            }
        }


        public function GET_BY_CITY_COUNTRY_RATING($city, $country, $rating) {
            $sql = "SELECT * FROM restaurants WHERE city = '$city' AND country = '$country' AND rating = $rating";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return null;
            }
        }
        
        

    }
?>