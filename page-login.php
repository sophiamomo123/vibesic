<?php
/**
 * Template Name: Login Page
 * Description: Page de connexion (formulaire seul)
 */

get_header();
?>

<div class="vibesic-frontpage">
    <main class="vibesic-main">
        <div class="auth-form">
            <div class="form-container">
                <h2 class="form-title">Connectez-vous</h2>
                
                <?php
                // Traitement de la connexion
                $login_error = null;
                if (isset($_POST['login_submit'])) {
                    $username = sanitize_user($_POST['log']);
                    $password = $_POST['pwd'];

                    if (empty($username) || empty($password)) {
                        $login_error = 'empty';
                    } else {
                        $user = wp_authenticate($username, $password);
                        if (is_wp_error($user)) {
                            $login_error = 'failed';
                        } else {
                            wp_set_current_user($user->ID);
                            wp_set_auth_cookie($user->ID);
                            wp_redirect(home_url('/quiz'));
                            exit;
                        }
                    }
                }
                ?>
                
                <?php if (isset($login_error)) : ?>
                    <div class="alert-message <?= $login_error === 'failed' ? 'error' : 'warning'; ?>">
                        <?php if ($login_error === 'failed') : ?>
                            ❌ Nom d'utilisateur ou mot de passe incorrect.
                        <?php elseif ($login_error === 'empty') : ?>
                            ⚠️ Veuillez remplir tous les champs.
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
                <form method="post" action="<?= esc_url($_SERVER['REQUEST_URI']); ?>" class="vibesic-form">
                    <div class="form-group">
                        <label for="log">Nom d'utilisateur</label>
                        <input type="text" name="log" id="log" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mot de passe</label>
                        <input type="password" name="pwd" id="pwd" required>
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
</div>

<style>
    /* Fond pour la page de connexion */
    body.page-template-page-login {
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
        background-color: #ffffff;
    }

    .vibesic-main {
        text-align: center;
        max-width: 1200px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
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
        cursor: pointer;
    }

    .btn {
        padding: 12px 30px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
        transition: all 0.3s ease;
        display: inline-block;
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

    .alert-message.warning {
        background-color: #fff3cd;
        color: #856404;
        border: 2px solid #ffeaa7;
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
    }
</style>

<?php
get_footer();
?>
