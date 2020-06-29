<?php
    $dsn = 'mysql:dbname=sample_db;host=localhost;';
    $user = 'sasaki';
    $password = 'sasaki';
    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];

        $sql="update user set name=:name, age=:age where id=:id";
        $pstmt = $dbh->prepare($sql);
        $params = array(':id'=> $id, ':name'=> $name, ':age'=> $age);
        $pstmt->execute($params);

        header('Location: index.php?flg=1');
        
    } catch (PDOException $e) {
        header('Location: index.php?flg=2?error='.$e->getMessage());
        exit();
    }
?>