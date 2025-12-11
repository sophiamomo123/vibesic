<?php
/**
 * Template Name: Quiz Results
 */

get_header();
?>

<div class="results-page">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-content">
            <button class="sidebar-toggle" aria-label="Ouvrir le menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>

            <a href="<?= esc_url(home_url('/')); ?>" class="sidebar-logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-vibesic.PNG" alt="Vibesic" class="logo-image">
            </a>

            <nav class="sidebar-nav">
                <a href="<?= esc_url(home_url('/')); ?>" class="nav-item">
                    <span class="nav-icon">🏠</span>
                    <span class="nav-text">Accueil</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-icon">📚</span>
                    <span class="nav-text">Bibliothèque</span>
                </a>
                <a href="<?= esc_url(wp_logout_url(home_url())); ?>" class="nav-item logout">
                    <span class="nav-icon">🚪</span>
                    <span class="nav-text">Déconnexion</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="results-main">
        <div class="results-container">
            <div class="results-header">
                <h1 class="results-title">Vous êtes d'humeur  <span id="dominant-emotion"></span></h1>
                <!-- Playlist banner image placed to the right of the title -->
                <div class="playlist-banner">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/playlist.png" alt="Playlist" class="playlist-image">
                </div>
            </div>
            

            <!-- Graphique et Légende côte à côte -->
            <div class="chart-legend-container">
                <div class="chart-inner">
                <div class="chart-container">
                    <canvas id="emotionChart"></canvas>
                </div>

                <!-- Légende -->
                <div class="legend">
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: #FF6B6B;"></span>
                        <span class="legend-label">Dynamisme</span>
                        <span class="legend-value" id="dynamisme-percent">0%</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: #4ECDC4;"></span>
                        <span class="legend-label">Calme</span>
                        <span class="legend-value" id="calme-percent">0%</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: #FFE66D;"></span>
                        <span class="legend-label">Joie</span>
                        <span class="legend-value" id="joie-percent">0%</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: #5DADE2;"></span>
                        <span class="legend-label">Tristesse</span>
                        <span class="legend-value" id="tristesse-percent">0%</span>
                    </div>
                </div>
                </div>
            </div>

            <!-- Conteneur pour égalité 50/50 : affichage de deux blocs côte-à-côte -->
            <div id="tieResults" class="tie-results"></div>

           
            
            <!-- Musiques par instruments -->
            <div class="music-section">
                <h2 class="section-title">Explorez par instruments</h2>
                
                <!-- Filtre par instrument (limité à 3) -->
                <div class="instrument-filters">
                    <button class="filter-btn" onclick="filterByInstrument('piano', this)">Piano</button>
                    <button class="filter-btn" onclick="filterByInstrument('guitare', this)">Guitare</button>
                    <button class="filter-btn" onclick="filterByInstrument('violon', this)">Violon</button>
                </div>

                <!-- Liste des musiques -->
                <div class="music-list" id="musicList">
                    <!-- Les musiques seront générées par JavaScript -->
                </div>
            </div>

            

<style>
.results-page {
    display: flex;
    min-height: 100vh;
    background-color: #ffffffff;
    flex-direction: column;
}

.results-title {
    font-family: 'Coolvetica', Arial, sans-serif;
    letter-spacing: 6px;
    text-align: center;
}
/* Sidebar */

.sidebar {
    width: 250px;
    background-color: #ffffff;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
    position: fixed;
    height: 100vh;
    left: 0;
    top: 0;
    z-index: 100;
    transition: width 300ms cubic-bezier(.2,.9,.2,1);
    overflow: visible;
}

/* Toggle button (burger) */
.sidebar .sidebar-toggle {
    display: flex;
    flex-direction: column;
    gap: 6px;
    background: transparent;
    border: none;
    padding: 12px 16px;
    cursor: pointer;
    align-items: flex-start;
    transition: transform 300ms ease;
}

.sidebar .sidebar-toggle .bar {
    display: block;
    width: 26px;
    height: 3px;
    background-color: #333;
    border-radius: 3px;
    transition: transform 250ms ease, width 200ms ease, height 200ms ease, opacity 200ms ease, background-color 200ms ease;
    transform-origin: center;
}

/* Collapsed sidebar styles (fermé) */
.sidebar.collapsed {
    width: 60px;
}

.sidebar.collapsed .sidebar-content {
    padding: 20px 10px;
}

.sidebar.collapsed .sidebar-logo {
    display: block;
    text-align: center;
}


.sidebar.collapsed .sidebar-toggle {
    /* when sidebar is collapsed, show bars as a vertical column */
    flex-direction: column;
    align-items: center;
}

.sidebar.collapsed .sidebar-toggle .bar {
    width: 4px;
    height: 20px;
    margin: 0 0 6px 0;
}

/* Default (expanded) burger: horizontal small bars stacked */
.sidebar .sidebar-toggle {
    flex-direction: column;
}

/* When the toggle has .open, animate into an X */
.sidebar .sidebar-toggle.open .bar:nth-child(1) {
    transform: translateY(8px) rotate(45deg);
}
.sidebar .sidebar-toggle.open .bar:nth-child(2) {
    opacity: 0;
    transform: scaleX(0);
}
.sidebar .sidebar-toggle.open .bar:nth-child(3) {
    transform: translateY(-8px) rotate(-45deg);
}

/* When not open ensure bars show as three stacked short horizontals */
.sidebar .sidebar-toggle:not(.open) .bar:nth-child(1),
.sidebar .sidebar-toggle:not(.open) .bar:nth-child(2),
.sidebar .sidebar-toggle:not(.open) .bar:nth-child(3) {
    transform: none;
    opacity: 1;
}
.sidebar .sidebar-toggle.open .bar:nth-child(1) {
    transform: translateY(6px) rotate(0deg);
}
.sidebar .sidebar-toggle.open .bar:nth-child(2) {
    opacity: 1;
    transform: translateY(0) rotate(0deg);
}
.sidebar .sidebar-toggle.open .bar:nth-child(3) {
    transform: translateY(-6px) rotate(0deg);
}

.sidebar .sidebar-toggle:not(.open) .bar:nth-child(1) {
    transform: rotate(90deg) translateY(-3px);
}
.sidebar .sidebar-toggle:not(.open) .bar:nth-child(2) {
    opacity: 0.9;
}
.sidebar .sidebar-toggle:not(.open) .bar:nth-child(3) {
    transform: rotate(90deg) translateY(3px);
}

.sidebar-content {
    padding: 30px 20px;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.sidebar-logo {
    font-size: 32px;
    font-weight: bold;
    color: #000;
    text-decoration: none;
    font-family: 'Coolvetica', Arial, sans-serif;
    margin-bottom: 50px;
}

.logo-dot {
    color: #ff7f50;
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 10px;
    flex: 1;
}

.nav-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 20px;
    border-radius: 10px;
    text-decoration: none;
    color: #333;
    font-weight: 500;
    font-size: 16px;
    transition: all 0.3s ease;
}

.nav-item:hover {
    background-color: #ffffffff;
    color: #ff7f50;
}

.nav-item.logout {
    /* placer la déconnexion juste sous la bibliothèque, sans marge automatique */
    color: #e74c3c;
}

.nav-item.logout:hover {
    background-color: #ffffffff;
}

.nav-icon {
    font-size: 24px;
}

/* Main Content */
.results-main {
    margin-left: 250px;
    flex: 1;
    padding: 30px;
    padding-bottom: 80px;
    position: relative;
    z-index: 1;
    transition: margin-left 0.25s ease;
}

/* lorsque la sidebar est réduite, décaler le contenu */
.sidebar.collapsed ~ .results-main {
    margin-left: 60px;
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

.results-title #dominant-emotion {
    text-transform: capitalize;
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
    /* inverser l'ordre : placer le graphique à droite */
    flex-direction: row-reverse;
    position: relative;
    border-radius: 16px;
    margin-bottom: 28px;
    overflow: visible;
}

/* Playlist banner */
.results-header {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 32px; /* slightly larger gap to balance bigger image */
    margin-bottom: 8px;
}

.results-title { margin: 0; }

/* Playlist banner */
.playlist-banner {
    display: flex;
    align-items: center;
    justify-content: center;
}
.playlist-image {
    width: 240px; /* larger so it exceeds title height */
    max-width: 48%;
    height: auto;
    display: inline-block;
    align-self: flex-start; /* align to top so it can exceed the title vertically */
    transform: translateY(-8px); /* slight upward overlap */
}

@media (max-width: 1024px) {
    .results-header { gap: 26px; }
    .playlist-image { width: 200px; max-width: 48%; transform: translateY(-6px); }
}

@media (max-width: 768px) {
    .results-header { gap: 20px; }
    .playlist-image { width: 160px; max-width: 56%; transform: translateY(-4px); }
}

@media (max-width: 480px) {
    /* stack vertically on small screens */
    .results-header { flex-direction: column; gap: 12px; }
    .playlist-image { width: 140px; max-width: 70%; transform: translateY(0); align-self: center; }
}



.chart-inner {
    background-color: rgba(255, 255, 255, 0.95);
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
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
    justify-content: center;
    align-items: center;
}

#emotionChart {
    max-width: 300px;
    max-height: 300px;
}

.legend {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.legend-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    background-color: #f8f9fa;
    border-radius: 10px;
    transition: all 0.25s ease;
}

.legend-item:hover {
    background-color: #fff5f0;
    transform: translateX(5px);
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
    color: #ff7f50;
}



.music-section {
    background-color: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    margin-bottom: 30px;
}

.section-title {
    font-size: 28px;
    color: #000;
    margin-bottom: 25px;
    font-family: 'Coolvetica', Arial, sans-serif;
    font-weight: bold;
}

.instrument-filters {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #f0f0f0;
}

.instrument-filters-small {
    display: flex;
    gap: 8px;
    margin-bottom: 12px;
}

.instrument-filters-small .filter-btn {
    padding: 8px 14px;
    font-size: 13px;
}

.tie-results {
    margin: 20px 0 30px;
}

.tie-blocks {
    display: flex;
    gap: 20px;
}

.tie-block {
    flex: 1;
    background: linear-gradient(180deg, rgba(255,255,255,0.9), rgba(255,255,255,0.85));
    padding: 18px;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.06);
}

.tie-block h3 {
    margin-top: 0;
    margin-bottom: 10px;
}

.instrument-list ul {
    list-style: none;
    padding-left: 0;
    margin: 0;
}

.instrument-list li {
    padding: 8px 6px;
    border-bottom: 1px solid #f0f0f0;
    font-weight: 600;
}

.instrument-list li:last-child { border-bottom: none; }

.filter-btn {
    padding: 10px 25px;
    border-radius: 20px;
    border: 2px solid #ddd;
    background-color: white;
    color: #666;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Coolvetica', Arial, sans-serif;
}

/* Music list card styles (stacked) */
.instrument-list ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.instrument-list li {
    padding: 0;
    border: none;
}

.music-entry {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 12px 14px;
    background: linear-gradient(180deg, #ffffff, #fbfbfb);
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}

.play-circle {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ff7f50, #ff6b6b);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    cursor: pointer;
}

.play-circle svg {
    width: 18px;
    height: 18px;
    fill: white;
}

.song-meta {
    display: flex;
    flex-direction: column;
}

.song-title {
    font-weight: 700;
    font-size: 15px;
    color: #111;
}

.song-artist {
    font-size: 13px;
    color: #666;
}

.music-link { text-decoration: none; }

.filter-btn:hover {
    border-color: #ff7f50;
    color: #ff7f50;
}

.filter-btn.active {
    background-color: #ff7f50;
    border-color: #ff7f50;
    color: white;
}

.music-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
}

.music-card {
    background-color: #f8f9fa;
    border-radius: 15px;
    padding: 20px;
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid transparent;
}

.music-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    border-color: #ff7f50;
}

.music-card.hidden {
    display: none;
}

.music-cover {
    width: 100%;
    aspect-ratio: 1;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 10px;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 48px;
}

.music-info {
    text-align: left;
}

.music-title {
    font-size: 18px;
    font-weight: bold;
    color: #000;
    margin-bottom: 5px;
    font-family: 'Coolvetica', Arial, sans-serif;
}

.music-artist {
    font-size: 14px;
    color: #666;
    margin-bottom: 10px;
}

.music-tags {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.music-tag {
    padding: 4px 12px;
    background-color: #ff7f50;
    color: white;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
}

.actions {
    text-align: center;
}

.btn {
    padding: 12px 35px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
    font-size: 14px;
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid transparent;
    font-family: 'Coolvetica', Arial, sans-serif;
}

.btn-orange {
    background-color: #ff7f50;
    color: white;
    border: 2px solid #ff7f50;
}

.btn-orange:hover {
    background-color: #ff6a3d;
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
/* Footer pour la page résultats */
.vibesic-footer {
    margin-left: 250px;
}

.vibesic-footer .footer-content {
    padding-left: 50px;
}

@media (max-width: 1024px) {
    .vibesic-footer {
        margin-left: 200px;
    }
}

@media (max-width: 768px) {
    .vibesic-footer {
        margin-left: 80px;
    }
    
    .vibesic-footer .footer-content {
        padding-left: 20px;
    }
}

@media (max-width: 480px) {
    .vibesic-footer {
        margin-left: 0;
    }
    
    .vibesic-footer .footer-content {
        text-align: center;
        padding-left: 0;
    }
}
/* Responsive */
@media (max-width: 1024px) {
    .sidebar {
        width: 200px;
    }
    
    .results-main {
        margin-left: 200px;
    }
    
    .chart-legend-container {
        flex-direction: column;
    }
    
    .chart-container {
        flex: 0 0 auto;
    }
}

@media (max-width: 768px) {
    .sidebar {
        width: 80px;
    }
    
    .sidebar-logo {
        font-size: 24px;
        text-align: center;
    }
    
    .nav-text {
        display: none;
    }
    
    .nav-item {
        justify-content: center;
        padding: 15px;
    }
    
    .results-main {
        margin-left: 80px;
        padding: 30px 20px;
    }
    
    .results-title {
        font-size: 32px;
    }
    
    .chart-container {
        padding: 30px;
    }
}

@media (max-width: 480px) {
    .sidebar {
        display: none;
    }
    
    .results-main {
        margin-left: 0;
    }
    
    .music-list {
        grid-template-columns: 1fr;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
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
                    '#FF6B6B', // dynamisme - rouge
                    '#4ECDC4', // calme - vert
                    '#FFE66D', // joie - jaune
                    '#5DADE2'  // tristesse - bleu
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
                            return context.label + ': ' + Math.round((context.parsed / total) * 100) + '%';
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

    // Couleurs correspondantes (utilisées aussi dans le graphique)
    const emotionColors = {
        dynamisme: '#FF6B6B', // rouge
        calme: '#4ECDC4',     // vert
        joie: '#FFE66D',      // jaune
        tristesse: '#5DADE2'  // bleu
    };

    // Image floue utilisée pour l'humeur 'calme'
    const imgCalmeUrl = '<?php echo get_template_directory_uri(); ?>/assets/images/Humeur-blur.png';

    // Déterminer l'émotion dominante ou le cas de partage 50/50 entre deux humeurs
    const counts = emotions; // nombres bruts (0-4)
    const maxCount = Math.max(...Object.values(counts));
    const topKeys = Object.keys(counts).filter(k => counts[k] === maxCount);

    // Préparer la variable qui servira pour la recommandation
    let dominantEmotion = null;

    // Si exactement deux émotions sont à 50% (2 sur 4) -> afficher les deux humeurs colorées
    if (topKeys.length === 2 && maxCount === (total / 2)) {
        // join the two mood names with a lowercase "et" (force lowercase to avoid CSS capitalize)
        const html = topKeys.map(k => `<span style="color: ${emotionColors[k]};">${emotionNames[k]}</span>`).join('<span style="text-transform:lowercase"> et </span>');
        document.getElementById('dominant-emotion').innerHTML = html;
        // Choisir la première pour la recommandation (évite erreur JS) — on pourrait fusionner recommandations plus tard
        dominantEmotion = topKeys[0];

        // Appliquer un dégradé entre les deux couleurs sur la carte arrière
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

        // Do not apply special styling around the title for 'calme' — keep title appearance normal
    } else {
        // sinon afficher la seule humeur dominante
        dominantEmotion = Object.keys(emotions).reduce((a, b) => emotions[a] > emotions[b] ? a : b);
        document.getElementById('dominant-emotion').innerHTML = `<span style="color: ${emotionColors[dominantEmotion]};">${emotionNames[dominantEmotion]}</span>`;

        // Appliquer une teinte de la couleur dominante sur la carte arrière
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

        // Keep the title styling consistent for all moods (no special surround for 'calme')
    }

    const recommendations = {
        dynamisme: "Nous vous recommandons une playlist énergique et rythmée pour booster votre dynamisme !",
        calme: "Nous vous recommandons une playlist apaisante et relaxante pour prolonger votre sérénité.",
        joie: "Nous vous recommandons une playlist joyeuse et entraînante pour célébrer votre bonne humeur !",
        tristesse: "Nous vous recommandons une playlist douce et contemplative pour accompagner votre introspection."
    };
    
    // Mettre la recommandation (utilise la première humeur dominante si égalité)
    if (document.getElementById('recommendation-text')) {
        document.getElementById('recommendation-text').textContent = recommendations[dominantEmotion] || '';
    }
    
    // Si égalité 50/50, afficher deux blocs côte-à-côte avec titres musicaux par humeur
    const tieContainer = document.getElementById('tieResults');
    if (topKeys.length === 2 && maxCount === (total / 2)) {
        if (tieContainer) {
            const moodA = topKeys[0];
            const moodB = topKeys[1];
            tieContainer.innerHTML = `
                <div class="tie-blocks">
                    <div class="tie-block" data-mood="${moodA}">
                        <h3>${emotionNames[moodA]}</h3>
                        <div class="instrument-filters-small">
                            <button class="filter-btn" onclick="filterTieByInstrument('${moodA}','piano', this)">Piano</button>
                            <button class="filter-btn" onclick="filterTieByInstrument('${moodA}','guitare', this)">Guitare</button>
                            <button class="filter-btn" onclick="filterTieByInstrument('${moodA}','violon', this)">Violon</button>
                        </div>
                        <div class="tie-music-list" id="tie-music-${moodA}"></div>
                    </div>
                    <div class="tie-block" data-mood="${moodB}">
                        <h3>${emotionNames[moodB]}</h3>
                        <div class="instrument-filters-small">
                            <button class="filter-btn" onclick="filterTieByInstrument('${moodB}','piano', this)">Piano</button>
                            <button class="filter-btn" onclick="filterTieByInstrument('${moodB}','guitare', this)">Guitare</button>
                            <button class="filter-btn" onclick="filterTieByInstrument('${moodB}','violon', this)">Violon</button>
                        </div>
                        <div class="tie-music-list" id="tie-music-${moodB}"></div>
                    </div>
                </div>
            `;
            // When there is a 50/50 tie, hide the global "Explorez par instruments" section
            const musicSection = document.querySelector('.music-section');
            if (musicSection) musicSection.style.display = 'none';

            // Populate each tie block with the full list for that mood (stacked, clickable)
            setTimeout(() => {
                const listA = document.getElementById(`tie-music-${moodA}`);
                const listB = document.getElementById(`tie-music-${moodB}`);
                if (listA) renderSongsList(listA, musicDatabase.filter(m => m.mood === moodA));
                if (listB) renderSongsList(listB, musicDatabase.filter(m => m.mood === moodB));
            }, 50);
        }
    } else {
        if (tieContainer) tieContainer.innerHTML = '';
        // Ensure global instrument explorer is visible for single-mood results
        const musicSection = document.querySelector('.music-section');
        if (musicSection) musicSection.style.display = '';

        // For a single dominant mood, pre-populate the music list with titles for that mood (stacked clickable)
        const musicListEl = document.getElementById('musicList');
        if (musicListEl) {
            const songsForMood = musicDatabase.filter(m => m.mood === dominantEmotion);
            if (songsForMood.length) {
                renderSongsList(musicListEl, songsForMood);
            } else {
                musicListEl.innerHTML = '<div class="instrument-list"><p>Aucun titre trouvé pour cette humeur.</p></div>';
            }
            // Reset instrument button active state
            document.querySelectorAll('.music-section .filter-btn').forEach(b => b.classList.remove('active'));
        }
    }
});

// Base de données de musiques avec instruments
const musicDatabase = [
    { title: "Clair de Lune", artist: "Claude Debussy", instrument: "piano", emoji: "🎹", mood: "calme" },
    { title: "Gymnopédie No.1", artist: "Erik Satie", instrument: "piano", emoji: "🎹", mood: "calme" },
    { title: "Nocturne Op.9 No.2", artist: "Frédéric Chopin", instrument: "piano", emoji: "🎹", mood: "tristesse" },
    { title: "Turkish March", artist: "Mozart", instrument: "piano", emoji: "🎹", mood: "dynamisme" },
    
    { title: "Romance Anónimo", artist: "Anonyme", instrument: "guitare", emoji: "🎸", mood: "calme" },
    { title: "Asturias", artist: "Isaac Albéniz", instrument: "guitare", emoji: "🎸", mood: "dynamisme" },
    { title: "Recuerdos de la Alhambra", artist: "Francisco Tárrega", instrument: "guitare", emoji: "🎸", mood: "joie" },
    { title: "Cavatina", artist: "Stanley Myers", instrument: "guitare", emoji: "🎸", mood: "tristesse" },
    
    { title: "The Four Seasons - Spring", artist: "Vivaldi", instrument: "violon", emoji: "🎻", mood: "joie" },
    { title: "Meditation from Thaïs", artist: "Massenet", instrument: "violon", emoji: "🎻", mood: "calme" },
    { title: "Csárdás", artist: "Vittorio Monti", instrument: "violon", emoji: "🎻", mood: "dynamisme" },
    { title: "Schindler's List Theme", artist: "John Williams", instrument: "violon", emoji: "🎻", mood: "tristesse" },
    
    { title: "Careless Whisper", artist: "George Michael", instrument: "saxophone", emoji: "🎷", mood: "calme" },
    { title: "Baker Street", artist: "Gerry Rafferty", instrument: "saxophone", emoji: "🎷", mood: "joie" },
    { title: "Take Five", artist: "Dave Brubeck", instrument: "saxophone", emoji: "🎷", mood: "dynamisme" },
    { title: "Going Home", artist: "Kenny G", instrument: "saxophone", emoji: "🎷", mood: "tristesse" },
    
    { title: "Syrinx", artist: "Claude Debussy", instrument: "flute", emoji: "🎶", mood: "calme" },
    { title: "Dance of the Blessed Spirits", artist: "Gluck", instrument: "flute", emoji: "🎶", mood: "joie" },
    { title: "Flight of the Bumblebee", artist: "Rimsky-Korsakov", instrument: "flute", emoji: "🎶", mood: "dynamisme" },
    { title: "The Lonely Shepherd", artist: "James Last", instrument: "flute", emoji: "🎶", mood: "tristesse" }
];

let currentFilter = null;

function generateMusicList() {
    // kept for legacy, but we don't auto-render full cards now
}

function filterByInstrument(instrument, btn) {
    currentFilter = instrument;

    // Mettre à jour les boutons actifs
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    if (btn) btn.classList.add('active');

    // Render a simple list of titles for the selected instrument
    const musicList = document.getElementById('musicList');
    musicList.innerHTML = '';
    const songs = musicDatabase.filter(m => m.instrument === instrument);
    const container = document.createElement('div');
    container.className = 'instrument-list';
    musicList.appendChild(container);
    // use renderSongsList to create stacked clickable cards
    renderSongsList(container, songs);
}

// Filter and render titles for a specific mood (used in tie blocks)
function filterTieByInstrument(mood, instrument, btn) {
    // update active state for the small button group
    const parent = btn.closest('.tie-block');
    if (!parent) return;
    parent.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    const target = document.getElementById(`tie-music-${mood}`);
    if (!target) return;
    target.innerHTML = '';
    const songs = musicDatabase.filter(m => m.mood === mood && m.instrument === instrument);
    // use the same card renderer for tie blocks
    renderSongsList(target, songs);
}

function playMusic(music) {
    // Si la musique contient une URL, jouer via un élément <audio>, sinon afficher une alerte (placeholder)
    if (music.url) {
        let player = document.getElementById('vibesic-audio-player');
        if (!player) {
            player = document.createElement('audio');
            player.id = 'vibesic-audio-player';
            player.controls = true;
            player.style.position = 'fixed';
            player.style.left = '20px';
            player.style.bottom = '20px';
            player.style.zIndex = 9999;
            document.body.appendChild(player);
        }
        player.src = music.url;
        player.play().catch(err => {
            console.warn('Erreur lecture audio:', err);
            alert(`Lecture de : ${music.title} — ${music.artist} (erreur de lecture)`);
        });
    } else {
        alert(`Lecture de : ${music.title} — ${music.artist}\n(Aucun fichier audio disponible)`);
    }
}

// Helper: render an array of song objects into a target container (stacked list, clickable)
function renderSongsList(targetEl, songs) {
    if (!targetEl) return;
    targetEl.innerHTML = '';
    if (!songs || songs.length === 0) {
        targetEl.textContent = 'Aucun titre trouvé.';
        return;
    }
    const ul = document.createElement('ul');
    songs.forEach(s => {
        const li = document.createElement('li');

        const entry = document.createElement('div');
        entry.className = 'music-entry';

        const play = document.createElement('div');
        play.className = 'play-circle';
        play.setAttribute('role', 'button');
        play.setAttribute('aria-label', `Lire ${s.title}`);
        // SVG triangle
        play.innerHTML = `<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>`;
        play.addEventListener('click', (e) => { e.stopPropagation(); playMusic(s); });

        const meta = document.createElement('div');
        meta.className = 'song-meta';
        const title = document.createElement('div');
        title.className = 'song-title';
        title.textContent = s.title;
        const artist = document.createElement('div');
        artist.className = 'song-artist';
        artist.textContent = s.artist;
        meta.appendChild(title);
        meta.appendChild(artist);

        // clicking the card also plays
        entry.addEventListener('click', () => playMusic(s));

        entry.appendChild(play);
        entry.appendChild(meta);
        li.appendChild(entry);
        ul.appendChild(li);
    });
    targetEl.appendChild(ul);
}

function restartQuiz() {
    localStorage.removeItem('quizAnswers');
    window.location.href = '<?php echo home_url('/quiz-questions'); ?>';
}

function goToPlaylist() {
    // Redirection vers la bibliothèque ou page de playlist
    window.location.href = '<?php echo home_url('/bibliotheque'); ?>';
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.querySelector('.sidebar-toggle');
    const sidebar = document.querySelector('.sidebar');
    if (!toggle || !sidebar) return;

    // Set initial visual state of the burger based on sidebar
    toggle.classList.toggle('open', !sidebar.classList.contains('collapsed'));
    toggle.setAttribute('aria-label', sidebar.classList.contains('collapsed') ? 'Ouvrir le menu' : 'Fermer le menu');

    toggle.addEventListener('click', function() {
        const wasCollapsed = sidebar.classList.contains('collapsed');
        sidebar.classList.toggle('collapsed');
        // Toggle visual state on the button (open = sidebar expanded)
        toggle.classList.toggle('open', wasCollapsed);
        // change aria-label for accessibility
        const expanded = !sidebar.classList.contains('collapsed');
        toggle.setAttribute('aria-label', expanded ? 'Fermer le menu' : 'Ouvrir le menu');
    });
});
</script>

<?php
get_footer();
?>