<?php
    require 'includes/app.php';
    $db = connectionDb();
    //authenticate

    $errors = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));        
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email) {
            $errors[] = "Email is required and must be valid ";
        }

        if(!$password){
            $errors[] = "Password is required and must meet the criteria";
        }

        if(empty($errors)){
            //check if the user exist
            $query = "SELECT * FROM users WHERE email = '{$email}'";
            $result = mysqli_query($db, $query);
            
            if($result->num_rows){
                //check if the password is correct
                $user = mysqli_fetch_assoc($result);

                //validate if the password is correct
                $auth = password_verify($password, $user['password']);

                if($auth){
                    //the user is in the db
                    session_start();

                    //fill the array of the session
                    $_SESSION['user'] = $user['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');


                } else {
                    $errors[] = "The password is incorrect";
                }

            } else {
                $errors[] = "The user doesn't exist";
            }
        }
    }



    //get the header
    includeTemplates('header');
?>


    <main class="container section content-center">
        <h1>Login for manage</h1>

        <?php foreach($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
            <?php endforeach; ?>

        <form method="POST" class="form">
        <fieldset>
                <legend>Email & Password</legend>

                <label for="email">E-mail</label>
                <input name="email" type="email" placeholder="Your E-mail" id="email">

                <label for="password">Password</label>
                <input name="password" type="password" placeholder="Your password" id="password">
                
            </fieldset>

            <input type="submit" value="Login" class="green-button button">

        </form>


    </main>

    <?php 
    includeTemplates('footer');
?>