<?php
/**
 * Template Index - Page principale Vibesic
 */

get_header();
?>

<div class="vibesic-frontpage">
    <?php if (is_user_logged_in()) : ?>
        <!-- Version connectée -->
        <main class="vibesic-main">
            <div class="welcome-message">
                <p>Bienvenue <strong><?= esc_html(wp_get_current_user()->display_name); ?></strong>!</p>
            </div>
            
            <h1 class="main-title">
                <span class="highlight">Découvrez</span><br> la musique<br>
                instrumentale par votre<br>
                humeur du jour
            </h1>
            <div class="background-image">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/background-blob.png" alt="">
</div>
            <div class="action-buttons">
                <a href="/explorer" class="btn btn-explore">EXPLORER</a>
                <a href="<?= esc_url(wp_logout_url(home_url())); ?>" class="btn btn-logout">SE DÉCONNECTER</a>
            </div>
        </main>
        
    <?php else : ?>
        <!-- Version non connectée -->
        <main class="vibesic-main">
            <h1 class="main-title">
                <span class="highlight">Découvrez</span> la musique<br>
                instrumentale par votre<br>
                humeur du jour
            </h1>
            
            <div class="action-buttons">
                <a href="/explorer" class="btn btn-explore">EXPLORER</a>
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
    background-color: #ffffffff;
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
    opacity: 2.1;
    animation: blobFloat 15s ease-in-out infinite;
}

.background-image img {
    width: 100%;
    padding-top: 70px   ;
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
.vibesic-main {
    text-align: center;
    max-width: 1200px;
    width: 100%;
}

.welcome-message {
    margin-bottom: 30px;
    font-size: 18px;
    color: #333;
}

.welcome-message strong {
    color: #ff7f50;
    font-weight: bold;
}

.main-title {
    font-size: 48px;
    line-height: 1.3;
    margin-bottom: 40px;
    font-weight: bold;
    color: #000;
    font-family: 'Coolvetica Rg', sans-serif;
}


.main-title .highlight {
    color: #ff7f50;
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
}

.btn-orange:hover {
    background-color: #ff6a3d;
    border-color: #ff6a3d;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(255, 127, 80, 0.3);
}

.btn-logout {
    background-color: #666;
    color: white;
    border: 2px solid #666;
}

.btn-logout:hover {
    background-color: #555;
    border-color: #555;
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
}

@media (max-width: 480px) {
    .main-title {
        font-size: 24px;
    }
    
    .vibesic-frontpage {
        padding: 30px 15px;
    }
}
</style>

<?php
get_footer();
?>