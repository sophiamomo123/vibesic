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
            <h1 class="results-title">Vous êtes d'humeur : <span id="dominant-emotion"></span></h1>
            <p class="results-subtitle">Voici l'analyse de vos réponses</p>

            <!-- Graphique et Légende côte à côte -->
            <div class="chart-legend-container">
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
                        <span class="legend-color" style="background-color: #95A5A6;"></span>
                        <span class="legend-label">Tristesse</span>
                        <span class="legend-value" id="tristesse-percent">0%</span>
                    </div>
                </div>
            </div>

            
            <!-- Musiques par instruments -->
            <div class="music-section">
                <h2 class="section-title">Explorez par instruments</h2>
                
                <!-- Filtre par instrument -->
                <div class="instrument-filters">
                    <button class="filter-btn active" onclick="filterByInstrument('all')">Tous</button>
                    <button class="filter-btn" onclick="filterByInstrument('piano')">Piano</button>
                    <button class="filter-btn" onclick="filterByInstrument('guitare')">Guitare</button>
                    <button class="filter-btn" onclick="filterByInstrument('violon')">Violon</button>
                    <button class="filter-btn" onclick="filterByInstrument('saxophone')">Saxophone</button>
                    <button class="filter-btn" onclick="filterByInstrument('flute')">Flûte</button>
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
    background-color: #f5f5f5;
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
    z-index: 1000;
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
    background-color: #fff5f0;
    color: #ff7f50;
}

.nav-item.logout {
    margin-top: auto;
    color: #e74c3c;
}

.nav-item.logout:hover {
    background-color: #ffe5e5;
}

.nav-icon {
    font-size: 24px;
}

/* Main Content */
.results-main {
    margin-left: 250px;
    flex: 1;
    padding: 50px;
}

.results-container {
    max-width: 900px;
    margin: 0 auto;
}

.results-title {
    font-size: 42px;
    font-weight: bold;
    color: #000;
    margin-bottom: 10px;
    font-family: 'Coolvetica', Arial, sans-serif;
}

.results-title #dominant-emotion {
    color: #ff7f50;
    text-transform: capitalize;
}

.results-subtitle {
    font-size: 18px;
    color: #666;
    margin-bottom: 50px;
}

.chart-legend-container {
    display: flex;
    gap: 40px;
    align-items: center;
    background-color: white;
    padding: 50px;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    margin-bottom: 40px;
}

.chart-container {
    flex: 0 0 400px;
    display: flex;
    justify-content: center;
    align-items: center;
}

#emotionChart {
    max-width: 400px;
    max-height: 400px;
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
    gap: 15px;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 10px;
    transition: all 0.3s ease;
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
    font-size: 18px;
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
    if (answers[1] === 'plage') emotions.dynamisme++;
    else if (answers[1] === 'campagne') emotions.calme++;
    else if (answers[1] === 'foret') emotions.joie++;
    else if (answers[1] === 'ville') emotions.tristesse++;
    
    // Question 2 - Saison
    if (answers[2] === 'ete') emotions.dynamisme++;
    else if (answers[2] === 'automne') emotions.calme++;
    else if (answers[2] === 'hiver') emotions.tristesse++;
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
                    '#FF6B6B',
                    '#4ECDC4',
                    '#FFE66D',
                    '#95A5A6'
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
    const dominantEmotion = Object.keys(emotions).reduce((a, b) => 
        emotions[a] > emotions[b] ? a : b
    );
    
    // Afficher l'humeur dominante dans le titre
    const emotionNames = {
        dynamisme: 'Dynamique',
        calme: 'Calme',
        joie: 'Joyeux',
        tristesse: 'Mélancolique'
    };
    
    document.getElementById('dominant-emotion').textContent = emotionNames[dominantEmotion];
    
    const recommendations = {
        dynamisme: "Nous vous recommandons une playlist énergique et rythmée pour booster votre dynamisme !",
        calme: "Nous vous recommandons une playlist apaisante et relaxante pour prolonger votre sérénité.",
        joie: "Nous vous recommandons une playlist joyeuse et entraînante pour célébrer votre bonne humeur !",
        tristesse: "Nous vous recommandons une playlist douce et contemplative pour accompagner votre introspection."
    };
    
    document.getElementById('recommendation-text').textContent = recommendations[dominantEmotion];
    
    // Générer la liste de musiques
    generateMusicList();
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

let currentFilter = 'all';

function generateMusicList() {
    const musicList = document.getElementById('musicList');
    musicList.innerHTML = '';
    
    musicDatabase.forEach((music, index) => {
        const musicCard = document.createElement('div');
        musicCard.className = 'music-card';
        musicCard.dataset.instrument = music.instrument;
        musicCard.dataset.mood = music.mood;
        
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

function filterByInstrument(instrument) {
    currentFilter = instrument;
    
    // Mettre à jour les boutons actifs
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    event.target.classList.add('active');
    
    // Filtrer les cartes
    document.querySelectorAll('.music-card').forEach(card => {
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
    // Redirection vers la bibliothèque ou page de playlist
    window.location.href = '<?php echo home_url('/bibliotheque'); ?>';
}
</script>

<?php
get_footer();
?>