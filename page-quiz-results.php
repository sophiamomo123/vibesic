<?php
/**
 * Template Name: Quiz Results
 */

// Ne pas charger le header WordPress
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="results-page">
    <!-- Boutons S'INSCRIRE et CONNEXION en haut à droite -->
    <div class="top-auth-buttons">
        <a href="<?= esc_url(home_url('/template-register')); ?>" class="header-btn btn-orange">S'INSCRIRE</a>
                 <a href="<?= esc_url(home_url('/page-login')); ?>" class="header-btn btn-orange">CONNEXION</a>
        
    </div>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-content">
            <!-- Bouton burger -->
            <button class="sidebar-toggle" aria-label="Toggle menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            
            <!-- Logo sous le burger (visible quand ouvert) -->
            <a href="<?= esc_url(home_url('/')); ?>" class="sidebar-logo-inside">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-vibesic.PNG" alt="Vibesic" class="logo-image">
            </a>

            <nav class="sidebar-nav">
                <a href="<?= esc_url(home_url('/')); ?>" class="nav-item">
                    <span class="nav-icon">
                        <img src="<?= get_template_directory_uri(); ?>/assets/images/Acceuil.png" alt="Accueil">
                    </span>
                    <span class="nav-text">ACCUEIL</span>
                </a>
                <a href="<?= esc_url(home_url('/quiz-results')); ?>" class="nav-item">
                    <span class="nav-icon">
                        <img src="<?= get_template_directory_uri(); ?>/assets/images/Bibliothèque.png" alt="Bibliothèque">
                    </span>
                    <span class="nav-text">BIBLIOTHÈQUE</span>
                </a>
                <a href="<?= esc_url(wp_logout_url(home_url())); ?>" class="nav-item logout">
                    <span class="nav-icon">
                        <img src="<?= get_template_directory_uri(); ?>/assets/images/Déconnexion.png" alt="Déconnexion">
                    </span>
                    <span class="nav-text">DÉCONNEXION</span>
                </a>
            </nav>
        </div>
    </aside>
    
    <!-- Logo externe (visible quand sidebar fermée) -->
    <a href="<?= esc_url(home_url('/')); ?>" class="sidebar-logo-outside">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-vibesic.PNG" alt="Vibesic" class="logo-image">
    </a>

    <!-- Main Content -->
    <main class="results-main">
        <div class="results-container">
            <div class="results-header">
                <div class="title-with-mood">
                    <h1 class="results-title fadein-block" id="resultsTitle">Vous êtes d'humeur</h1>
                    <div class="dominant-emotion-line" id="dominant-emotion"></div>
                </div>
                <!-- Music icon à droite du titre -->
                <div class="music-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Danse.svg" alt="Music" class="music-svg">
                </div>
            </div>
            

            <!-- Graphique et Légende côte à côte -->
            <div class="chart-legend-container fadein-block" id="chartLegendContainer">
                <div class="chart-inner">
                <div class="chart-container">
               
                    <canvas id="emotionChart"></canvas>

            
                </div>

                

                <!-- Légende -->
                <div class="legend">
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: #C84545;"></span>
                        <span class="legend-label">Dynamisme</span>
                        <span class="legend-value" id="dynamisme-percent">0%</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: #84B82A;"></span>
                        <span class="legend-label">Calme</span>
                        <span class="legend-value" id="calme-percent">0%</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: #FCE977;"></span>
                        <span class="legend-label">Joie</span>
                        <span class="legend-value" id="joie-percent">0%</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: #26A9D8;"></span>
                        <span class="legend-label">Tristesse</span>
                        <span class="legend-value" id="tristesse-percent">0%</span>
                    </div>
                </div>
                </div>
            </div>

            <!-- Conteneur pour égalité 50/50 : affichage de deux blocs côte-à-côte -->
            <div id="tieResults" class="tie-results"></div>

           
            
            <!-- Musiques par instruments -->
            <div class="music-section fadein-block">
                <h2 class="section-title">Explorez par instruments</h2>
                
                <!-- Encadré contenant les instruments (sera rempli dynamiquement selon l'humeur) -->
                <div class="instruments-container" id="instruments-container">
                    <div class="instrument-pictos" id="instrument-pictos">
                        <!-- Les instruments seront ajoutés ici par JavaScript -->
                    </div>
                </div>

                <!-- Listes de musiques pour chaque instrument -->
                <div class="music-lists-wrapper" id="music-lists-wrapper">
                    <!-- Les listes seront ajoutées ici par JavaScript -->
                </div>
            </div>

            <!-- Ajout de l'image Radio sous la playlist -->
            <div style="width:100%;display:flex;justify-content:center;margin:32px 0 0 0;">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Radio.svg" alt="Radio" style="max-width:180px;width:100%;height:auto;">
            </div>
        </div>
    </main>
</div>
<footer class="vibesic-footer">
    <div class="footer-content">
        <a href="<?= esc_url(home_url('')); ?>" class="vibesic-logo">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-vibesic.PNG" alt="Vibesic" class="logo-image">
        </a>
    </div>
        
        <div class="footer-columns">
            <div class="footer-column">
    <a href="/contact">Contacts</a>
    <a href="/politique-de-vie-privee">Politique de vie privée</a>
    <a href="/conditions-d'utilisations">Conditions d'utilisations</a>
</div>

<div class="footer-divider"></div>

<div class="footer-column">
    <a href="/mentions-legales">Mentions légales</a>
    <a href="/disclaimer">Disclaimer</a>
    <a href="/politique-des-cookies">Politique des cookies</a>
    <a href="/conditions-generales">Conditions générales</a>
</div>
            
            <div class="footer-divider"></div>
            <div class="footer-column social-column">
            <div class="social-icons">
    <a href="#" class="social-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Linkedin.png" alt="LinkedIn">
    </a>
    <a href="#" class="social-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Facebook.png" alt="Facebook">
    </a>
    <a href="#" class="social-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Instagram.png" alt="Instagram">
    </a>
    <a href="#" class="social-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Youtube.png" alt="YouTube">
    </a>
    <a href="#" class="social-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Tiktok.png" alt="TikTok">
    </a>
</div>
        
                <p class="copyright">copyright © 2025 vibesic</p>
            </div>
        </div>
    </div>
<style>
/* Boutons d'authentification en haut à droite */

.header-btn {
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            font-size: 13px;
            transition: all 0.3s ease;
            display: inline-block;
            cursor: pointer;
            border: 2px solid transparent;
            padding: 8px 40px;
        }

        .btn-orange {
            background-color: #F6843F;
            color: white;
            border: 2px solid #F6843F;
            gap: 10px;
            padding: 8px 40px;
            border-radius: 25px;
            cursor: pointer;
        }

        .btn-orange:hover {
            background-color: #F6843F;
            border-color: #F6843F;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(255, 127, 80, 0.3);
            padding: 10px 40px;
            gap: 10px;
            border-radius: 25px;
            cursor: pointer;
        }


.top-auth-buttons {
    position: fixed;
    top: 30px;
    right: 40px;
    z-index: 1000;
    display: flex;
    gap: 15px;
}

.auth-btn {
    padding: 12px 28px;
    border-radius: 25px;
    text-decoration: none;
    font-family: 'Coolvetica', sans-serif;
    font-weight: bold;
    font-size: 14px;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.auth-btn-signup {
    background-color: #F6843F;
    color: white;
    border: 2px solid #F6843F;
}

.auth-btn-signup:hover {
    background-color: #e57330;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(246, 132, 63, 0.3);
}

.auth-btn-login {
    background-color: #F6843F;
    color: white;
    border: 2px solid #F6843F;
}

.auth-btn-login:hover {
    background-color: #e57330;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(246, 132, 63, 0.3);
}

.results-page {
    display: flex;
    min-height: 100vh;
    background-color: #ffffff;
    flex-direction: column;
}

.results-title {
    font-family: 'Coolvetica', sans-serif;
    letter-spacing: 6px;
    text-align: center;
    margin-bottom: 200px;
    font-size: 80px;
    line-height: 0.3;
    justify-content: center;
}

.title-with-mood {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    margin-top: 90px;
}

.dominant-emotion-line {
    font-family: 'Coolvetica', sans-serif;
    font-size: 45px;
    font-weight: bold;
    letter-spacing: 8px;
    text-align: center;
    text-transform: uppercase;
}

.music-icon {
    width: 200px;
    height: auto;
    display: inline-block;
}

/* Sidebar */
.sidebar {
    width: 240px;
    background-color: #ffffff;
    box-shadow: 2px 0 10px rgba(246, 132, 63, 0.2);
    border-right: 3px solid #F6843F;
    position: fixed;
    height: 100vh;
    left: 0;
    top: 0;
    z-index: 100;
    transition: width 300ms cubic-bezier(.2,.9,.2,1);
    overflow: hidden;
}

/* Sidebar fermée - affiche seulement les icônes */
.sidebar.collapsed {
    width: 80px;
}

.sidebar-content {
    display: flex;
    flex-direction: column;
    height: 100%;
    padding: 20px 0;
}

/* Toggle button (burger) */
.sidebar-toggle {
    display: flex;
    flex-direction: column;
    gap: 5px;
    background: transparent;
    border: none;
    padding: 12px;
    cursor: pointer;
    align-items: center;
    transition: all 300ms ease;
    flex-shrink: 0;
    margin: 0 auto;
}

/* 3 barres HORIZONTALES quand ouvert */
.sidebar .sidebar-toggle .bar {
    display: block;
    width: 28px;
    height: 3px;
    background-color: #F6843F;
    border-radius: 3px;
    transition: all 250ms ease;
    transform-origin: center;
}

/* 3 barres VERTICALES quand fermé */
.sidebar.collapsed .sidebar-toggle {
    flex-direction: row;
    gap: 4px;
}

.sidebar.collapsed .sidebar-toggle .bar {
    width: 3px;
    height: 20px;
}

/* Logo INSIDE - visible quand sidebar OUVERTE, sous le burger */
.sidebar-logo-inside {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px 20px;
    margin-bottom: 20px;
    border-bottom: 1px solid #f0f0f0;
    opacity: 1;
    transition: opacity 0.3s ease, max-height 0.3s ease;
    max-height: 100px;
    height: 60px;
}

.sidebar-logo-inside img {
    max-width: 130px;
    height: 60px;
}

/* Cacher le logo inside quand sidebar fermée */
.sidebar.collapsed .sidebar-logo-inside {
    opacity: 0;
    max-height: 0;
    padding: 0;
    margin: 0;
    overflow: hidden;
}

/* Logo OUTSIDE - visible quand sidebar FERMÉE, à droite de la sidebar */
.sidebar-logo-outside {
    position: fixed;
    top: 30px;
    left: 100px;
    z-index: 999;
    display: flex;
    align-items: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease, left 0.3s ease;
    height: 60px;
}

.sidebar-logo-outside img {
    max-width: 120px;
    height: 60px;
}

/* Afficher le logo outside quand sidebar fermée */
.sidebar.collapsed ~ .sidebar-logo-outside {
    opacity: 1;
    pointer-events: auto;
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 0 10px;
    flex: 1;
}

/* Items avec icône et nom côte à côte */
.nav-item {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 15px;
    padding: 15px 12px;
    border-radius: 10px;
    text-decoration: none;
    color: #333;
    font-weight: 500;
    font-size: 14px;
    transition: all 0.3s ease;
}

.nav-item:hover {
    background-color: #fff5f0;
    color: #F6843F;
}

.nav-item.logout:hover {
    background-color: #fff5f0;
    color: #FF6B6B;
}

.nav-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.nav-icon img {
    width: 36px;
    height: 36px;
    display: block;
}

.nav-text {
    font-family: 'Coolvetica', sans-serif;
    font-weight: bold;
    letter-spacing: 2px;
    font-size: 13px;
    white-space: nowrap;
    opacity: 1;
    transition: opacity 0.3s ease, width 0.3s ease;
}

/* Cacher les textes quand la sidebar est fermée */
.sidebar.collapsed .nav-text {
    opacity: 0;
    width: 0;
    overflow: hidden;
}

.sidebar.collapsed .nav-item {
    justify-content: center;
    padding: 15px 8px;
}

/* Main Content */
.results-main {
    margin-left: 240px;
    flex: 1;
    padding: 30px;
    padding-bottom: 80px;
    position: relative;
    z-index: 1;
    transition: margin-left 0.3s ease;
}

.sidebar.collapsed ~ .results-main {
    margin-left: 80px;
}

.results-container {
    max-width: 900px;
    margin: 0 auto;
}

.results-title {
    font-size: 36px;
    font-weight: bold;
    color: #000;
    margin-bottom: 10px;
    font-family: 'Coolvetica', Arial, sans-serif;
}

.results-subtitle {
    font-size: 18px;
    color: #666;
    margin-bottom: 50px;
}

.chart-legend-container {
    display: flex;
    gap: 24px;
    align-items: center;
    flex-direction: row-reverse;
    position: relative;
    border-radius: 16px;
    margin-top: 10px;
    margin-bottom: 18px;
    overflow: visible;
}

/* Results header */
.results-header {
    position: relative;
    padding-top: 60px;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    gap: 60px;
    margin-bottom: 8px;
    width: 100%;
}

.title-with-mood {
    position: absolute;
    left: 0;
    right: 0;
    margin-left: auto;
    margin-right: auto;
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    width: 100%;
    pointer-events: none;
}

.title-with-mood * { 
    pointer-events: auto; 
}

/* Music icon */
.music-icon {
    min-width: 180px;
    max-width: 150px;
    width: 22vw;
    height: auto;
    display: flex;
    align-items: flex-start;
    justify-content: flex-end;
    margin-left: auto;
    margin-right: 0;
}

.music-svg {
    width: 100%;
    max-width: 150px;
    height: auto;
    display: block;
}

.chart-inner {
    background-color: rgba(255, 255, 255, 0.95);
    padding: 35px 17px;
    border-radius: 16px;
    box-shadow: 0 12px 48px rgba(0,0,0,0.18);
    display: flex;
    gap: 24px;
    align-items: center;
    width: 100%;
    position: relative;
    z-index: 2;
}

.chart-container {
    flex: 0 0 300px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-left: 40px;
}

#emotionChart {
    max-width: 320px;
    max-height: 320px;
    align-self: center;
}

.legend {
    flex: 1;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px 24px;
    align-items: start;
    justify-items: start;
    max-width: 420px;
    margin: 0 auto;
}

.legend-title {
    grid-column: 1 / -1; /* Prend toute la largeur */
    font-family: 'Coolvetica', sans-serif;
    font-size: 24px;
    font-weight: bold;
    letter-spacing: 3px;
    text-align: center;
    margin-bottom: 15px;
    color: #000;
}
.legend-item {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 2px;
    padding: 8px 14px;
    background-color: #ffffff;
    border-radius: 15px;
    transition: all 0.25s ease;
    border: 0.7px solid;
    min-width: 120px;
    width: 100%;
    box-sizing: border-box;
}

.legend-label, .legend-value {
    display: block;
    min-width: 0;
    text-align: left;
    width: 100%;
}

.legend-color {
    width: 24px;
    height: 24px;
    border-radius: 50%;
}

.legend-label {
    flex: 1;
    font-weight: 600;
    color: #333;
}

.legend-value {
    font-weight: bold;
    font-size: 16px;
    color: #F6843F;
}

.music-section {
    background-color: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    margin-bottom: 0;
    margin-top: 60px;
}

.section-title {
    font-size: 28px;
    color: #000;
    margin-bottom: 25px;
    font-family: 'Coolvetica', Arial, sans-serif;
    font-weight: bold;
    text-align: center;
    letter-spacing: 4px;
}

.tie-results {
    margin: 20px 0 30px;
}

.tie-music-sections {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    margin-top: 40px;
}

.tie-music-section {
    background-color: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.tie-music-section .section-title {
    font-size: 28px;
    color: #000;
    margin-bottom: 25px;
    font-family: 'Coolvetica', Arial, sans-serif;
    font-weight: bold;
    text-align: center;
    letter-spacing: 4px;
}

.mood-title-block {
    font-size: 36px;
    color: #000;
    margin-bottom: 20px;
    font-family: 'Coolvetica', sans-serif;
    font-weight: bold;
    text-align: center;
    letter-spacing: 6px;
    text-transform: uppercase;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 15px;
}

/* Styles pour les instruments */
.instruments-container {
    background: #ffffff;
    border: 2px solid #e0e0e0;
    border-radius: 30px;
    padding: 30px 40px;
    max-width: 900px;
    margin: 0 auto 0 auto;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
}

.instrument-pictos {
    display: flex;
    gap: 32px;
    justify-content: center;
    align-items: center;
}

.instrument-picto {
    display: flex;
    flex-direction: column;
    align-items: center;
    cursor: pointer;
    transition: transform 0.2s;
    position: relative;
}

.instrument-picto img {
    width: 72px;
    height: 72px;
    transition: filter 0.2s, transform 0.2s;
}

.instrument-label {
    margin-top: 10px;
    font-family: 'Coolvetica', sans-serif;
    font-size: 1.18em;
    text-align: center;
    width: 100%;
    transition: color 0.2s;
}

/* Hover effects selon l'humeur */
.instrument-picto.mood-calme:hover img {
    filter: drop-shadow(0 0 8px #84B82A);
    transform: scale(1.06);
}

.instrument-picto.mood-calme:hover .instrument-label {
    color: #84B82A;
}

.instrument-picto.mood-dynamisme:hover img {
    filter: drop-shadow(0 0 8px #C84545);
    transform: scale(1.06);
}

.instrument-picto.mood-dynamisme:hover .instrument-label {
    color: #C84545;
}

.instrument-picto.mood-joie:hover img {
    filter: drop-shadow(0 0 8px #FCE977);
    transform: scale(1.06);
}

.instrument-picto.mood-joie:hover .instrument-label {
    color: #FCE977;
}

.instrument-picto.mood-tristesse:hover img {
    filter: drop-shadow(0 0 8px #26A9D8);
    transform: scale(1.06);
}

.instrument-picto.mood-tristesse:hover .instrument-label {
    color: #26A9D8;
}

/* Conteneur des listes de musiques */
.music-lists-wrapper {
    margin-top: 30px;
}

.music-list-container {
    max-width: 700px;
    margin: 0 auto;
}

.music-titles-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.music-titles-list li {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 16px 18px;
    font-family: 'Coolvetica', sans-serif;
    font-size: 1.05em;
    background: #ffffff;
    border: 2px solid #e0e0e0;
    border-radius: 20px;
    transition: all 0.2s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
}

/* Hover dynamique selon l'humeur */
.music-titles-list li.mood-calme:hover {
    border-color: #84B82A;
    box-shadow: 0 4px 12px rgba(132, 184, 42, 0.15);
    transform: translateY(-2px);
}

.music-titles-list li.mood-dynamisme:hover {
    border-color: #C84545;
    box-shadow: 0 4px 12px rgba(200, 69, 69, 0.15);
    transform: translateY(-2px);
}

.music-titles-list li.mood-joie:hover {
    border-color: #FCE977;
    box-shadow: 0 4px 12px rgba(252, 233, 119, 0.15);
    transform: translateY(-2px);
}

.music-titles-list li.mood-tristesse:hover {
    border-color: #26A9D8;
    box-shadow: 0 4px 12px rgba(38, 169, 216, 0.15);
    transform: translateY(-2px);
}

.play-icon {
    flex-shrink: 0;
    cursor: pointer;
}

.play-icon svg {
    width: 28px;
    height: 28px;
}

/* Couleur du bouton play selon l'humeur */
.play-icon.mood-calme svg circle {
    fill: #84B82A;
    stroke: #4A7A1A;
}

.play-icon.mood-dynamisme svg circle {
    fill: #C84545;
    stroke: #8B2E2E;
}

.play-icon.mood-joie svg circle {
    fill: #FCE977;
    stroke: #E6C34D;
}

.play-icon.mood-tristesse svg circle {
    fill: #26A9D8;
    stroke: #1B7A9E;
}

.music-title-text {
    flex: 1;
    cursor: pointer;
}

.music-actions {
    display: flex;
    gap: 10px;
    align-items: center;
}

.action-icon {
    width: 24px;
    height: 24px;
    cursor: pointer;
    transition: transform 0.2s;
    opacity: 0.6;
}

.action-icon:hover {
    opacity: 1;
    transform: scale(1.1);
}

.action-icon svg {
    width: 100%;
    height: 100%;
}

/* Responsive */
@media (max-width: 1024px) {
    .top-auth-buttons {
        top: 20px;
        right: 20px;
    }
    
    .tie-music-sections {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .sidebar {
        width: 80px;
    }
    
    .sidebar.collapsed {
        width: 80px;
    }
    
    .sidebar-logo-inside {
        display: none;
    }
    
    .sidebar-logo-outside {
        left: 90px;
        top: 25px;
    }
    
    .sidebar-logo-outside img {
        max-width: 90px;
    }
    
    .nav-text {
        display: none;
    }
    
    .results-main {
        margin-left: 80px;
    }
    
    .sidebar.collapsed ~ .results-main {
        margin-left: 80px;
    }
    
    .top-auth-buttons {
        top: 15px;
        right: 15px;
        gap: 10px;
    }
    
    .auth-btn {
        padding: 10px 20px;
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .sidebar-logo-outside {
        left: 85px;
        top: 20px;
    }
    
    .sidebar-logo-outside img {
        max-width: 70px;
    }
    
    .top-auth-buttons {
        flex-direction: column;
        gap: 8px;
        top: 10px;
        right: 10px;
    }
    
    .auth-btn {
        padding: 8px 16px;
        font-size: 11px;
    }
    
    .results-main {
        margin-left: 70px;
        padding: 20px 15px;
    }
}
.vibesic-footer {
    position: relative;
    z-index: 200; /* placer le footer au-dessus des éléments fixes comme la sidebar */
    background-color: #F6843F;
    color: white;
    padding: 60px 100px;
    margin-left: 0;
    margin-top: auto;
    width: 100%;
}

.footer-content {
    max-width: 1400px;
    margin: 0 auto;
}

.vibesic-logo {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 40px;
    margin-left: 0;
    height: 60px;
    display: block;
}

.vibesic-logo img {
    max-width: 130px;
    height: 60px;
    object-fit: contain;
}

.footer-columns {
    display: flex;
    gap: 60px;
    align-items: flex-start;
}

.footer-column {
    display: flex;
    flex-direction: column;
    gap: 20px;
    flex: 1;
}

.footer-column a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: 500;
    transition: opacity 0.3s;
}

.footer-column a:hover {
    opacity: 0.8;
}

/* Séparateur vertical blanc */
.footer-divider {
    width: 2px;
    height: 150px;
    background-color: white;
    opacity: 0.5;
}

/* Colonne sociale à droite */
.social-column {
    align-items: center;
    justify-content: center;
    flex: 0 0 auto;
    min-width: 250px;
}

.social-icons {
    display: flex;
    gap: 6px;
    margin-bottom: 30px;
}

.social-icon {
    width: 50px;
    height: 50px;
    background-color: transparent;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s;
    padding: 8px;
}

.social-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
   
}

.social-icon:hover {
    transform: translateY(-3px);
    background-color: rgba(0, 0, 0, 0.1);
}

.copyright {
    font-size: 14px;
    text-align: center;
    font-weight: 500;
}

/* Responsive */
@media (max-width: 1024px) {
    .footer-columns {
        flex-wrap: wrap;
    }
    
    .footer-divider {
        display: none;
    }
}

@media (max-width: 768px) {
    .vibesic-footer {
        padding: 40px 30px;
    }
    
    .footer-columns {
        flex-direction: column;
        gap: 30px;
    }
    
    .social-column {
        min-width: auto;
        width: 100%;
    }
}
</style>

<?php wp_footer(); ?>
</body>
</html>
    


</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0"></script>
<!-- Insérez tout votre JavaScript ici (identique à votre code original) -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.querySelector('.sidebar-toggle');
    const sidebar = document.querySelector('.sidebar');
    if (!toggle || !sidebar) return;

    // La sidebar commence ouverte par défaut
    toggle.addEventListener('click', function(e) {
        e.stopPropagation();
        sidebar.classList.toggle('collapsed');
    });
});

// Récupérer les réponses du quiz
const answers = JSON.parse(localStorage.getItem('quizAnswers') || '{}');

// Algorithme de calcul des émotions
const emotions = {
    dynamisme: 0,
    calme: 0,
    joie: 0,
    tristesse: 0
};

// Question 1 - Environnement
if (answers[1] === 'ville') emotions.dynamisme++;
else if (answers[1] === 'campagne') emotions.calme++;
else if (answers[1] === 'plage') emotions.joie++;
else if (answers[1] === 'foret') emotions.tristesse++;

// Question 2 - Saison
if (answers[2] === 'ete') emotions.dynamisme++;
else if (answers[2] === 'hiver') emotions.calme++;
else if (answers[2] === 'automne') emotions.tristesse++;
else if (answers[2] === 'printemps') emotions.joie++;

// Question 3 - Activité
if (answers[3] === 'velo') emotions.dynamisme++;
else if (answers[3] === 'lecture') emotions.calme++;
else if (answers[3] === 'pique-nique') emotions.joie++;
else if (answers[3] === 'promenade') emotions.tristesse++;

// Question 4 - Métaphore
if (answers[4] === 'ballon') emotions.dynamisme++;
else if (answers[4] === 'the') emotions.calme++;
else if (answers[4] === 'etincelle') emotions.joie++;
else if (answers[4] === 'goutte') emotions.tristesse++;

// Calculer les pourcentages
const total = 4;
const percentages = {
    dynamisme: Math.round((emotions.dynamisme / total) * 100),
    calme: Math.round((emotions.calme / total) * 100),
    joie: Math.round((emotions.joie / total) * 100),
    tristesse: Math.round((emotions.tristesse / total) * 100)
};

// Helper: convert hex color to "r,g,b" string for rgba()
function hexToRgb(hex) {
    if (!hex) return '0,0,0';
    hex = hex.replace('#', '');
    if (hex.length === 3) {
        hex = hex.split('').map(h => h + h).join('');
    }
    const bigint = parseInt(hex, 16);
    const r = (bigint >> 16) & 255;
    const g = (bigint >> 8) & 255;
    const b = bigint & 255;
    return `${r},${g},${b}`;
}

// Afficher les pourcentages
document.getElementById('dynamisme-percent').textContent = percentages.dynamisme + '%';
document.getElementById('calme-percent').textContent = percentages.calme + '%';
document.getElementById('joie-percent').textContent = percentages.joie + '%';
document.getElementById('tristesse-percent').textContent = percentages.tristesse + '%';

// Créer le graphique circulaire
const ctx = document.getElementById('emotionChart').getContext('2d');
new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Dynamisme', 'Calme', 'Joie', 'Tristesse'],
        datasets: [{
            data: [
                emotions.dynamisme,
                emotions.calme,
                emotions.joie,
                emotions.tristesse
            ],
            backgroundColor: [
                '#C84545',
                '#84B82A',
                '#FFE66D',
                '#26A9D8'
            ],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.label + ': ' + Math.round((context.parsed / total) + 100) + '%';
                    }
                }
            }
        }
    }
});

// Recommandation basée sur l'émotion dominante
const emotionNames = {
    dynamisme: 'Dynamique',
    calme: 'Calme',
    joie: 'Joyeux',
    tristesse: 'Triste'
};

const emotionColors = {
    dynamisme: '#C84545',
    calme: '#84B82A',
    joie: '#FCE977',
    tristesse: '#5DADE2'
};

const imgCalmeUrl = '<?php echo get_template_directory_uri(); ?>/assets/images/Humeur-blur.png';

const counts = emotions;
const maxCount = Math.max(...Object.values(counts));
const topKeys = Object.keys(counts).filter(k => counts[k] === maxCount);

let dominantEmotion = null;

if (topKeys.length === 2 && maxCount === (total / 2)) {
    const html = topKeys.map(k => `<span style="color: ${emotionColors[k]};">${emotionNames[k]}</span>`).join('<span style="text-transform:lowercase"> et </span>');
    document.getElementById('dominant-emotion').innerHTML = html;
    dominantEmotion = topKeys[0];

    const container = document.querySelector('.chart-legend-container');
    const imgUrl = '<?php echo get_template_directory_uri(); ?>/assets/images/Humeur-blur.png';
    const c1 = emotionColors[topKeys[0]];
    const c2 = emotionColors[topKeys[1]];
    if (container) {
        const parts = [`linear-gradient(90deg, rgba(${hexToRgb(c1)},0.35), rgba(${hexToRgb(c2)},0.35))`];
        if (topKeys.includes('calme')) parts.push(`url(${imgUrl})`);
        container.style.backgroundImage = parts.join(', ');
        container.style.backgroundSize = 'cover';
        container.style.backgroundPosition = 'center';
        container.style.backgroundRepeat = 'no-repeat';
    }
} else {
    dominantEmotion = Object.keys(emotions).reduce((a, b) => emotions[a] > emotions[b] ? a : b);
    document.getElementById('dominant-emotion').innerHTML = `<span style="color: ${emotionColors[dominantEmotion]};">${emotionNames[dominantEmotion]}</span>`;

    const container = document.querySelector('.chart-legend-container');
    const imgUrl = '<?php echo get_template_directory_uri(); ?>/assets/images/Humeur-blur.png';
    const c = emotionColors[dominantEmotion];
    if (container) {
        const parts = [`linear-gradient(rgba(${hexToRgb(c)},0.35), rgba(${hexToRgb(c)},0.35))`];
        if (dominantEmotion === 'calme') parts.push(`url(${imgUrl})`);
        container.style.backgroundImage = parts.join(', ');
        container.style.backgroundSize = 'cover';
        container.style.backgroundPosition = 'center';
        container.style.backgroundRepeat = 'no-repeat';
    }
}

// Initialiser les instruments
const instrumentMusics = {
    flute: [
        'Relaxing Soothing Healing Solo Flute Music for Meditation',
        '3 HOURS OF RELAXING FLUTE FOR STUDYING',
        'Solo Flute Music for Healing Meditation',
        'Musique relaxante de flûte en 30 minutes'
    ],
    harpe: [
        'Cascade de lumière',
        'Étoiles filantes',
        'Jardin secret',
        'Pluie de pétales'
    ],
    ocarina: [
        'Souffle du vent',
        'Chemin tranquille',
        'Nuages lents',
        'Évasion bleue'
    ],
    basse: [
        'Funky Bass Grooves',
        'Electric Bass Energy',
        'Slap Bass Power',
        'Bass Line Revolution'
    ],
    djembe: [
        'African Drum Rhythms',
        'Djembe Power Sessions',
        'Tribal Energy Beats',
        'Percussion Africaine Intense'
    ],
    guitare: [
        'Electric Guitar Riffs',
        'Rock Guitar Anthems',
        'Power Chords Collection',
        'Guitar Hero Sessions'
    ],
    glockenspiel: [
        'Bells of Happiness',
        'Sparkling Melodies',
        'Joyful Chimes',
        'Dancing Bells'
    ],
    saxophone: [
        'Upbeat Sax Sessions',
        'Jazz Saxophone Joy',
        'Happy Sax Melodies',
        'Saxophone Celebration'
    ],
    marracas: [
        'Latin Dance Rhythms',
        'Festive Percussion',
        'Tropical Vibes',
        'Party Marracas'
    ],
    piano: [
        'Ludovico Einaudi - Nuvole Bianche',
        'Yiruma - River Flows in You',
        'Nils Frahm - Ambre',
        'Ólafur Arnalds - saman'
    ],
    violon: [
        'Max Richter - On the Nature of Daylight',
        'SArvo Pärt - Fratres',
        'Samuel Barber - Adagio for Strings',
        
    ],
    flutedepan: [
        'Leo Rojas - Der einsame Hirte',
        'Gheorghe Zamfir - Doina de Jale ',
        'Simion Stanciu - SYRINX',
        
    ]
};

const moodInstruments = {
    calme: [
        { id: 'flute', name: 'Flûte', image: 'Flute.svg' },
        { id: 'harpe', name: 'Harpe', image: 'Harpe.svg' },
        { id: 'ocarina', name: 'Ocarina', image: 'Ocarina.svg' }
    ],
    dynamisme: [
        { id: 'basse', name: 'Basse', image: 'Basse.svg' },
        { id: 'djembe', name: 'Djembé', image: 'Djembe.svg' },
        { id: 'guitare', name: 'Guitare', image: 'Guitare.svg' }
    ],
    joie: [
        { id: 'glockenspiel', name: 'Glockenspiel', image: 'Glockenspiel.svg' },
        { id: 'saxophone', name: 'Saxophone', image: 'Saxophone.svg' },
        { id: 'marracas', name: 'Marracas', image: 'Marracas.svg' }
    ],
    tristesse: [
        { id: 'piano', name: 'Piano', image: 'Piano.svg' },
        { id: 'violon', name: 'Violon', image: 'Violon.svg' },
        { id: 'flutedepan', name: 'Flûte de Pan', image: 'FluteDePan.svg' }
    ]
};

function initializeInstrumentsForMoodInContainer(mood, pictosContainerId, listsWrapperId) {
    const instruments = moodInstruments[mood];
    if (!instruments) return;

    const instrumentPictosContainer = document.getElementById(pictosContainerId);
    const musicListsWrapper = document.getElementById(listsWrapperId);
    
    if (!instrumentPictosContainer || !musicListsWrapper) return;

    instrumentPictosContainer.innerHTML = '';
    musicListsWrapper.innerHTML = '';

    instruments.forEach(function(instrument) {
        const pictoDiv = document.createElement('div');
        pictoDiv.className = 'instrument-picto mood-' + mood;
        pictoDiv.setAttribute('data-instrument', instrument.id);
        pictoDiv.setAttribute('data-container-id', listsWrapperId);
        pictoDiv.innerHTML = `
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/${instrument.image}" alt="${instrument.name}">
            <span class="instrument-label">${instrument.name}</span>
        `;
        instrumentPictosContainer.appendChild(pictoDiv);

        const listContainer = document.createElement('div');
        listContainer.className = 'music-list-container';
        listContainer.id = 'list-' + instrument.id + '-' + listsWrapperId;
        listContainer.style.display = 'none';
        listContainer.innerHTML = '<ul class="music-titles-list"></ul>';
        musicListsWrapper.appendChild(listContainer);
    });

    attachInstrumentClickEventsInContainer(mood, listsWrapperId);
}

function attachInstrumentClickEventsInContainer(mood, listsWrapperId) {
    const container = document.getElementById(listsWrapperId);
    if (!container) return;
    
    const pictos = container.parentElement.querySelectorAll('.instrument-picto');
    
    pictos.forEach(function(picto) {
        picto.addEventListener('click', function(e) {
            e.stopPropagation();
            
            const instrument = picto.getAttribute('data-instrument');
            const containerId = picto.getAttribute('data-container-id') || listsWrapperId;
            const listContainer = document.getElementById('list-' + instrument + '-' + containerId);
            
            const wrapper = document.getElementById(containerId);
            if (wrapper) {
                wrapper.querySelectorAll('.music-list-container').forEach(function(container) {
                    if (container.id !== 'list-' + instrument + '-' + containerId) {
                        container.style.display = 'none';
                    }
                });
            }
            
            if (listContainer && (listContainer.style.display === 'none' || listContainer.style.display === '')) {
                listContainer.style.display = 'block';
                
                const ul = listContainer.querySelector('.music-titles-list');
                if (ul && ul.children.length === 0) {
                    const tracks = instrumentMusics[instrument] || [];
                    ul.innerHTML = tracks.map(function(title) {
                        const borderColor = emotionColors[mood] || '#e0e0e0';
                        const boxShadowColor = hexToRgb(emotionColors[mood] || '#e0e0e0');
                        return '<li class="mood-' + mood + '" style="border: 2px solid ' + borderColor + '; box-shadow: 0 4px 12px rgba(' + boxShadowColor + ', 0.15);">' +
                            '<span class="play-icon mood-' + mood + '">' +
                            '<svg width="28" height="28" viewBox="0 0 28 28">' +
                            '<circle cx="14" cy="14" r="13" stroke-width="2"/>' +
                            '<polygon points="12,9 20,14 12,19" fill="#fff"/>' +
                            '</svg>' +
                            '</span>' +
                            '<span class="music-title-text">' + title + '</span>' +
                            '<div class="music-actions">' +
                            '<span class="action-icon share-icon" title="Partager">' +
                            '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">' +
                            '<circle cx="18" cy="5" r="3"/>' +
                            '<circle cx="6" cy="12" r="3"/>' +
                            '<circle cx="18" cy="19" r="3"/>' +
                            '<line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/>' +
                            '<line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>' +
                            '</svg>' +
                            '</span>' +
                            '<span class="action-icon save-icon" title="Enregistrer">' +
                            '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">' +
                            '<path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>' +
                            '<polyline points="17 21 17 13 7 13 7 21"/>' +
                            '<polyline points="7 3 7 8 15 8"/>' +
                            '</svg>' +
                            '</span>' +
                            '</div>' +
                            '</li>';
                    }).join('');
                    
                    ul.querySelectorAll('.share-icon').forEach(function(icon) {
                        icon.addEventListener('click', function(e) {
                            e.stopPropagation();
                            const title = icon.closest('li').querySelector('.music-title-text').textContent;
                            alert('Partager : ' + title);
                        });
                    });
                    
                    ul.querySelectorAll('.save-icon').forEach(function(icon) {
                        icon.addEventListener('click', function(e) {
                            e.stopPropagation();
                            const title = icon.closest('li').querySelector('.music-title-text').textContent;
                            alert('Enregistré : ' + title);
                        });
                    });
                }
            } else if (listContainer) {
                listContainer.style.display = 'none';
            }
        });
    });
}

function initializeInstrumentsForMood(mood) {
    const instruments = moodInstruments[mood];
    if (!instruments) return;

    const instrumentPictosContainer = document.getElementById('instrument-pictos');
    const musicListsWrapper = document.getElementById('music-lists-wrapper');
    
    if (!instrumentPictosContainer || !musicListsWrapper) return;

    instrumentPictosContainer.innerHTML = '';
    musicListsWrapper.innerHTML = '';

    instruments.forEach(function(instrument) {
        const pictoDiv = document.createElement('div');
        pictoDiv.className = 'instrument-picto mood-' + mood;
        pictoDiv.setAttribute('data-instrument', instrument.id);
        pictoDiv.innerHTML = `
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/${instrument.image}" alt="${instrument.name}">
            <span class="instrument-label">${instrument.name}</span>
        `;
        instrumentPictosContainer.appendChild(pictoDiv);

        const listContainer = document.createElement('div');
        listContainer.className = 'music-list-container';
        listContainer.id = 'list-' + instrument.id;
        listContainer.style.display = 'none';
        listContainer.innerHTML = '<ul class="music-titles-list"></ul>';
        musicListsWrapper.appendChild(listContainer);
    });

    attachInstrumentClickEvents(mood);
}

function attachInstrumentClickEvents(mood) {
    document.querySelectorAll('.instrument-picto').forEach(function(picto) {
        picto.addEventListener('click', function(e) {
            e.stopPropagation();
            
            const instrument = picto.getAttribute('data-instrument');
            const listContainer = document.getElementById('list-' + instrument);
            
            document.querySelectorAll('.music-list-container').forEach(function(container) {
                if (container.id !== 'list-' + instrument) {
                    container.style.display = 'none';
                }
            });
            
            if (listContainer.style.display === 'none' || listContainer.style.display === '') {
                listContainer.style.display = 'block';
                
                const ul = listContainer.querySelector('.music-titles-list');
                if (ul.children.length === 0) {
                    const tracks = instrumentMusics[instrument] || [];
                    ul.innerHTML = tracks.map(function(title) {
                        const borderColor = emotionColors[mood] || '#e0e0e0';
                        const boxShadowColor = hexToRgb(emotionColors[mood] || '#e0e0e0');
                        return '<li class="mood-' + mood + '" style="border: 2px solid ' + borderColor + '; box-shadow: 0 4px 12px rgba(' + boxShadowColor + ', 0.15);">' +
                            '<span class="play-icon mood-' + mood + '">' +
                            '<svg width="28" height="28" viewBox="0 0 28 28">' +
                            '<circle cx="14" cy="14" r="13" stroke-width="2"/>' +
                            '<polygon points="12,9 20,14 12,19" fill="#fff"/>' +
                            '</svg>' +
                            '</span>' +
                            '<span class="music-title-text">' + title + '</span>' +
                            '<div class="music-actions">' +
                            '<span class="action-icon share-icon" title="Partager">' +
                            '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">' +
                            '<circle cx="18" cy="5" r="3"/>' +
                            '<circle cx="6" cy="12" r="3"/>' +
                            '<circle cx="18" cy="19" r="3"/>' +
                            '<line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/>' +
                            '<line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>' +
                            '</svg>' +
                            '</span>' +
                            '<span class="action-icon save-icon" title="Enregistrer">' +
                            '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">' +
                            '<path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>' +
                            '<polyline points="17 21 17 13 7 13 7 21"/>' +
                            '<polyline points="7 3 7 8 15 8"/>' +
                            '</svg>' +
                            '</span>' +
                            '</div>' +
                            '</li>';
                    }).join('');
                    
                    ul.querySelectorAll('.share-icon').forEach(function(icon) {
                        icon.addEventListener('click', function(e) {
                            e.stopPropagation();
                            const title = icon.closest('li').querySelector('.music-title-text').textContent;
                            alert('Partager : ' + title);
                        });
                    });
                    
                    ul.querySelectorAll('.save-icon').forEach(function(icon) {
                        icon.addEventListener('click', function(e) {
                            e.stopPropagation();
                            const title = icon.closest('li').querySelector('.music-title-text').textContent;
                            alert('Enregistré : ' + title);
                        });
                    });
                }
            } else {
                listContainer.style.display = 'none';
            }
        });
    });
}

initializeInstrumentsForMood(dominantEmotion);

const tieContainer = document.getElementById('tieResults');
if (topKeys.length === 2 && maxCount === (total / 2)) {
    if (tieContainer) {
        const moodA = topKeys[0];
        const moodB = topKeys[1];
        
        const musicSection = document.querySelector('.music-section');
        if (musicSection) musicSection.style.display = 'none';
        
        tieContainer.innerHTML = `
            <div class="tie-music-sections">
                <div class="tie-music-section">
                    <h2 class="mood-title-block">${emotionNames[moodA]}</h2>
                    <h2 class="section-title">Explorez par instruments</h2>
                    <div class="instruments-container" id="instruments-container-${moodA}">
                        <div class="instrument-pictos" id="instrument-pictos-${moodA}"></div>
                    </div>
                    <div class="music-lists-wrapper" id="music-lists-wrapper-${moodA}"></div>
                </div>
                
                <div class="tie-music-section">
                    <h2 class="mood-title-block">${emotionNames[moodB]}</h2>
                    <h2 class="section-title">Explorez par instruments</h2>
                    <div class="instruments-container" id="instruments-container-${moodB}">
                        <div class="instrument-pictos" id="instrument-pictos-${moodB}"></div>
                    </div>
                    <div class="music-lists-wrapper" id="music-lists-wrapper-${moodB}"></div>
                </div>
            </div>
        `;
        
        setTimeout(() => {
            initializeInstrumentsForMoodInContainer(moodA, `instrument-pictos-${moodA}`, `music-lists-wrapper-${moodA}`);
            initializeInstrumentsForMoodInContainer(moodB, `instrument-pictos-${moodB}`, `music-lists-wrapper-${moodB}`);
        }, 50);
    }
} else {
    if (tieContainer) tieContainer.innerHTML = '';
    const musicSection = document.querySelector('.music-section');
    if (musicSection) musicSection.style.display = '';
}
</script>

<?php wp_footer(); ?>
</body>
</html>