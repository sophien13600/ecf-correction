<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <script src="../bootstrap.min.js"></script>
</head>

<body>
    <h1>Page de connexion</h1>
    <form action="../src/controllers/admin_controller.php" method="POST">
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name=email class="form-control" id="staticEmail">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name=password>
            </div>
        </div>
        <div class="mb-3 row">
            <button class="btn btn-primary">
                Se connecter
            </button>
        </div>

    </form>
</body>

</html>