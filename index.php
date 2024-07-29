<?php include('todolist.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Aplikasi PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-2">
        <h2 class="text-center">Contoh Aplikasi Menggunakan PHP</h2>

        <div class="row">
            <div class="col-6">
                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tambahkan Task List" aria-label="Tambahkan Task List" aria-describedby="basic-addon2" id="to_do_list_input" name="task">
                        <button class="input-group-text" type="submit">+</button>
                    </div>
                    <p class="text-danger">
                        <?= $message; ?>
                    </p>
                </form>
            </div>
        </div>

        <h6 class="text-center">TO DO LIST</h6>

        <ul id="to_do_list">
            <?php foreach ($todos as $todo) : ?>
                <li class="d-flex justify-content-between my-2">
                    <span class="text-lg"> <?= $todo['task']; ?></span>
                    <form method="post">
                        <input type="hidden" value="<?= $todo['id']; ?>" name="delete_id" />
                        <button type="submit" class="ml-4 btn btn-danger text-light">x</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>