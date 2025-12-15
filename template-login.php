<?php
/**
 * Template Name:  Login Template
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

    <?php else : ?>
            <!-- Formulaire de connexion -->
            <div id="loginForm" class="auth-form fadein-block" style="display: none;">
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
                            <a href="#" onclick="showSignup(); return false;">S'inscrire</a>
                        </div>
                    </form>
                </div>
            </div>
            
        </main>
    <?php endif; ?>
</div>



<style>

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
    padding: 10px 40px;
    gap: 10px;
}

.btn-orange {
    background-color: #F6843F;
    color: white;
    border: none;
    padding: 10px 40px;
    gap: 10px;
    font-size: 14px;
}

.btn-orange:hover {
    background-color: #F6843F;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(255, 127, 80, 0.3);
    padding: 10px 40px;
    gap: 10px;
    font-size: 14px;
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
    padding: 50px;
    border-radius: 15px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
    width: 100%;
     box-shadow: 0 0 0 4px #C84545, 0 0 0 8px #84B82A, 0 0 0 12px #FCE977, 0 0 0 16px #26A9D8;
    border-radius: 18px;
    background: #fff;
    position: relative;
    z-index: 2;
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

.submit-btn {
    width: 100%;
    margin-top: 10px;
    padding: 10px 40px;
    gap: 10px;
    font-size: 14px;
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
// Basculer vers le formulaire de connexion
function showLogin() {
    document.getElementById('signupForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Basculer vers le formulaire d'inscription
function showSignup() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('signupForm').style.display = 'block';
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
