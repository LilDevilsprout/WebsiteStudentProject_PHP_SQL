<?php
session_start();

$erreur = $_SESSION["erreur"] ?? "";
unset($_SESSION["erreur"]);
?>

<!DOCTYPE html>
<html>
    <?php include 'includes/header.php'; ?>

    <body>
        <?php include 'includes/bodyHeader.php'; ?>

        <div class="form-container animForm">
            <div>
                <h2 class="title">Connectez-vous !</h2>
            </div>

            <div class="message-error <?= !empty($erreur) ? 'visible' : '' ?>">
                <ul>
                    <?php if (!empty($erreur)) : ?>
                        <li><?=  htmlspecialchars($erreur) ?></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="message-succes"></div>
            
            <div>
            <form id="loginForm" action="login.php" method="POST">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <div>
                    <button type="button" onclick="window.location.href='inscription.php'">S'inscrire</button>
                <button type="submit">Se connecter</button>
                </div>

                <div class="animLoader"></div>
            </form>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>
    </body>
</html>