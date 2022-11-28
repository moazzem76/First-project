<?php
require_once 'inc/header.php';

?>

<section class="p-2 main-section mb-5">
    <main class="container">
        <h2>Home page</h2><?php echo $_SESSION['user_id']?>

    </main>

</section>

<?php require_once 'inc/footer.php';?>