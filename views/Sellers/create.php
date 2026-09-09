<main class="container section">
        <h1>Register A New Seller</h1>
        <a href="/admin" class="button green-button">Back</a>


        <?php foreach($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>


        <form class="form" method="POST" action="/sellers/create">

                <?php include 'form.php' ?>
           
                <input type="submit" value="Register A New Seller" class="button green-button">
        </form>

</main>