/
<?php
/**
 * Template Name: Register Template
 * Description: Page d'inscription 
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

    <?php else : ?>
        <!-- Formulaire d'inscription -->
        <main class="vibesic-main">
            <div class="auth-form fadein-block">
                <div class="form-container">
                        <div class="form-blur-bg"></div>
                    <h2 class="form-title">Créer un compte</h2>
                    
                    <?php if (isset($errors) && !empty($errors)) : ?>
                        <div class="alert-message error">
                            <?php foreach ($errors as $error) : ?>
                                ❌ <?= esc_html($error); ?><br>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div style="display: flex; align-items: flex-start; gap: 32px;">
                        <div class="register-icons" style="display: flex; flex-direction: column; gap: 24px; align-items: flex-end; justify-content: flex-start; min-width: 70px;">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Ordi.svg" alt="Ordi" style="width:48px; height:auto;">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Crayon.svg" alt="Crayon" style="width:36px; height:auto;">
                        </div>
                        <div style="flex:1;">
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
                                     <a href="#" onclick="showLoginForm(); return false;">Se connecter</a>
                                </div>
                                <script>
                                function showLoginForm() {
                                    document.querySelector('.form-container').style.display = 'none';
                                    document.getElementById('loginForm').style.display = 'block';
                                }
                                </script>
                               
                                <script>
                                function showSignupForm() {
                                    document.getElementById('loginForm').style.display = 'none';
                                    document.querySelector('.form-container').style.display = 'block';
                                }
                                </script>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    <?php endif; ?>
</div>




<style>
/

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
    color: #F6843F;
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
    padding: 9px 45px;
    gap: 10px;
}

.btn-orange {
    background-color: #F6843F;
    color: white;
    border: 2px solid #F6843F;
    padding: 9px 45px;
    gap: 10px;
}

.btn-orange:hover {
    background-color: #F6843F;
    border-color: #F6843F;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(255, 127, 80, 0.3);
    padding: 10px 40px;
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
    border-color: #F6843F;
}

.submit-btn {
    width: 100%;
    margin-top: 10px;
    border: none;
    padding: 10px 40px;

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
