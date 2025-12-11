<?php
/**
 * Template Name: Login Template
 * Description: Page de connexion au style Vibesic
 */

// Traitement de la connexion
$login_error = null;
if (isset($_POST['login_submit'])) {
    $username = sanitize_text_field($_POST['log']);
    $password = $_POST['pwd'];
    $remember = isset($_POST['rememberme']);

    if (empty($username) || empty($password)) {
        $login_error = 'empty';
    } else {
        $creds = array(
            'user_login'    => $username,
            'user_password' => $password,
            'remember'      => $remember
        );

        $user = wp_signon($creds, false);

        if (is_wp_error($user)) {
            $login_error = 'failed';
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
                            <a href="<?= esc_url(home_url('/quiz')); ?>" class="btn btn-orange">ALLER AU QUIZ</a>
                            <a href="<?= esc_url(wp_logout_url(home_url())); ?>" class="btn btn-outline">SE DÉCONNECTER</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    <?php else : ?>
        <!-- Formulaire de connexion -->
        <main class="vibesic-main">
            <div class="auth-form">
                <div class="form-container">
                    <h2 class="form-title">Connectez-vous</h2>
                    
                    <?php if (isset($login_error)) : ?>
                        <div class="alert-message <?= $login_error === 'failed' ? 'error' : 'warning'; ?>">
                            <?php if ($login_error === 'failed') : ?>
                                ❌ Nom d'utilisateur ou mot de passe incorrect.
                            <?php elseif ($login_error === 'empty') : ?>
                                ⚠️ Veuillez remplir tous les champs.
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" class="vibesic-form">
                        <div class="form-group">
                            <label for="user_login">Nom d'utilisateur</label>
                            <input 
                                type="text" 
                                name="log" 
                                id="user_login" 
                                value="<?= isset($_POST['log']) ? esc_attr($_POST['log']) : ''; ?>"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="user_password">Mot de passe</label>
                            <input 
                                type="password" 
                                name="pwd" 
                                id="user_password" 
                                required>
                        </div>
                        <div class="form-group-checkbox">
                            <label class="checkbox-label">
                                <input type="checkbox" name="rememberme" id="rememberme">
                                <span>Se souvenir de moi</span>
                            </label>
                        </div>
                        <button type="submit" name="login_submit" class="btn btn-orange submit-btn">SE CONNECTER</button>
                        <div class="form-footer">
                            Vous n'avez pas de compte ? 
                            <a href="<?= esc_url(home_url('/register')); ?>">inscrivez-vous</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    <?php endif; ?>
</div>

<style>
/* Fond pour la page de connexion */
body.page-template-template-login {
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
    line-height: 1.5;
}

.alert-message.error {
    background-color: #ffe5e5;
    color: #d32f2f;
    border: 2px solid #ffcdd2;
}

.alert-message.warning {
    background-color: #fff3cd;
    color: #856404;
    border: 2px solid #ffeaa7;
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

.form-group-checkbox {
    margin-bottom: 25px;
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
    border: none;
}

.form-footer {
    text-align: center;
    margin-top: 25px;
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
