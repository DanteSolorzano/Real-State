<main class="container section content-center">
        <h1>Login for manage</h1>

        <?php foreach($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
            <?php endforeach; ?>

        <form method="POST" class="form" action="/login">
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