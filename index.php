<?php
/**
 * Template Name: Index Page
 * Description: Page d'accueil Vibesic
 */

// Traitement de l'inscription
$signup_error = null;
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
    <?php if (is_user_logged_in()) : ?>
        <!-- Si l'utilisateur est déjà connecté -->
        <main class="vibesic-main">
            <div class="auth-form">
                <div class="form-container">
                    <h2 class="form-title">Déjà connecté</h2>
                    <div class="success-box">
                        <p>✅ Vous êtes déjà connecté en tant que <strong><?= esc_html(wp_get_current_user()->display_name); ?></strong></p>
                        <div class="action-buttons">
                            <a href="<?= esc_url(home_url('/quiz')); ?>" class="btn btn-orange">ALLER AU QUIZ</a>
                            <a href="<?= esc_url(wp_logout_url(home_url())); ?>" class="btn btn-outline">SE DÉCONNECTER</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    <?php else : ?>
        <!-- Formulaire d'inscription -->
        <main class="vibesic-main">
            <div class="auth-form">
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
                            <a href="<?= esc_url(home_url('/login')); ?>">connectez-vous</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    <?php endif; ?>
</div>

<style>
/* Fond pour la page d'inscription */
body.page-template-template-register {
    background-image: url('http://vibesic.local/wp-content/uploads/2025/12/Flou.png');
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
    background-color: transparent;
}

.vibesic-main {
    text-align: center;
    max-width: 1200px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.success-box {
    text-align: center;
    padding: 20px 0;
}

.success-box p {
    font-size: 16px;
    color: #333;
    margin-bottom: 30px;
    line-height: 1.6;
}

.success-box strong {
    color: #ff7f50;
    font-weight: bold;
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

.btn-orange {
    background-color: #ff7f50;
    color: white;
    border: 2px solid #ff7f50;
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
    background-color: rgba(255, 255, 255, 0.95);
    padding: 50px;
    border-radius: 15px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
    width: 100%;
}

.form-title {
    color: #ff7f50;
    font-size: 28px;
    margin-bottom: 30px;
    text-align: center;
    font-weight: bold;
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
}

.form-group input:focus {
    border-color: #ff7f50;
}

.submit-btn {
    width: 100%;
    margin-top: 10px;
    border: none;
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

    .action-buttons {
        flex-direction: column;
    }

    .btn {
        width: 100%;
    }
}
</style>

<?php
get_footer();
?>










get_header();
?>

<div class="vibesic-frontpage">
    <?php if (is_user_logged_in()) : ?>
        <!-- Version connectée -->
        <main class="vibesic-main">
            <div id="homeViewConnected">
                <div class="welcome-message">
                    <p>Bienvenue <strong><?= esc_html(wp_get_current_user()->display_name); ?></strong>!</p>
                </div>
                
                <h1 class="main-title">
                    <span class="highlight">Découvrez</span> <br>la musique
                    instrumentale par <br>
                    votre humeur du jour
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
                    <span class="highlight">Découvrez</span><br>la musique
                     instrumentale par<br>
                    votre humeur du jour
                </h1>
                
                <div class="action-buttons">
                    <a href="<?php echo home_url('/quiz'); ?>" class="btn btn-explore">EXPLORER</a>
                </div>
            </div>
        </main>
    <?php endif; ?>
</div>
<!-- Section Nos Objectifs -->
<section class="objectifs-section">
    <div class="objectifs-container">
        <h2 class="objectifs-title">Nos objectifs ?</h2>
        
        <div class="objectifs-cards">
            <!-- Carte Fonctionnels -->
            <div class="objectif-card">
                <h3 class="card-title">Fonctionnels</h3>
                <ul class="card-list">
                    <li>Proposer une expérience musicale personnalisée</li>
                    <li>Simplifier la découverte musicale</li>
                    <li>Rendre l'expérience fun et intuitive</li>
                    <li>Encourager un usage quotidien</li>
                </ul>
            </div>
            
            <!-- Carte Utilisateurs -->
            <div class="objectif-card">
                <h3 class="card-title">Utilisateurs</h3>
                <ul class="card-list">
                    <li>Comprendre son humeur et se sentir accompagné</li>
                    <li>Créer un espace personnel musical</li>
                    <li>Découvrir, explorer, s'évader</li>
                    <li>Vivre une expérience positive et personnalisée</li>
                </ul>
            </div>
        </div>
        
        <!-- Section inscription -->
        <div class="inscription-cta">
            <div class="cta-text">
                <h3>Inscris-toi en un clin d'œil et débloque l'accès complet à toute la bibliothèque !</h3>
                <p>Feuillette, découvre, explore... et surtout enregistre tes musiques préférées pour les retrouver à tout moment.</p>
            </div>
            <div class="cta-illustration">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bonhomme.png" alt="Inscription">
            </div>
        </div>
    </div>
</section>


</style>

<script>
// Redirect to login page
function showLogin() {
    window.location.href = '<?php echo esc_url(home_url('/template-login')); ?>';
}

// Redirect to signup page
function showSignup() {
    window.location.href = '<?php echo esc_url(home_url('/template-register')); ?>';
}
</script>

<?php
get_footer();
?>