<?php
/**
 * Template Name: Register Page
 * Description: Page d'inscription (formulaire seul)
 */

get_header();
?>

<div class="vibesic-frontpage">
    <main class="vibesic-main">
        <div class="auth-form">
            <div class="form-container">
                <h2 class="form-title">Créer un compte</h2>
                
                <?php
                // Traitement de l'inscription
                $errors = array();
                if (isset($_POST['signup_submit'])) {
                    $username = sanitize_user($_POST['username']);
                    $email = sanitize_email($_POST['email']);
                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];

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
                ?>
                
                <?php if (!empty($errors)) : ?>
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
</div>

<style>
    /* Fond pour la page d'inscription */
    body.page-template-page-register {
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
