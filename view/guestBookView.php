<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <title>Welcome Visitor</title>
</head>

<body>
    <div class="container mt-1">
        <div class="alert alert-dismissible alert-primary mb-1 ">
            <h2 class="text-center"><img class="img-responsive" src="./img/book_p.png">
                <span>Crazy Guestbook</span>
            </h2>
            <h4> Express yourself.. but respectfully..</h4>
        </div>
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <div class="jumbotron mt-3">
                        <?php echo $userMessage ?>
                        <fieldset>
                            <legend>Your contribution..</legend>
                            <label for="name">Author name:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </fieldset>
                        <fieldset>
                            <label for="email">E-Mail:</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </fieldset>
                        <fieldset>
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </fieldset>
                        <fieldset>
                            <label for="content">Express yourself:</label>
                            <textarea class="form-control" id="content" name="content" rows="5"></textarea>
                        </fieldset>
                        <fieldset>
                            <button type="submit" class="btn btn-primary" name="send">Say anything ..</button>
                        </fieldset>
                    </div>
                </div>
                <div class="form-group col-md-8">
                    <div class="jumbotron mt-3">
                        <? echo $guestBook->getMessages(); ?>
                    </div>
                </div>

            </div>
        </form>
    </div>
</body>

</html>