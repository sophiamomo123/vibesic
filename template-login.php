
<?php
/**
 * Template Name: Login Template
 * Description: Page de connexion au style Vibesic
 */

// Traitement de la connexion
if (isset($_POST['login_submit'])) {
    $username = sanitize_text_field($_POST['log']);
    $password = $_POST['pwd'];
    $remember = isset($_POST['rememberme']);
    $login_errors = array();

    if (empty($username) || empty($password)) {
        $login_errors[] = 'Veuillez remplir tous les champs.';
    } else {
        $creds = array(
            'user_login'    => $username,
            'user_password' => $password,
            'remember'      => $remember
        );

        $user = wp_signon($creds, false);

        if (is_wp_error($user)) {
            $login_errors[] = 'Nom d\'utilisateur ou mot de passe incorrect.';
        } else {
            wp_redirect(home_url('/quiz'));
            exit;
        }
    }
}

get_header();
?>

<div class="vibesic-frontpage">
    <main class="vibesic-main">
        <!-- Personnage gauche (violet avec ampoule) -->
        <div class="side-image left-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Ampoule.svg" alt="Personnage avec ampoule">
        </div>
        
        <!-- Formulaire de connexion -->
        <div id="loginForm" class="auth-form fadein-block">
            <div class="form-container">
                <h2 class="form-title">Se connecter</h2>
                
                <?php if (isset($login_errors) && !empty($login_errors)) : ?>
                    <div class="alert-message error">
                        <?php foreach ($login_errors as $error) : ?>
                            ❌ <?= esc_html($error); ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <form method="post" action="<?= esc_url($_SERVER['REQUEST_URI']); ?>" class="vibesic-form">
                    <div class="form-group">
                        <label for="log">Nom d'utilisateur</label>
                        <input type="text" name="log" id="log" value="<?= isset($_POST['log']) ? esc_attr($_POST['log']) : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="pwd">Mot de passe</label>
                        <input type="password" name="pwd" id="pwd" required>
                    </div>
                    
                    <div class="form-group-checkbox">
                        <label class="checkbox-label">
                            <input type="checkbox" name="rememberme" id="rememberme">
                            <span>Se souvenir de moi</span>
                        </label>
                    </div>
                    
                    <button type="submit" name="login_submit" class="btn btn-orange submit-btn">CONNEXION</button>
                    
                    <div class="form-footer">
                        Vous n'avez pas de compte ? 
                        <a href="<?= esc_url(home_url('/template-register')); ?>">S'INSCRIRE</a>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Personnage droit (violet avec casque) -->
        <div class="side-image right-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Casque.svg" alt="Personnage avec casque">
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

body {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/Flou.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.vibesic-frontpage {
    min-height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 50px 20px;
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
    max-width: 280px;
}

.right-image {
    margin-left: 110px;
    margin-top: 500px;
}

.right-image img {
    max-width: 280px;
}

/* Formulaire */
.auth-form {
    max-width: 500px;
    width: 100%;
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

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="password"] {
    width: 100%;
    padding: 12px 20px;
    border: 2px solid #ddd;
    border-radius: 25px;
    font-size: 14px;
    box-sizing: border-box;
}

.form-group input:focus {
    border-color: #F6843F;
    outline: none;
}

.form-group-checkbox {
    margin-bottom: 25px;
    text-align: left;
}

.checkbox-label {
    display: flex;
    align-items: center;
    cursor: pointer;
    font-size: 14px;
    color: #666;
}

.checkbox-label input[type="checkbox"] {
    margin-right: 8px;
    width: 18px;
    height: 18px;
    cursor: pointer;
}

.checkbox-label span {
    user-select: none;
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

.alert-message.error {
    background-color: #ffe5e5;
    color: #d32f2f;
    border: 2px solid #ffcdd2;
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 25px;
    font-size: 14px;
}

/* Responsive */
@media (max-width: 600px) {
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
}
</style>

<?php
get_footer();
?>
<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoA6DQD021OlistMZC1ZlUPq8cxEN4l4p3Gm5t9UJ0Z" crossorigin="anonymous"></script>