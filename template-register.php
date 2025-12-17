<?php
/**
 * Template Name: Register Template
 * Description: Page d'inscription 
 */

// Traitement de l'inscription
if (isset($_POST['signup_submit'])) {
    $username = sanitize_user($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $errors = array();

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $errors[] = 'Veuillez remplir tous les champs.';
    }
    if ($password !== $confirm_password) {
        $errors[] = 'Les mots de passe ne correspondent pas.';
    }
    if (username_exists($username)) {
        $errors[] = 'Ce nom d\'utilisateur existe déjà.';
    }
    if (email_exists($email)) {
        $errors[] = 'Cet email est déjà utilisé.';
    }

    if (empty($errors)) {
        $user_id = wp_create_user($username, $password, $email);
        if (!is_wp_error($user_id)) {
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);
            wp_redirect(home_url('/quiz'));
            exit;
        } else {
            $errors[] = 'Erreur lors de la création du compte.';
        }
    }
}

get_header();
?>

<div class="vibesic-frontpage">
    <main class="vibesic-main">
        <!-- Personnage gauche -->
        <div class="side-image left-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Ordi.svg" alt="Personnage avec ordinateur">
        </div>
        
        <!-- Formulaire d'inscription -->
        <div class="auth-form fadein-block">
            <div class="form-container">
                <h2 class="form-title">Créer un compte</h2>
                
                <?php if (isset($errors) && !empty($errors)) : ?>
                    <div class="alert-message error">
                        <?php foreach ($errors as $error) : ?>
                            ❌ <?= esc_html($error); ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <form method="post" action="<?= esc_url($_SERVER['REQUEST_URI']); ?>" class="vibesic-form">
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" name="username" id="username" value="<?= isset($_POST['username']) ? esc_attr($_POST['username']) : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" name="email" id="email" value="<?= isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm_password">Confirmer le mot de passe</label>
                        <input type="password" name="confirm_password" id="confirm_password" required>
                    </div>
                    
                    <button type="submit" name="signup_submit" class="btn btn-orange submit-btn">S'INSCRIRE</button>
                    
                    <div class="form-footer">
                        Vous avez déjà un compte ? 
                        <a href="<?= esc_url(home_url('/page-login')); ?>">SE CONNECTER</a>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Personnage droit -->
        <div class="side-image right-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Crayon.svg" alt="Personnage avec crayon">
        </div>
    </main>
</div>

<style>
/* Animation fade-in */
.fadein-block {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease forwards;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.vibesic-frontpage {
    min-height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 50px 20px;
    background-color: transparent;
}

.vibesic-main {
    text-align: center;
    max-width: 1400px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0;
}

/* Images sur les côtés */
.side-image {
    display: flex;
    align-items: center;
    justify-content: center;
}

.side-image img {
    width: 100%;
    height: auto;
}

.left-image {
    margin-right: 110px;
    margin-top: 500px;
}

.left-image img {
    max-width: 200px;
}

.right-image {
    margin-left: 110px;
    margin-top: 500px;
}

.right-image img {
    max-width: 180px;
}

/* Formulaire */
.auth-form {
    max-width: 500px;
    width: 100%;
    margin: 0 auto;
}

.form-container {
    background-color: rgba(255, 255, 255, 0.95);
    padding: 50px;
    border-radius: 18px;
    box-shadow: 0 0 10px #F6843F;
    position: relative;
    z-index: 2;
}

.form-title {
    color: #F6843F;
    font-size: 28px;
    margin-bottom: 30px;
    text-align: center;
    font-weight: bold;
    font-family: 'Coolvetica', sans-serif;
    letter-spacing: 2px;
}

.vibesic-form {
    width: 100%;
}

.form-group {
    margin-bottom: 20px;
    text-align: left;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    font-size: 14px;
    color: #333;
}

.form-group input {
    width: 100%;
    padding: 12px 20px;
    border: 2px solid #ddd;
    border-radius: 25px;
    font-size: 14px;
    outline: none;
    transition: border-color 0.3s;
    box-sizing: border-box;
}

.form-group input:focus {
    border-color: #F6843F;
}

.btn {
    padding: 12px 30px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
    font-size: 14px;
    transition: all 0.3s ease;
    display: inline-block;
    cursor: pointer;
    border: none;
    font-family: 'Coolvetica', sans-serif;
    letter-spacing: 2px;
}

.btn-orange {
    background-color: #F6843F;
    color: white;
    padding: 12px 45px;
}

.btn-orange:hover {
    background-color: #e57330;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(255, 127, 80, 0.3);
}

.submit-btn {
    width: 100%;
    margin-top: 10px;
}

.form-footer {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: #666;
}

.form-footer a {
    color: #F6843F;
    text-decoration: none;
    font-weight: bold;
}

.form-footer a:hover {
    text-decoration: underline;
}

.alert-message {
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 25px;
    font-size: 14px;
    line-height: 1.8;
}

.alert-message.error {
    background-color: #ffe5e5;
    color: #d32f2f;
    border: 2px solid #ffcdd2;
}

/* Responsive */
@media (max-width: 1024px) {
    .side-image {
        display: none;
    }
    
    .vibesic-main {
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .form-container {
        padding: 30px 25px;
    }

    .form-title {
        font-size: 24px;
    }
}

@media (max-width: 480px) {
    .vibesic-frontpage {
        padding: 30px 15px;
    }

    .form-container {
        padding: 30px 20px;
    }
}
</style>

<?php
get_footer();
?>
<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoA6DQD021OlistMZC1ZlUPq8cxEN4l4p3Gm5t9UJ0Z" crossorigin="anonymous"></script>