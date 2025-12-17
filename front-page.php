
<?php
/**
 * Template Name: Front Page
 * Description: Page d'accueil Vibesic
 */


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
                    <span class="highlight">Découvrez</span> <br>La musique
                    instrumentale par <br>
                    votre humeur du jour
                </h1>
                
                <div class="action-buttons fadein-block">
                    <a href="<?php echo home_url('/quiz'); ?>" class="btn btn-explore">EXPLORER</a>
                </div>
            </div>
        </main>
        
    <?php else : ?>
        <!-- Version non connectée -->
        <main class="vibesic-main">
            <div id="homeView">
                <h1 class="main-title fadein-title">
                    <span class="highlight">Découvrez</span><br>La musique
                     instrumentale par<br>
                    votre humeur du jour
                </h1>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var title = document.querySelector('.fadein-title');
                    if(title) {
                        setTimeout(function() {
                            title.classList.add('fadein-visible');
                        }, 200);
                    }
                });
                </script>
                
                <div class="action-buttons fadein-block">
                    <a href="<?php echo home_url('/quiz'); ?>" class="btn btn-explore">EXPLORER</a>
                </div>
            </div>

            
        
    <?php endif; ?>
</div>

<!-- Section Nos Objectifs -->
<section class="objectifs-section">
    <div class="objectifs-container">
        <h2 class="objectifs-title">Nos objectifs ?</h2>
        
        <div class="objectifs-cards">
                <!-- Carte Fonctionnels -->
                <div class="objectif-card fadein-block" id="fonctionnels-card">
                    <h3 class="card-title">Fonctionnels</h3>
                    <ul class="card-list">
                        <li>Proposer une expérience musicale personnalisée</li>
                        <li>Simplifier la découverte musicale</li>
                        <li>Rendre l'expérience fun et intuitive</li>
                        <li>Encourager un usage quotidien</li>
                    </ul>
                </div>
                <!-- Carte Utilisateurs -->
                <div class="objectif-card fadein-block" id="utilisateurs-card">
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
            <div class="cta-text fadein-block">
                <h3>Inscris-toi en un clin d'œil et débloque l'accès complet à toute la bibliothèque !</h3>
                <p>FEUILLETTE, DÉCOUVRE, EXPLORE ... <br> et surtout enregistre tes musiques préférées pour les retrouver à tout moment.</p>
            </div>
            <div class="cta-illustration">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Inscription.svg" alt="Inscription">
            </div>
        </div>
    </div>
</section>


                <style>
                /* MOBILE FIRST */
                .vibesic-frontpage {
                    min-height: calc(100vh - 200px);
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    padding: 30px 10px;
                    background-color: transparent;
                    position: relative;
                    overflow: hidden;
                }
                .vibesic-frontpage::before {
                    content: '';
                    position: absolute;
                    top: -10%;
                    left: -10%;
                    width: 300px;
                    height: 300px;
                    background: radial-gradient(circle, rgba(246, 133, 63, 0.49) 0%, rgba(246, 132, 63, 0) 70%);
                    filter: blur(60px);
                    z-index: -1;
                    animation: float 8s ease-in-out infinite;
                }
                .vibesic-frontpage::after {
                    content: '';
                    position: absolute;
                    bottom: -10%;
                    right: -10%;
                    width: 350px;
                    height: 350px;
                    background: radial-gradient(circle, rgba(246, 133, 63, 0.49) 0%, rgba(246, 132, 63, 0) 70%);
                    filter: blur(70px);
                    z-index: -1;
                    animation: float 10s ease-in-out infinite reverse;
                }
                @keyframes float {
                    0%, 100% { transform: translate(0, 0); }
                    50% { transform: translate(30px, -30px); }
                }
                .vibesic-main {
                    text-align: center;
                    width: 100%;
                    max-width: 100vw;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .welcome-message {
                    margin-bottom: 20px;
                    font-size: 16px;
                    color: #000;
                }
                .welcome-message strong {
                    color: #ff7f50;
                    font-weight: bold;
                }
                .main-title {
                    font-size: 32px;
                    line-height: 1.3;
                    margin-bottom: 24px;
                    font-weight: bold;
                    color: #000;
                    font-family: 'coolvetica', sans-serif;
                    font-weight: 400;
                    font-style: normal;
                    letter-spacing: 5px;
                }
                .highlight {
                    font-size: 55px;
                    color: #F6843F;
                    letter-spacing: 4px;
                    line-height: 1.4;
                }
                .action-buttons {
                    display: flex;
                    flex-direction: column;
                    gap: 16px;
                    justify-content: center;
                    align-items: center;
                    margin-bottom: 30px;
                }
                .btn {
                    padding: 10px 24px;
                    border-radius: 25px;
                    text-decoration: none;
                    font-weight: bold;
                    font-size: 14px;
                    transition: all 0.3s ease;
                    display: inline-block;
                    cursor: pointer;
                    border: 2px solid transparent;
                    color: black;
                }
                .btn-explore {
        
            color: black;
            border: 2px solid #F6843F;
            gap: 10px;
            padding: 9px 45px;
            border-radius: 25px;
            cursor: pointer;
                    background-color: transparent;
                    
                }
                .btn-explore:hover {
                    background-color: #F6843F;
                    color: black;
                }
                .btn-orange {
                    background-color: #F6843F;
                    color: black;
                    border: 2px solid #F6843F;
                    font-weight: bold;
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
                    padding: 12px 16px;
                    border-radius: 10px;
                    margin-bottom: 18px;
                    font-size: 13px;
                    line-height: 1.7;
                }
                .alert-message.error {
                    background-color: #fff;
                    color: #d32f2f;
                    border: 2px solid #fff;
                }
                .auth-form {
                    max-width: 100%;
                    width: 100%;
                    margin: 0 auto;
                }
                .form-container {
                    background-color: rgba(255, 255, 255, 0.95);
                    border-radius: 16px;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.07);
                    padding: 20px 10px;
                    margin: 0 auto 20px auto;
                }
                .form-title {
                    font-size: 22px;
                    font-weight: bold;
                    margin-bottom: 16px;
                    color: #F6843F;
                    font-family: 'Coolvetica', sans-serif;
                }
                .form-group {
                    margin-bottom: 16px;
                    text-align: left;
                }
                .form-group label {
                    display: block;
                    margin-bottom: 6px;
                    font-weight: bold;
                    color: #333;
                }
                .form-group input {
                    width: 100%;
                    padding: 8px;
                    border-radius: 8px;
                    border: 1px solid #ccc;
                    font-size: 15px;
                    background: #f9f9f9;
                }
                .objectifs-section {
                 padding: 40px 60px 80px;
                 background-color: transparent;
}
                .objectifs-container {
                    max-width: 1200px;
                    margin: 0 auto;
                    
                    padding: 0 10px;
                }
                .objectifs-title {
                    font-size: 28px;
                    color: #1b1b1bff;
                    margin-bottom: 60px;
                    text-align: center;
                    font-family: 'Coolvetica', sans-serif;
                     letter-spacing: 6px;
                    
                }
                .objectifs-cards {
                      display: grid;
                      grid-template-columns: 1fr;
                      gap: 2rem;
                      margin-bottom: 30px;   
                      max-width: 100%;
                    margin: 0 auto 30px auto;
                }

                .objectif-card {
                    background: #ffffffff;
                    border-radius: 16px;
                    box-shadow: 0 2px 10px rgba(246, 132, 63, 0.08);
                    padding: 20px;
                    text-align: left;
                    transition: box-shadow 0.3s;
                    border : 1px solid #F6843F;
                    margin-bottom: 7px;
                }
                .objectif-card:hover {
                    box-shadow: 0 6px 24px rgba(246, 132, 63, 0.18);
                }

                .fadein-block {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 1.2s cubic-bezier(.4,0,.2,1), transform 1.2s cubic-bezier(.4,0,.2,1);
}
.fadein-block.fadein-visible {
    opacity: 1;
    transform: translateY(0);
}




                .card-title {
                    font-size: 18px;
                    color: #F6843F;
                    margin-bottom: 12px;
                    font-family: 'Coolvetica', sans-serif;
                    letter-spacing: 4px;
                }
                .card-list {
                   
                    padding: 0;
                    margin: 0;
                }
                .card-list li {
                    font-size: 15px;
                    margin-bottom: 8px;
                    color: #333;
                }
                .inscription-cta {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    margin-top: 30px;
                    gap: 20px;
                }
                .cta-text {
                    flex: 1;
    line-height: 2.5;
                }
                .cta-text h3 {
                    font-size: 19px;
                    font-weight: bold;
                    margin-bottom: 12px;
                    line-height: 1.2;
                    color: #000;
                    font-family: 'Coolvetica', sans-serif;
                    letter-spacing: 2px;
                }
                .cta-text p {
                    font-size: 15px;
                    line-height: 1.5;
                    color: #000;
                }
                .cta-illustration {
                    flex: 0 0 180px;
                    margin-top: 20px;
                    width: 180px;
                }
                .cta-illustration img {
                    width: 100%;
                    height: auto;
                }
                @media (max-width: 480px) {
    .logo-image {
        height: 22px;
    }

    .header-btn {
        padding: 6px 12px; 
        font-size: 11px; 
        border-radius: 14px; 
    }

    .header-nav {
        flex-direction: row !important;
        gap: 8px;
        align-items: center;
        justify-content: flex-end;
    }
}
                /* TABLET */
                @media (min-width: 768px) {
                    .main-title { font-size: 40px; }
                    .highlight { font-size: 80px; }
                    .action-buttons { flex-direction: row; gap: 20px; }
                    .objectifs-cards { grid-template-columns: 1fr 1fr; gap: 30px; }
                    .inscription-cta { flex-direction: row; text-align: left; gap: 40px; }
                    .cta-illustration { width: 300px; margin-top: 60px; }
                    .cta-text h3 { font-size: 28px; }
                    .cta-text p { font-size: 18px; }
                }
                /* DESKTOP */
                @media (min-width: 1024px) {
                    .vibesic-main { max-width: 1200px; }
                    .main-title { font-size: 45px; }
                     .main-title { line-height: 1; }
                    .objectifs-section { padding: 60px 0 40px 0; }
                    .objectifs-title { font-size: 35px; }
                    .objectif-card { padding: 30px; }
                    .card-title { font-size: 24px; }
                    .card-list li { font-size: 18px; }
                    .cta-text h3 { font-size: 25px; }
                    .cta-illustration { width: 370px; }
                    
                }
                
                </style>
    
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


<?php if (isset($_POST['signup_submit']) && isset($errors) && !empty($errors)) : ?>
    document.addEventListener('DOMContentLoaded', function() {
        showSignup();
    });

<?php endif; ?>
</script>


<?php
get_footer();
?>