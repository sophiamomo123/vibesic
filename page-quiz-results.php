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
            <a href="<?= esc_url(home_url('/')); ?>" class="sidebar-logo">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-vibesic.PNG" alt="Vibesic" class="logo-image">
            </a>
            <!-- Bouton Menu Burger -->
<button class="burger-menu" id="burgerBtn">
    <span></span>
    <span></span>
    <span></span>
</button>
        
        
        <div class="sidebar-content">
            <!-- Le reste du contenu sidebar -->
             <nav class="sidebar-nav">
    <a href="<?= esc_url(home_url('/')); ?>" class="nav-item">
        <span class="nav-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Accueil.png" alt="Accueil">
        </span>
        <span class="nav-text">Accueil</span>
    </a>
    <a href="#" class="nav-item">
        <span class="nav-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Menu.png" alt="Bibliothèque">
        </span>
        <span class="nav-text">Bibliothèque</span>
    </a>
    <a href="<?= esc_url(wp_logout_url(home_url())); ?>" class="nav-item logout">
        <span class="nav-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Déconnexion.png" alt="Déconnexion">
        </span>
        <span class="nav-text">Déconnexion</span>   s
    </a>
</nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="results-main">
        <div class="results-container">
            <!-- En-tête avec bonhomme -->
            <div class="header-section">
                <h1 class="results-title">
                    Vous êtes d'humeur<br>
                    <span id="dominant-emotion" class="emotion-name">CALME</span>
                </h1>
                <div class="dancing-man">
                    <!-- Tu peux ajouter l'image ici : 
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dancing-man.png" alt="Dancing">
                    -->
                    <div class="dancing-placeholder">🎵💃</div>
                </div>
            </div>

            <!-- Graphique et Légende côte à côte -->
            <div class="chart-legend-container">
                <!-- Légende à gauche -->
                <div class="legend">
                    <div class="legend-item">
                        <span class="legend-label">Dynamique</span>
                        <span class="legend-separator">:</span>
                        <span class="legend-value dynamisme-color" id="dynamisme-percent">0%</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-label">Calme</span>
                        <span class="legend-separator">:</span>
                        <span class="legend-value calme-color" id="calme-percent">0%</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-label">Joyeuse</span>
                        <span class="legend-separator">:</span>
                        <span class="legend-value joie-color" id="joie-percent">0%</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-label">Triste</span>
                        <span class="legend-separator">:</span>
                        <span class="legend-value tristesse-color" id="tristesse-percent">0%</span>
                    </div>
                </div>

                <!-- Graphique à droite -->
                <div class="chart-container">
                    <canvas id="emotionChart"></canvas>
                </div>
            </div>



          <!-- Section Instruments -->
<div class="music-section" id="primary-mood-section">
    <div class="section-header-with-icon">
        <div class="running-placeholder">🏃💨</div>
        <h2 class="section-title">Explorez par instrument - <span id="primary-mood-title">Humeur principale</span></h2>
    </div>
    
    <div class="instrument-filters" id="primary-filters">
        <button class="filter-btn active" onclick="filterByInstrument('all', 'primary')">Tous</button>
        <button class="filter-btn" onclick="filterByInstrument('piano', 'primary')">🎹 Piano</button>
        <button class="filter-btn" onclick="filterByInstrument('guitare', 'primary')">🎸 Guitare</button>
        <button class="filter-btn" onclick="filterByInstrument('violon', 'primary')">🎻 Violon</button>
        <button class="filter-btn" onclick="filterByInstrument('saxophone', 'primary')">🎷 Saxophone</button>
        <button class="filter-btn" onclick="filterByInstrument('flute', 'primary')">🎶 Flûte</button>
    </div>

    <div class="music-list" id="primaryMusicList"></div>
</div>


<!-- Section Instruments Secondaire (visible si 50-50) -->
<div class="music-section" id="secondary-mood-section" style="display: none;">
    <div class="section-header-with-icon">
        <div class="running-placeholder">🎵💫</div>
        <h2 class="section-title">Explorez aussi - <span id="secondary-mood-title">Humeur secondaire</span></h2>
    </div>
    
    <div class="instrument-filters" id="secondary-filters">
        <button class="filter-btn active" onclick="filterByInstrument('all', 'secondary')">Tous</button>
        <button class="filter-btn" onclick="filterByInstrument('piano', 'secondary')">🎹 Piano</button>
        <button class="filter-btn" onclick="filterByInstrument('guitare', 'secondary')">🎸 Guitare</button>
        <button class="filter-btn" onclick="filterByInstrument('violon', 'secondary')">🎻 Violon</button>
        <button class="filter-btn" onclick="filterByInstrument('saxophone', 'secondary')">🎷 Saxophone</button>
        <button class="filter-btn" onclick="filterByInstrument('flute', 'secondary')">🎶 Flûte</button>
    </div>

    <div class="music-list" id="secondaryMusicList"></div>
</div>  
           

            <!-- Actions -->
            <div class="actions">
                <button class="btn btn-orange" onclick="goToPlaylist()">Voir ma playlist complète</button>
                <button class="btn btn-outline" onclick="restartQuiz()">Refaire le quiz</button>
            </div>
        </div>
    </main>
</div>

<style>


/* Masquer le header sur la page résultats */
.results-page ~ header,
header + .results-page,
body > header {
    display: none !important;
}

body {
    padding-top: 0 !important;
}


.results-page {
    display: flex;
    min-height: 100vh;
    background-color: #ffffff;
    flex-direction: column;
}

/* Sidebar */
.sidebar {
    width: 160px;
    background-color: #ffffff;
    border-right: 2px solid #e0e0e0;
    position: fixed;
    height: 100vh;
    left: 0;
    top: 0;
    z-index: 1000;
}

.sidebar-content {
    padding: 30px 20px;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.sidebar-logo {
    display: block;
    margin-bottom: 50px;
}

.logo-image {
    max-width: 100%;
    height: auto;
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 30px;
    flex: 1;
}

.nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    padding: 15px 10px;
    border-radius: 10px;
    text-decoration: none;
    color: #333;
    font-weight: 500;
    font-size: 12px;
    transition: all 0.3s ease;
    text-align: center;
}

.nav-item:hover {
    background-color: #f5f5f5;
}

.nav-item.logout {
    margin-top: auto;
    color: #333;
}
.nav-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.nav-icon img {
    width: 32px;
    height: 32px;
    object-fit: contain;
}


.nav-text {
    font-size: 11px;
    font-weight: 600;
}
/* Sidebar réduite/élargie */
.sidebar {
    width: 80px;
    transition: width 0.3s ease;
    overflow: hidden;
}

.sidebar.expanded {
    width: 250px;
}

/* Cacher/montrer le texte */
.nav-text {
    opacity: 0;
    transition: opacity 0.3s ease;
    white-space: nowrap;
}

.sidebar.expanded .nav-text {
    opacity: 1;
}

/* Ajuster le contenu principal */
.results-main {
    margin-left: 80px;
    transition: margin-left 0.3s ease;
}

.sidebar.expanded ~ .results-main {
    margin-left: 250px;
}
/* Menu Burger */
.burger-menu {
    position: fixed;
    top: 20px;
    left: 20px;
    z-index: 2000;
    background: white;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    width: 50px;
    height: 50px;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 6px;
    padding: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.burger-menu:hover {
    background: #f5f5f5;
}

.burger-menu span {
    width: 25px;
    height: 3px;
    background-color: #333;
    border-radius: 3px;
    transition: all 0.3s ease;
}

/* Menu Burger */
.burger-menu {
    position: fixed;
    top: 20px;
    left: 20px;
    z-index: 2000;
    background: white;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    width: 50px;
    height: 50px;
    cursor: pointer;
    display: flex;
    flex-direction: row; /* Vertical par défaut */
    justify-content: center;
    align-items: center;
    gap: 6px;
    padding: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.burger-menu:hover {
    background: #f5f5f5;
}

.burger-menu span {
    width: 3px;  /* Barres verticales */
    height: 25px;
    background-color: #333;
    border-radius: 3px;
    transition: all 0.3s ease;
}

/* Barres HORIZONTALES quand menu ouvert */
.burger-menu.active {
    flex-direction: column;
}

.burger-menu.active span {
    width: 25px;  /* Barres horizontales */
    height: 3px;
}


/* Main Content */
.results-main {
    margin-left: 140px;
    flex: 1;
    padding: 60px 80px 40px;
}

.results-container {
    max-width: 1100px;
    margin: 0 auto;
}
/* Header avec bonhomme */
.header-section {
    display: flex;
    justify-content: center; /* Centré */
    align-items: center;
    margin-bottom: 40px;
    width: 100%; /* Prend toute la largeur */
}

.results-title {
    font-size: 50px;
    font-weight: 600;
    color: #000;
    line-height: 1.3;
    letter-spacing: 10px;
    font-family: 'Coolvetica', sans-serif;
    text-align: center; /* Texte centré */
}



.emotion-name {
    font-size: 50px; /* Réduit la taille */
    letter-spacing: 28px

    font-family: "Coolvetica", sans-serif;
    text-transform: uppercase;
    display: block;
    margin-top: 5px;
}



/* Couleurs dynamiques pour chaque humeur */
.emotion-dynamique { color: #C84545 !important; }
.emotion-calme { color: #84B82A !important; }
.emotion-joyeuse { color: #FCE977 !important; }
.emotion-triste { color: #26A9D8 !important; }

.dancing-man {
    display: flex;
    align-items: center;
}

.dancing-placeholder {
    font-size: 60px;
}

/* Graphique et Légende */
.chart-legend-container {
    display: flex;
    gap: 60px;
    align-items: center;
    background-color: white;
    padding: 40px 50px;
    border-radius: 25px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    margin-bottom: 50px;
    border: 2px solid #e0e0e0;
}

.legend {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.legend-item {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    font-size: 25px;
}

.legend-label {
    font-weight: 600;
    color: #333;
    min-width: 110px;
}

.legend-separator {
    font-weight: bold;
}

.legend-value {
    font-weight: bold;
    font-size: 18px;
}

.dynamisme-color { color: #E74C3C; }
.calme-color { color: #8BC34A; }
.joie-color { color: #F9E559; }
.tristesse-color { color: #5DADE2; }

.chart-container {
    flex: 0 0 350px;
    display: flex;
    justify-content: center;
    align-items: center;
}

#emotionChart {
    max-width: 350px;
    max-height: 350px;
}



/* Section Musique/Instruments */
.music-section {
    background-color: white;
    padding: 20px;
    border-radius: 25px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    margin-bottom: 0; /* Changé de 30px à 0 */
    border: 2px solid #e0e0e0;
}


/* Container pour les deux blocs côte à côte */
.music-sections-container {
    display: flex;
    gap: 30px;
    width: 100%;
}

/* Chaque bloc prend 50% de la largeur */
.music-sections-container .music-section {
    flex: 1;
    width: 50%;
    max-width: 50%;
}

/* S'assurer que music-section n'a pas de margin-bottom */
.music-section {
    background-color: white;
    padding: 40px;
    border-radius: 25px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    margin-bottom: 0 !important;
    border: 2px solid #e0e0e0;
}




.section-header-with-icon {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 30px;
}

.running-placeholder {
    font-size: 50px;
}

.section-title {
    font-size: 32px;
    color: #000;
    font-family: 'Arial', sans-serif;
    font-weight: 600;
}

.instrument-filters {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #f0f0f0;
}

.filter-btn {
    padding: 12px 25px;
    border-radius: 25px;
    border: 3px solid #8BC34A;
    background-color: white;
    color: #333;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Arial', sans-serif;
}

.filter-btn:hover {
    background-color: #f9fff0;
    transform: translateY(-2px);
}

.filter-btn.active {
    background-color: #8BC34A;
    border-color: #8BC34A;
    color: white;
}

.music-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}



.music-card {
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 12px 15px; /* Réduit de 20px à 12px 15px */
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid transparent;
    display: flex;
    align-items: center;
    gap: 15px; /* Réduit de 20px à 15px */
    width: 600px;
}

.music-cover {
    width: 60px; /* Réduit de 80px à 60px */
    height: 60px;
    min-width: 60px;
    background: linear-gradient(135deg, #8BC34A 0%, #689F38 100%);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px; /* Réduit de 40px à 30px */
}

.music-title {
    font-size: 15px; /* Réduit de 18px à 15px */
    font-weight: bold;
    color: #000;
    margin-bottom: 4px;
    font-family: 'Arial', sans-serif;
}

.music-artist {
    font-size: 13px; /* Réduit de 14px à 13px */
    color: #666;
    margin-bottom: 8px;
}

.music-tag {
    padding: 3px 10px; /* Réduit de 4px 12px */
    background-color: #8BC34A;
    color: white;
    border-radius: 10px;
    font-size: 11px; /* Réduit de 12px à 11px */
    font-weight: 600;
}



.music-tag {
    padding: 4px 12px;
    background-color: #8BC34A;
    color: white;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
}

/* Actions */
.actions {
    text-align: center;
    margin-top: 30px;
    display: flex;
    gap: 20px;
    justify-content: center;
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
    font-family: 'Arial', sans-serif;
}

.btn-orange {
    background-color: #F6843F;
    color: white;
    border: 2px solid #F6843F;
}

.btn-orange:hover {
    background-color: #ff6a3d;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(246, 132, 63, 0.3);
}

.btn-outline {
    background-color: transparent;
    color: #333;
    border: 2px solid #e0e0e0;
}

.btn-outline:hover {
    background-color: #f5f5f5;
    border-color: #333;
}

/* Responsive */
@media (max-width: 1024px) {
    .sidebar {
        width: 100px;
    }
    
    .results-main {
        margin-left: 100px;
    }
    
    .chart-legend-container {
        flex-direction: column;
    }
    
    .chart-container {
        flex: 0 0 auto;
    }

/* Responsive */
@media (max-width: 1200px) {
    .music-sections-container {
        flex-direction: column;
    }
    
    .music-sections-container .music-section {
        width: 100%;
        max-width: 100%;
    }
}


}

@media (max-width: 768px) {
    .sidebar {
        width: 80px;
    }
    
    .nav-text {
        display: none;
    }
    
    .results-main {
        margin-left: 80px;
        padding: 30px 20px;
    }
    
    .results-title {
        font-size: 28px;
    }
    
    .header-section {
        flex-direction: column;
        text-align: center;
    }
    
    .actions {
        flex-direction: column;
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
    else if (answers[2] === 'printemps') emotions.joie++;
    else if (answers[2] === 'automne') emotions.tristesse++;
    
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
    
    // Afficher les pourcentages
    document.getElementById('dynamisme-percent').textContent = percentages.dynamisme + '%';
    document.getElementById('calme-percent').textContent = percentages.calme + '%';
    document.getElementById('joie-percent').textContent = percentages.joie + '%';
    document.getElementById('tristesse-percent').textContent = percentages.tristesse + '%';
    
    // Déterminer l'humeur dominante et la secondaire
    const sortedEmotions = Object.entries(emotions).sort((a, b) => b[1] - a[1]);
    const dominantEmotion = sortedEmotions[0][0];
    const secondEmotion = sortedEmotions[1][0];
    
    // Vérifier s'il y a égalité (50-50)
    const isEqual = sortedEmotions[0][1] === sortedEmotions[1][1];
    
    // Afficher l'humeur dominante dans le titre
    const emotionNames = {
        dynamisme: 'DYNAMIQUE',
        calme: 'CALME',
        joie: 'JOYEUSE',
        tristesse: 'TRISTE'
    };
    
    const emotionElement = document.getElementById('dominant-emotion');
    emotionElement.textContent = emotionNames[dominantEmotion];
    
    // Si égalité, afficher les deux humeurs
    if (isEqual) {
        emotionElement.textContent = emotionNames[dominantEmotion] + ' & ' + emotionNames[secondEmotion];
    }
    
    // Appliquer la classe de couleur appropriée
    emotionElement.className = 'emotion-name emotion-' + dominantEmotion.toLowerCase();
    
    // Créer le graphique circulaire avec les bonnes couleurs
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
                    '#E74C3C',  // Rouge pour dynamisme
                    '#8BC34A',  // Vert pour calme
                    '#F9E559',  // Jaune pour joie
                    '#5DADE2'   // Bleu pour tristesse
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
    
    // Afficher les titres des sections
    document.getElementById('primary-mood-title').textContent = emotionNames[dominantEmotion];
    
    if (isEqual) {
        document.getElementById('secondary-mood-title').textContent = emotionNames[secondEmotion];
        document.getElementById('secondary-mood-section').style.display = 'block';
    }
    
    // Générer les listes de musiques
    generateMusicList(dominantEmotion, 'primary');
    
    if (isEqual) {
        generateMusicList(secondEmotion, 'secondary');
    }
});

// Base de données de musiques avec instruments (élargie)
const musicDatabase = [
    // Piano
    { title: "Clair de Lune", artist: "Claude Debussy", instrument: "piano", emoji: "🎹", mood: "calme" },
    { title: "Gymnopédie No.1", artist: "Erik Satie", instrument: "piano", emoji: "🎹", mood: "calme" },
    { title: "Nocturne Op.9 No.2", artist: "Frédéric Chopin", instrument: "piano", emoji: "🎹", mood: "tristesse" },
    { title: "Turkish March", artist: "Mozart", instrument: "piano", emoji: "🎹", mood: "dynamisme" },
    { title: "River Flows in You", artist: "Yiruma", instrument: "piano", emoji: "🎹", mood: "calme" },
    { title: "Una Mattina", artist: "Ludovico Einaudi", instrument: "piano", emoji: "🎹", mood: "tristesse" },
    { title: "La Campanella", artist: "Franz Liszt", instrument: "piano", emoji: "🎹", mood: "dynamisme" },
    { title: "Für Elise", artist: "Beethoven", instrument: "piano", emoji: "🎹", mood: "joie" },
    
    // Guitare
    { title: "Romance Anónimo", artist: "Anonyme", instrument: "guitare", emoji: "🎸", mood: "calme" },
    { title: "Asturias", artist: "Isaac Albéniz", instrument: "guitare", emoji: "🎸", mood: "dynamisme" },
    { title: "Recuerdos de la Alhambra", artist: "Francisco Tárrega", instrument: "guitare", emoji: "🎸", mood: "joie" },
    { title: "Cavatina", artist: "Stanley Myers", instrument: "guitare", emoji: "🎸", mood: "tristesse" },
    { title: "Lágrima", artist: "Francisco Tárrega", instrument: "guitare", emoji: "🎸", mood: "calme" },
    { title: "Capricho Árabe", artist: "Francisco Tárrega", instrument: "guitare", emoji: "🎸", mood: "dynamisme" },
    
    // Violon
    { title: "The Four Seasons - Spring", artist: "Vivaldi", instrument: "violon", emoji: "🎻", mood: "joie" },
    { title: "Meditation from Thaïs", artist: "Massenet", instrument: "violon", emoji: "🎻", mood: "calme" },
    { title: "Csárdás", artist: "Vittorio Monti", instrument: "violon", emoji: "🎻", mood: "dynamisme" },
    { title: "Schindler's List Theme", artist: "John Williams", instrument: "violon", emoji: "🎻", mood: "tristesse" },
    { title: "Salut d'Amour", artist: "Edward Elgar", instrument: "violon", emoji: "🎻", mood: "joie" },
    { title: "The Swan", artist: "Saint-Saëns", instrument: "violon", emoji: "🎻", mood: "calme" },
    
    // Saxophone
    { title: "Careless Whisper", artist: "George Michael", instrument: "saxophone", emoji: "🎷", mood: "calme" },
    { title: "Baker Street", artist: "Gerry Rafferty", instrument: "saxophone", emoji: "🎷", mood: "joie" },
    { title: "Take Five", artist: "Dave Brubeck", instrument: "saxophone", emoji: "🎷", mood: "dynamisme" },
    { title: "Going Home", artist: "Kenny G", instrument: "saxophone", emoji: "🎷", mood: "tristesse" },
    { title: "Songbird", artist: "Kenny G", instrument: "saxophone", emoji: "🎷", mood: "calme" },
    { title: "The Pink Panther", artist: "Henry Mancini", instrument: "saxophone", emoji: "🎷", mood: "joie" },
    
    // Flûte
    { title: "Syrinx", artist: "Claude Debussy", instrument: "flute", emoji: "🎶", mood: "calme" },
    { title: "Dance of the Blessed Spirits", artist: "Gluck", instrument: "flute", emoji: "🎶", mood: "joie" },
    { title: "Flight of the Bumblebee", artist: "Rimsky-Korsakov", instrument: "flute", emoji: "🎶", mood: "dynamisme" },
    { title: "The Lonely Shepherd", artist: "James Last", instrument: "flute", emoji: "🎶", mood: "tristesse" },
    { title: "Morning Mood", artist: "Edvard Grieg", instrument: "flute", emoji: "🎶", mood: "joie" },
    { title: "Pavane", artist: "Gabriel Fauré", instrument: "flute", emoji: "🎶", mood: "calme" }
];

let currentFilters = {
    primary: 'all',
    secondary: 'all'
};

function generateMusicList(mood, section = 'primary') {
    const musicList = document.getElementById(section === 'primary' ? 'primaryMusicList' : 'secondaryMusicList');
    musicList.innerHTML = '';
    
    // Filtrer par humeur
    const filteredMusic = musicDatabase.filter(music => music.mood === mood);
    
    filteredMusic.forEach((music) => {
        const musicCard = document.createElement('div');
        musicCard.className = 'music-card';
        musicCard.dataset.instrument = music.instrument;
        musicCard.dataset.mood = music.mood;
        musicCard.dataset.section = section;
        
        musicCard.innerHTML = `
            <div class="music-cover">${music.emoji}</div>
            <div class="music-info">
                <div class="music-title">${music.title}</div>
                <div class="music-artist">${music.artist}</div>
                <div class="music-tags">
                    <span class="music-tag">${music.instrument}</span>
                </div>
            </div>
        `;
        
        musicCard.onclick = () => playMusic(music);
        musicList.appendChild(musicCard);
    });
}

function filterByInstrument(instrument, section = 'primary') {
    currentFilters[section] = instrument;
    
    // Mettre à jour les boutons actifs pour cette section
    const filterContainer = section === 'primary' ? '#primary-filters' : '#secondary-filters';
    document.querySelectorAll(filterContainer + ' .filter-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    event.target.classList.add('active');
    
    // Filtrer les cartes de cette section
    document.querySelectorAll(`.music-card[data-section="${section}"]`).forEach(card => {
        if (instrument === 'all' || card.dataset.instrument === instrument) {
            card.classList.remove('hidden');
        } else {
            card.classList.add('hidden');
        }
    });
}

function playMusic(music) {
    alert(`Lecture de : ${music.title} par ${music.artist}\n(Fonction de lecture à implémenter)`);
}

function restartQuiz() {
    localStorage.removeItem('quizAnswers');
    window.location.href = '<?php echo home_url('/quiz-questions'); ?>';
}

function goToPlaylist() {
    window.location.href = '<?php echo home_url('/bibliotheque'); ?>';
}

// Menu Burger Toggle
const burgerBtn = document.getElementById('burgerBtn');
const sidebar = document.querySelector('.sidebar');

burgerBtn.addEventListener('click', function() {
    sidebar.classList.toggle('expanded');
    burgerBtn.classList.toggle('active');
});
</script>

<?php
get_footer();
?>