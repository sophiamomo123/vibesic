<?php
/**
 * Template Name: Index Page
 */

// Traitement de l'inscription
if (isset($_POST['signup_submit'])) {
    $username = sanitize_user($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $signup_errors = array();

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $signup_errors[] = 'Veuillez remplir tous les champs.';
    }
    if ($password !== $confirm_password) {
        $signup_errors[] = 'Les mots de passe ne correspondent pas.';
    }
    if (username_exists($username)) {
        $signup_errors[] = 'Ce nom d\'utilisateur existe déjà.';
    }
    if (email_exists($email)) {
        $signup_errors[] = 'Cet email est déjà utilisé.';
    }

    if (empty($signup_errors)) {
        $user_id = wp_create_user($username, $password, $email);
        if (!is_wp_error($user_id)) {
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);
            wp_redirect(home_url('/quiz'));
            exit;
        } else {
            $signup_errors[] = 'Erreur lors de la création du compte.';
        }
    }
}

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
    <?php if (is_user_logged_in()) : ?>
        <!-- Si l'utilisateur est déjà connecté -->
        <main class="vibesic-main">
            <div class="auth-form">
                <div class="form-container">
                    <h2 class="form-title">Déjà connecté</h2>
                    <div class="success-box">
                        <p>✅ Vous êtes déjà connecté en tant que <strong><?= esc_html(wp_get_current_user()->display_name); ?></strong></p>
                        <div class="action-buttons">
                            <a href="<?= esc_url(home_url('/quiz')); ?>" class="btn btn-orange">QUIZ</a>
                            <a href="<?= esc_url(wp_logout_url(home_url())); ?>" class="btn btn-outline">SE DÉCONNECTER</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
    <?php else : ?>
        <!-- Formulaires pour utilisateur non connecté -->
        <main class="vibesic-main">

            <div class="side-image left-image">
                <img id="leftImage" src="<?php echo get_template_directory_uri(); ?>/assets/images/Ordi.svg" alt="Personnage">
            </div>
            
            <!-- Formulaire d'inscription -->
            <div id="signupForm" class="auth-form">
                <div class="form-container">
                    <h2 class="form-title">Créer un compte</h2>
                    
                    <?php if (isset($signup_errors) && !empty($signup_errors)) : ?>
                        <div class="alert-message error">
                            <?php foreach ($signup_errors as $error) : ?>
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
                            <a href="#" onclick="showLogin(); return false;">SE CONNECTER</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Formulaire de connexion -->
            <div id="loginForm" class="auth-form" style="display: none;">
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
                            <a href="#" onclick="showSignup(); return false;">S'INSCRIRE</a>
                        </div>
                    </form>
                </div>
            </div>

            
            <div class="side-image right-image">
                <img id="rightImage" src="<?php echo get_template_directory_uri(); ?>/assets/images/Crayon.svg" alt="Personnage">
            </div>
            
        </main>
    <?php endif; ?>
</div>

<style>

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

/* Images sur les côtés du formulaire */
.side-image {
    display: flex;
    align-items: center;
    justify-content: center;
}

.side-image img {
    max-width: 150px;
    width: 100%;
    height: auto;
    
}

.left-image {
    margin-right: 110px;
    margin-top: 500px;
    
   
}

.left-image img {
    max-width: 200px; /* Plus petit que l'image droite */
   
}

.right-image {
    margin-left: 110px;
    margin-top: 500px;
   
}

.success-box {
    text-align: center;
    padding: 20px 0;
}

.success-box p {
    font-size: 16px;
    color: #333;
    margin-bottom: 30px;
}

.success-box strong {
    color: #F6843F;
    font-weight: bold;
}

.action-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
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
    padding: 9px 45px;
    gap: 10px;
}

.btn-orange {
    background-color: #F6843F;
    color: white;
    border: none;
    padding: 9px 45px;
    gap: 10px;
}

.btn-orange:hover {
    background-color: #F6843F;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(255, 127, 80, 0.3);
    padding: 9px 45px;
    gap: 10px;
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

.alert-message.error {
    background-color: #ffe5e5;
    color: #d32f2f;
    border: 2px solid #ffcdd2;
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 25px;
}

.auth-form {
    max-width: 500px;
    width: 100%;
}

.form-container {
    background-color: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    padding: 50px;
    border-radius: 15px;
    box-shadow: 0 8px 32px #f6853f66;
    border: 1px solid #f6853f74;
    margin-bottom: 130px;
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

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="password"] {
    width: 100%;
    padding: 12px 20px;
    border: 2px solid #ddd;
    border-radius: 12px;
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
    color: #F6843F;
    text-decoration: none;
    font-weight: bold;
}

.form-footer a:hover {
    text-decoration: underline;
}

/* Responsive - cacher les images sur tablette et mobile */
@media (max-width: 1024px) {
    .side-image {
        display: none;
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

<script>
// Chemins des images
const templateUri = '<?php echo get_template_directory_uri(); ?>';
const signupImages = {
    left: templateUri + '/assets/images/Ordi.svg',
    right: templateUri + '/assets/images/Crayon.svg'
};
const loginImages = {
    left: templateUri + '/assets/images/Ampoule.svg',
    right: templateUri + '/assets/images/Casque.svg'
};

// Basculer vers le formulaire de connexion
function showLogin() {
    document.getElementById('signupForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'block';
    
    // Changer les images
    document.getElementById('leftImage').src = loginImages.left;
    document.getElementById('rightImage').src = loginImages.right;
    
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Basculer vers le formulaire d'inscription
function showSignup() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('signupForm').style.display = 'block';
    
    // Changer les images
    document.getElementById('leftImage').src = signupImages.left;
    document.getElementById('rightImage').src = signupImages.right;
    
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Afficher le bon formulaire si erreur
<?php if (isset($login_errors) && !empty($login_errors)) : ?>
    document.addEventListener('DOMContentLoaded', function() {
        showLogin();
    });
<?php endif; ?>

<?php if (isset($signup_errors) && !empty($signup_errors)) : ?>
    document.addEventListener('DOMContentLoaded', function() {
        showSignup();
    });
<?php endif; ?>
</script>

<?php
get_footer();
?>