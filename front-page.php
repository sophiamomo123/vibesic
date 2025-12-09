<?php
/**
 * Template Name: Front Page
 * Description: Page d'accueil Vibesic
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
    <?php if (is_user_logged_in()) : ?>
<div class="background-image">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/background-blob.png" alt="">
</div>

        <!-- Version connectée -->
        <main class="vibesic-main">
            <div id="homeViewConnected">
                <div class="welcome-message">
                    <p>Bienvenue <strong><?= esc_html(wp_get_current_user()->display_name); ?></strong>!</p>
                </div>
                
                <h1 class="main-title">
                    <span class="highlight">Découvrez</span><br>
                    la musique instrumentale par <br>
                    votre humeur du jour
                </h1>
                
                <div class="action-buttons">
                    <a href="<?php echo home_url('/quiz'); ?>" class="btn btn-explore">EXPLORER</a>
                </div>
            </div>
        </main>
        
    <?php else : ?>
        <div class="background-image">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/background-blob.png" alt="">
</div>
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
                            <a href="#" onclick="showLogin(); return false;">connectez-vous</a>
                        </div>
                    </form>
                   
            </div>
            
            <!-- Formulaire de connexion (caché par défaut) -->
            <div id="loginForm" class="auth-form" style="display: none;">
                <div class="form-container">
                    <h2 class="form-title">Connectez-vous</h2>
                    <form method="post" action="<?= esc_url(wp_login_url()); ?>">
                        <div class="form-group">
                            <label for="log">Nom d'utilisateur</label>
                            <input type="text" name="log" id="log" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mot de passe</label>
                            <input type="password" name="pwd" id="pwd" required>
                        </div>
                        <input type="hidden" name="redirect_to" value="<?= esc_url(home_url('/quiz')); ?>">
                        <button type="submit" class="btn btn-orange submit-btn">CONNEXION</button>
                        <div class="form-footer">
                            Vous n'avez pas de compte ? 
                            <a href="#" onclick="showSignup(); return false;">inscrivez-vous</a>
                        </div>
                    </form> 
            </div>
        </main>
    <?php endif; ?>
    
    <!-- Section Objectifs -->
    <section class="objectives-section">
        <div class="objectives-container">
            <h2 class="objectives-title">Nos objectifs ?</h2>
            
            <div class="objectives-cards">
                <div class="objective-card">
                    <h3 class="card-title">Fonctionnels</h3>
                    <ul class="card-list">
                        <li>Proposer une expérience musicale personnalisée</li>
                        <li>Simplifier la découverte musicale</li>
                        <li>Rendre l'expérience fun et intuitive</li>
                        <li>Encourager un usage quotidien</li>
                    </ul>
                </div>
                
                <div class="objective-card">
                    <h3 class="card-title">Utilisateurs</h3>
                    <ul class="card-list">
                        <li>Comprendre son humeur et se sentir accompagné</li>
                        <li>Créer un espace personnel musical</li>
                        <li>Découvrir, explorer, s'évader</li>
                        <li>Vivre une expérience positive et personnalisée</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Section Inscription -->
    <section class="signup-promo-section">
        <div class="promo-container">
            <div class="promo-text">
                <h2>Inscris-toi en un clin d'œil et débloque l'accès complet à toute la bibliothèque !</h2>
                <p>Feuillette, découvre, explore... et surtout enregistre tes musiques préférées pour les retrouver à tout moment.</p>
            </div>
            <div class="promo-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/character.png" alt="Personnage Vibesic">
            </div>
        </div>
    </section>
</div>

<style>
.vibesic-frontpage {
    min-height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 50px 20px;
    background-color: #ffffff;
}


.vibesic-frontpage {
    position: relative;
    overflow: hidden;
}

.background-image {
    position: absolute;
    top: -3%;
    left: 50%;
    transform: translateX(-50%);
    width: 1300px;
    height: auto;
    z-index: 0;
    opacity: 2.7;
    animation: blobFloat 15s ease-in-out infinite;
}

.background-image img {
    width: 100%;
    
    height: auto;
    filter: blur(20px);
}

@keyframes blobFloat {
    0%, 100% {
        transform: translateX(-50%) translateY(0);
    }
    50% {
        transform: translateX(-50%) translateY(30px);
    }
}


.vibesic-main {
    text-align: center;
    max-width: 1200px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 72px;
    position: relative;
z-index: 1;
}

.welcome-message {
    margin-bottom: 30px;
    font-size: 18px;
    color: #000000;
}

.welcome-message strong {
    color: #ff7f50;
    font-weight: bold;
}

.main-title {
    font-size: 57px;
    line-height: 1.3;
    margin-bottom: 40px;
    font-weight: bold;
    color: #000;
}

.main-title .highlight {
    font-size: 78px;
}

.action-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 50px;
}

.btn {
    padding: 10px 45px;
    margin-top: 10px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
    font-size: 16px;
    transition: all 0.3s ease;
    display: inline-block;
    cursor: pointer;
    border: 2px solid transparent;
    gap: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-explore {
    background-color: transparent;
    color: #ff7f50;
    border: 2px solid #ff7f50;
}

.btn-explore:hover {
    background-color: #ff7f50;
    color: white;
}

.btn-orange {
    background-color: #ff7f50;
    color: white;
    border: 2px solid #ff7f50;
    display: flex;
    align-items: center;
    justify-content: center;
     padding: 10px 45px;

}

.btn-orange:hover {
    background-color: #ff6a3d;
    border-color: #ff6a3d;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(255, 127, 80, 0.3);
}

.btn-outline {
    background-color: transparent;
    color: #ff7f50;
    border: 2px solid #ff7f50;
}

.btn-outline:hover {
    background-color: #ff7f50;
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
    max-width: 500px;
    width: 100%;
    margin: 0 auto;
}

.form-container {
    background-color: white;
    padding: 50px;
    border-radius: 15px;
    width: 100%;
}

.form-title {
    color: #ff7f50;
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
    border-color: #ff7f50;
}

.submit-btn {
    width: 100%;
    margin-top: 10px;
    letter-spacing: 2px;
}

.form-footer {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: #666;
}

.form-footer a {
    color: #ff7f50;
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
    
    .form-container {
        padding: 30px 20px;
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
    font-size: 46px;
    font-weight: bold;
    color: #000;
    margin-bottom: 30px;
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
    background-color: #ff7f50;
    padding: 50px 45px;
    border-radius: 25px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.card-title {
    font-size: 32px;
    font-weight: bold;
    color: #ffffff;
    margin-bottom: 30px;
    font-family: 'Coolvetica', Arial, sans-serif;
    text-decoration: underline;
}

.card-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.card-list li {
    color: #ffffff;
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
    font-family: 'Coolvetica', sans-serif;
}

.promo-text p {
    font-size: 18px;
    color: #333;
    line-height: 1.6;
    font-family:"Musticapro", sans-serif;
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


