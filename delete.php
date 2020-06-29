<?php
    $dsn = 'mysql:dbname=sample_db;host=localhost;';
    $user = 'sasaki';
    $password = 'sasaki';
    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_GET['id'];

        $sql="delete from user where id=:id";
        $pstmt = $dbh->prepare($sql);
        $params = array(':id'=> $id);
        $pstmt->execute($params);

        header('Location: index.php?flg=1');
        
    } catch (PDOException $e) {
        header('Location: index.php?flg=2?error='.$e->getMessage());
        exit();
    }
?>