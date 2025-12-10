<?php
/**
 * Template Name:  inscription
 * Description: Page inscription Vibesic
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
            wp_redirect(home_url('/quiz')); // ✅ Redirection vers le quiz
            exit;
        } else {
            $errors[] = 'Erreur lors de la création du compte.';
        }
    }
}

get_header();
?>

<div class="vibesic-frontpage">
    <!-- Blob animé en arrière-plan -->
    <div class="background-blob"></div>
    
    <?php if (is_user_logged_in()) : ?>
        <!-- Version connectée -->
        <main class="vibesic-main">
            <div id="homeViewConnected">
                <div class="welcome-message">
                    <p>Bienvenue <strong><?= esc_html(wp_get_current_user()->display_name); ?></strong>!</p>
                </div>
                
                <h1 class="main-title">
                    <span class="highlight">Découvrez</span><br>
                    la musique instrumentale par votre<br>
                    humeur du jour
                </h1>
                
                <div class="action-buttons">
                    <a href="<?php echo home_url('/quiz'); ?>" class="btn btn-explore">EXPLORER</a>
                </div>
            </div>
        </main>
        
    <?php else : ?>
        <!-- Version non connectée -->
        <main class="vibesic-main">
            <div id="homeView">
                <h1 class="main-title">
                    <span class="highlight">Découvrez</span><br>
                    la musique instrumentale par<br>
                    votre humeur du jour
                </h1>
                
                <div class="action-buttons">
                    <a href="<?php echo home_url('/quiz'); ?>" class="btn btn-explore">EXPLORER</a>
                </div>
            </div>
            
            <!-- Formulaire d'inscription (caché par défaut) -->
            <div id="signupForm" class="auth-form" style="display: none;">
                <div class="signup-page-layout">
                    <div class="character-left">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/character-laptop.png" alt="Personnage avec ordinateur">
                    </div>
                    
                    <div class="form-container-center">
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
                                <label for="email">Adresse mail</label>
                                <input type="email" name="email" id="email" value="<?= isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Créer un mot de passe</label>
                                <input type="password" name="password" id="password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirmer le mot de passe</label>
                                <input type="password" name="confirm_password" id="confirm_password" required>
                            </div>
                            <button type="submit" name="signup_submit" class="btn btn-orange submit-btn">S'INSCRIRE</button>
                            <div class="form-footer">
                                Vous avez déjà un compte ? 
                                <a href="#" onclick="showLogin(); return false;">connectez-vous</a>
                            </div>
                        </form>
                    </div>
                    
                    <div class="character-right">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/character-pencil.png" alt="Personnage avec crayon">
                    </div>
                </div>
            </div>
            
            <!-- Formulaire de connexion (caché par défaut) -->
            <div id="loginForm" class="auth-form" style="display: none;">
                <div class="signup-page-layout">
                    <div class="character-left">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/character-thinking.png" alt="Personnage réfléchissant">
                    </div>
                    
                    <div class="form-container-center">
                        <h2 class="form-title">Connectez-vous</h2>
                        <form method="post" action="<?= esc_url(wp_login_url()); ?>">
                            <div class="form-group">
                                <label for="log">Nom d'utilisateur</label>
                                <input type="text" name="log" id="log" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd_login">Adresse mail</label>
                                <input type="email" name="user_email" id="pwd_login" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Mot de passe</label>
                                <input type="password" name="pwd" id="pwd" required>
                            </div>
                            <input type="hidden" name="redirect_to" value="<?= esc_url(home_url('/quiz')); ?>">
                            <button type="submit" class="btn btn-orange submit-btn">SE CONNECTER</button>
                            <div class="form-footer">
                                Vous n'avez pas de compte ? 
                                <a href="#" onclick="showSignup(); return false;">inscrivez-vous</a>
                            </div>
                        </form>
                    </div>
                    
                    <div class="character-right">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/character-music.png" alt="Personnage avec casque">
                    </div>
                </div>
            </div>

            
        </main>
    <?php endif; ?>

<style>
.vibesic-frontpage {
    min-height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 50px 20px;
    background-color: #ffffff;
    position: relative;
    overflow: hidden;
}

/* Blob animé en arrière-plan */
.background-blob {
    position: absolute;
    top: -10%;
    left: 50%;
    transform: translateX(-50%);
    width: 800px;
    height: 800px;
    background: radial-gradient(circle, 
        rgba(255, 127, 80, 0.15) 0%, 
        rgba(255, 182, 145, 0.08) 40%, 
        rgba(255, 255, 255, 0) 70%);
    border-radius: 50%;
    filter: blur(80px);
    animation: blobFloat 15s ease-in-out infinite;
    z-index: 0;
}

@keyframes blobFloat {
    0%, 100% {
        transform: translateX(-50%) translateY(0) scale(1);
    }
    33% {
        transform: translateX(-45%) translateY(-20px) scale(1.05);
    }
    66% {
        transform: translateX(-55%) translateY(20px) scale(0.95);
    }
}

.vibesic-main {
    text-align: center;
    max-width: 1200px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 80px;
    position: relative;
    z-index: 1;
}

.welcome-message {
    margin-bottom: 30px;
    font-size: 18px;
    color: #000000;
}

.welcome-message strong {
    color: #F6843F;
    font-weight: bold;
}

.main-title {
    font-size: 55px;
    line-height: 1.3;
    margin-bottom: 40px;
    font-weight: bold;
    color: #000;
}

.highlight {
    
}

.action-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 50px;
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
    border: 2px solid transparent;
}

.btn-explore {
    background-color: transparent;
    color: #F6843F;
    border: 2px solid #F6843F;
    padding: 10px 40px;
}

.btn-explore:hover {
    background-color: #F6843F;
    color: white;
}

.btn-orange {
    background-color: #F6843F;
    color: white;
    border: 2px solid #F6843F;
}

.btn-orange:hover {
    background-color: #F6843F;
    border-color: #F6843F;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(255, 127, 80, 0.3);
}

.btn-outline {
    background-color: transparent;
    color: #F6843F;
    border: 2px solid #F6843F;
}

.btn-outline:hover {
    background-color: #F6843F;
    color: white;
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

.auth-form {
    max-width: 100%;
    width: 100%;
    margin: 0 auto;
    min-height: calc(100vh - 200px);
    display: flex;
    align-items: center;
    justify-content: center;
}

.signup-page-layout {
    display: grid;
    grid-template-columns: 1fr 2fr 1fr;
    gap: 40px;
    align-items: center;
    width: 100%;
    max-width: 1400px;
    padding: 50px 20px;
}

.character-left,
.character-right {
    display: flex;
    justify-content: center;
    align-items: flex-end;
}

.character-left img,
.character-right img {
    max-width: 250px;
    height: auto;
}

.form-container-center {
    background-color: transparent;
    padding: 0;
    border-radius: 0;
    box-shadow: none;
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
}

.form-title {
    color: #F6843F;
    font-size: 28px;
    margin-bottom: 30px;
    text-align: center;
    font-weight: bold;
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
}

.form-group input:focus {
    border-color: #F6843F;
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

/* Responsive */
@media (max-width: 768px) {
    .main-title {
        font-size: 32px;
    }
    
    .action-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn {
        width: 100%;
        max-width: 300px;
    }
    
    .form-container-center {
        padding: 30px 20px;
    }
    
    .signup-page-layout {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .character-left,
    .character-right {
        display: none;
    }
}

@media (max-width: 480px) {
    .main-title {
        font-size: 24px;
    }
    
    .vibesic-frontpage {
        padding: 30px 15px;
    }
}

/* Section Objectifs */
.objectives-section {
    background-color: #ffffff;
    padding: 80px 20px;
}

.objectives-container {
    max-width: 1400px;
    margin: 0 auto;
}

.objectives-title {
    font-size: 48px;
    font-weight: bold;
    color: #000;
    margin-bottom: 40px;
    font-family: 'Coolvetica', Arial, sans-serif;
}

.objectives-cards {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 50px;
    max-width: 1200px;
    margin: 0 auto;
}

.objective-card {
    background-color: #ffffffff;
    padding: 50px 45px;
    border-radius: 25px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    border: 5px solid #F6843F;
}

.card-title {
    font-size: 32px;
    font-weight: bold;
    color: #000000ff;
    margin-bottom: 30px;
    font-family: 'Coolvetica', Arial, sans-serif;
    text-decoration: underline;
    text-underline-offset: 8px;
}

.card-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.card-list li {
    color: #000000ff;
    font-size: 18px;
    line-height: 2;
    margin-bottom: 18px;
    padding-left: 30px;
    position: relative;
    font-weight: 500;
}

.card-list li:before {
    content: "•";
    position: absolute;
    left: 0;
    font-size: 24px;
    color: #ffffff;
}

/* Section Inscription Promo */
.signup-promo-section {
    background-color: #ffffff;
    padding: 80px 20px;
}

.promo-container {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 60px;
    align-items: center;
}

.promo-text h2 {
    font-size: 32px;
    font-weight: bold;
    color: #000;
    margin-bottom: 20px;
    line-height: 1.4;
    font-family: 'Coolvetica', Arial, sans-serif;
}

.promo-text p {
    font-size: 18px;
    color: #333;
    line-height: 1.6;
}

.promo-image {
    display: flex;
    justify-content: center;
    align-items: center;
}

.promo-image img {
    max-width: 100%;
    height: auto;
    max-height: 400px;
}

/* Responsive Objectifs */
@media (max-width: 768px) {
    .objectives-title {
        font-size: 32px;
        margin-bottom: 30px;
    }
    
    .objectives-cards {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    
    .objective-card {
        padding: 30px;
    }
    
    .card-title {
        font-size: 24px;
    }
    
    .card-list li {
        font-size: 15px;
    }
    
    .promo-container {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .promo-text h2 {
        font-size: 24px;
    }
    
    .promo-text p {
        font-size: 16px;
    }
    .promo-image  {
        max-height: 400px;
        margin-top: 40px;
    }
}
</style>

<script>
function showSignup() {
    document.getElementById('homeView').style.display = 'none';
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('signupForm').style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function showLogin() {
    document.getElementById('homeView').style.display = 'none';
    document.getElementById('signupForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function backToHome() {
    document.getElementById('homeView').style.display = 'block';
    document.getElementById('signupForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'none';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Si le formulaire a été soumis avec des erreurs, afficher le formulaire d'inscription
<?php if (isset($_POST['signup_submit']) && isset($errors) && !empty($errors)) : ?>
    document.addEventListener('DOMContentLoaded', function() {
        showSignup();
    });
<?php endif; ?>
</script>

<?php
get_footer();
?>



