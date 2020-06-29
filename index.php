<?php
    $dsn = 'mysql:dbname=sample_db;host=localhost;';
    $user = 'sasaki';
    $password = 'sasaki';
    try {
        $dbh = new PDO($dsn, $user, $password);
        $sql="select * from user;";
        $result = $dbh->query($sql);
        $result2 = $dbh->query($sql);

    } catch (PDOException $e) {
        echo "接続失敗: " . $e->getMessage() . "\n";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>LAMP SAMPLE PAGE</title>
</head>
<body class="pt-10">
    <nav class="navbar bg-dark navbar-dark fixed-top">
        <div class="container-fruid">
            <div class="nav-header">
                <a href="index.html" class="navbar-brand">LAMP SAMPLE PAGE</a>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">DB Manager -sample_DB-</h1>
            <p>LAMP環境を構築し、データベース管理Webアプリを作成しています。<br>
                デザインはBootstrapを使用</p>
        </div>
    </div>

    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#select" class="nav-link active" data-toggle="tab">Select</a>
            </li>
            <li class="nav-item">
                <a href="#insert" class="nav-link" data-toggle="tab">Insert</a>
            </li>
            <li class="nav-item">
                <a href="#update" class="nav-link" data-toggle="tab">Update</a>
            </li>
            <li class="nav-item">
                <a href="#delete" class="nav-link" data-toggle="tab">Delete</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="select">
                <table class="table table-hover mt-1">
                    <caption>sample_table list</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped">
                        <?php foreach($result as $value){ ?>
                            <tr>
                                <td><?php echo "$value[id]"; ?></td>
                                <td><?php echo "$value[name]"; ?></td>
                                <td><?php echo "$value[age]"; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="insert">
                <form action="./insert.php" method="post">
                    <div class="form-group row">
                        <label for="id" class="col-sm2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm2 col-form-label">NAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-sm2 col-form-label">AGE</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="age" name="age">
                        </div>
                    </div>
                    <div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary btn-block">Insert</button>
						</div>
					</div>
                </form>
            </div>
            <div class="tab-pane" id="update">
                <form action="./update.php" method="post">
                    <div class="form-group row">
                        <label for="id" class="col-sm2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm2 col-form-label">NAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-sm2 col-form-label">AGE</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="age" name="age">
                        </div>
                    </div>
                    <div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary btn-block">Insert</button>
						</div>
					</div>
                </form>
            </div>
            <div class="tab-pane" id="delete">
                <table class="table table-hover mt-1">
                    <caption>sample_table list</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped">
                        <?php foreach($result2 as $value){ ?>
                            <tr>
                                <td><?php echo "$value[id]"; ?></td>
                                <td><?php echo "$value[name]"; ?></td>
                                <td><?php echo "$value[age]"; ?></td>
                                <td>
                                    <form action="./delete.php" method="get">
                                        <input type="hidden" name="id" id="id" value="<?php echo "$value[id]"; ?>">
                                        <button class="btn btn-danger" type="submit"></button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
