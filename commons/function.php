<?php
//Kết nối CSDL (PDO)
function connect() {
    $host = DB_HOST;
    $port = DB_PORT;
    $name = DB_NAME;

    try {
        $conn = new PDO(
            "mysql:host=$host;port=$port;dbname=$name",
            DB_USERNAME,
            DB_PASSWORD
        );

        //cài đặt chế độ báo lỗi của PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //cài đặt dữ liệu trả về
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed" . $e->getMessage();
    }
}
?>
