
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
                
                <div class="action-buttons">
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
                
                <div class="action-buttons">
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


.vibesic-frontpage {
    min-height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 50px 20px;
    background-color: transparent;
    
}

.vibesic-frontpage {
    min-height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 50px 20px;
    position: relative;
    overflow: hidden;
}

/* Formes floues en arrière-plan */
.vibesic-frontpage::before {
    content: '';
    position: absolute;
    top: -10%;
    left: -10%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(246, 133, 63, 0.32) 0%, rgba(246, 132, 63, 0) 70%);
    filter: blur(80px);
    z-index: -1;
    animation: float 8s ease-in-out infinite;
}

.vibesic-frontpage::after {
    content: '';
    position: absolute;
    bottom: -10%;
    right: -10%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(246, 133, 63, 0.3) 0%, rgba(246, 132, 63, 0) 70%);
    filter: blur(90px);
    z-index: -1;
    animation: float 10s ease-in-out infinite reverse;
}

/* Animation flottante */
@keyframes float {
    0%, 100% {
        transform: translate(0, 0);
    }
    50% {
        transform: translate(30px, -30px);
    }
}
.vibesic-main {
    text-align: center;
    max-width: 1200px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
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
    font-size: 50px;
    line-height: 1.3;
    margin-bottom: 40px;
    font-weight: bold;
    color: #000;  
    font-family: 'coolvetica', sans-serif;
    font-weight: 400;
    font-style: normal;
    letter-spacing: 8px;
    line-height: 1.2;
}     

    
.highlight {
    font-size: 100px;
    color: #F6843F;
    letter-spacing: 5px;
    line-height: 1.8;
    
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

.btn-explore {
    background-color: transparent;
    color: #F6843F;
    border: 2px solid #F6843F;
    gap: 10px;
    padding: 9px 45px;
    font-size: 20px;
    border-radius: 100px;
}

.btn-explore:hover {
    background-color: #F6843F;
    color: white;
    padding: 12px 45px;
    gap: 10px;
}

.btn-orange {
    background-color: #F6843F;
    color: white;
    gap: 7px;
    padding: 9px 45px;
    border: 2px solid #F6843F;
}

.btn-orange:hover {
    background-color: #F6843F;
    border-color: #F6843F;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(255, 127, 80, 0.3);
    gap: 9px;
    padding: 12px 45px;
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
    background-color: #ffffffff;
    color: #d32f2f;
    border: 2px solid #ffffffff;
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

/* Section Nos Objectifs */
.objectifs-section {
    padding: 40px 60px 80px;
    background-color: transparent;
}

.objectifs-container {
    max-width: 1200px;
    margin: 0 auto;
}

.objectifs-title {
    font-size: 39px;
    letter-spacing: 6px;
    margin-bottom: 60px;
    font-family: 'Coolvetica', sans-serif;
    color: #000;
    text-align: center;
}

.objectifs-cards {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        margin-bottom: 80px;
        align-items: stretch;
}



.objectif-card {
    background: white;
    border: 2px solid #F6843F;
    border-radius: 25px;
    padding: 40px;
    box-shadow: 8px 8px 0px rgba(246, 133, 63, 0.22);
}

.card-title {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 25px;
    font-family: 'Coolvetica', sans-serif;
    color: #000;
    text-align: center;
    letter-spacing: 4px;
    color: #F6843F
}

.card-list {
    list-style: none;
    padding: 0;
    margin: 0;
    line-height: 1.1;
}

.card-list li {
    padding-left: 20px;
    margin-bottom: 20px;
    font-size: 16px;
    line-height: 1.6;
    color: #333;
    position: relative;
}

.card-list li:before {
    content: "•";
    position: absolute;
    left: 0;
    color: #000000ff;
    font-weight: bold;
    font-size: 20px;
}

/* Section CTA Inscription */
.inscription-cta {
    display: flex;
    align-items: center;
    gap: 60px;
    margin-top: 60px;
    margin-left: 20px;
    margin-right: 20px;
    margin-bottom: 60px;

}

.cta-text {
    flex: 1;
    line-height: 2.5;
}

.cta-text h3 {
    font-size: 36px;
    font-weight: bold;
    margin-bottom: 20px;
    line-height: 1.2;
    color: #000;
    font-family: 'Coolvetica', sans-serif;
    letter-spacing: 4px;
}

.cta-text p {
    font-size: 18px;
    line-height: 1.5;
    color: #000;
}

.cta-illustration {
    flex: 0 0 300px;
     margin-top: 60px;
     width: 370px;
}

.cta-illustration img {
    width: 100%;
    height: auto;
}


@media screen and (max-width: 1200px) {
    .cta-illustration {
        display: none;
    }
}


@media screen and  (max-width: 1200px) {
    .objectifs-cards {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .inscription-cta {
        flex-direction: column;
        text-align: center;
    }
}

@media (max-width: 768px) {
    .main-title {font-size: 32px;}
    .highlight {font-size: 48px;}
    .action-buttons { flex-direction: column;
        align-items: center;
    }
    
    .btn {width: 100%;
        max-width: 300px;}
    
    .form-container {padding: 30px 20px;}
    
    .objectifs-section {padding: 40px 20px;}
    
    .objectifs-title {
        font-size: 36px;
    }
    
    .objectif-card {
        padding: 30px;
    }
    
    .cta-text h3 {
        font-size: 24px;
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

#signupForm[style*="display: block"] ~ #homeView .home-blocks,
#loginForm[style*="display: block"] ~ #homeView .home-blocks {
    display: none !important;
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


<?php if (isset($_POST['signup_submit']) && isset($errors) && !empty($errors)) : ?>
    document.addEventListener('DOMContentLoaded', function() {
        showSignup();
    });

<?php endif; ?>
</script>


<?php
get_footer();
?>