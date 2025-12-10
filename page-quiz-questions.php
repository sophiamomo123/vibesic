<?php
/**
 * Template Name: Quiz Questions
 */

get_header();
?>
<head>
    
    <link href="https://fonts.googleapis.com/css2?family=Coolvetica&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="MusticaPro.otf">
    


</head>
<div class="quiz-questions-page">
    <main class="quiz-main">
        <!-- Question 1 -->
        <div id="question1" class="question-container active">
            <h1 class="question-title">Quel type d'environnement vous attire le plus ?</h1>
            <div class="question-counter">1 / 4</div>
            
            <div class="options-grid">
                <div class="option-card" onclick="selectOption(1, 'ville')">
                    <div class="option-image"></div>
                    <p class="option-label">Ville</p>
                </div>
                <div class="option-card" onclick="selectOption(1, 'campagne')">
                    <div class="option-image"></div>
                    <p class="option-label">Campagne</p>
                </div>
                <div class="option-card" onclick="selectOption(1, 'plage')">
                    <div class="option-image"></div>
                    <p class="option-label">Plage</p>
                </div>
                <div class="option-card" onclick="selectOption(1, 'foret')">
                    <div class="option-image"></div>
                    <p class="option-label">Forêt</p>
                </div>
            </div>
            
            <div class="navigation-buttons">
                <div></div>
                <button onclick="nextQuestion(2)" class="btn btn-orange" id="next1" disabled>SUIVANT</button>
            </div>
        </div>

        <!-- Question 2 -->
        <div id="question2" class="question-container">
            <h1 class="question-title">Quelle saison préférez-vous particulièrement ?</h1>
            <div class="question-counter">2 / 4</div>
            
            <div class="options-grid">
                <div class="option-card" onclick="selectOption(2, 'ete')">
                    <div class="option-image"></div>
                    <p class="option-label">Été</p>
                </div>
                <div class="option-card" onclick="selectOption(2, 'hiver')">
                    <div class="option-image"></div>
                    <p class="option-label">Hiver</p>
                </div>
                <div class="option-card" onclick="selectOption(2, 'printemps')">
                    <div class="option-image"></div>
                    <p class="option-label">Printemps</p>
                </div>
                <div class="option-card" onclick="selectOption(2, 'automne')">
                    <div class="option-image"></div>
                    <p class="option-label">Automne</p>
                </div>
            </div>
            
            <div class="navigation-buttons">
                <button onclick="prevQuestion(1)" class="btn btn-outline">PRÉCÉDENT</button>
                <button onclick="nextQuestion(3)" class="btn btn-orange" id="next2" disabled>SUIVANT</button>
            </div>
        </div>

        <!-- Question 3 -->
        <div id="question3" class="question-container">
            <h1 class="question-title">Quelle activité vous ferait du bien en ce moment ?</h1>
            <div class="question-counter">3 / 4</div>
            
            <div class="options-grid">
                <div class="option-card" onclick="selectOption(3, 'velo')">
                    <div class="option-image"></div>
                    <p class="option-label">Course à vélo</p>
                </div>
                <div class="option-card" onclick="selectOption(3, 'lecture')">
                    <div class="option-image"></div>
                    <p class="option-label">Lecture</p>
                </div>
                <div class="option-card" onclick="selectOption(3, 'pique-nique')">
                    <div class="option-image"></div>
                    <p class="option-label">Pique-nique</p>
                </div>
                <div class="option-card" onclick="selectOption(3, 'promenade')">
                    <div class="option-image"></div>
                    <p class="option-label">Promenade</p>
                </div>
            </div>
            
            <div class="navigation-buttons">
                <button onclick="prevQuestion(2)" class="btn btn-outline">PRÉCÉDENT</button>
                <button onclick="nextQuestion(4)" class="btn btn-orange" id="next3" disabled>SUIVANT</button>
            </div>
        </div>

        <!-- Question 4 -->
        <div id="question4" class="question-container">
            <h1 class="question-title">Quelle métaphore pourrait représenter votre état actuel ?</h1>
            <div class="question-counter">4 / 4</div>
            
            <div class="options-grid">
                <div class="option-card" onclick="selectOption(4, 'ballon')">
                    <div class="option-image"></div>
                    <p class="option-label">Ballon qui rebondit</p>
                </div>
                <div class="option-card" onclick="selectOption(4, 'the')">
                    <div class="option-image"></div>
                    <p class="option-label">Tasse de thé</p>
                </div>
                <div class="option-card" onclick="selectOption(4, 'etincelle')">
                    <div class="option-image"></div>
                    <p class="option-label">Étincelle</p>
                </div>
                <div class="option-card" onclick="selectOption(4, 'goutte')">
                    <div class="option-image"></div>
                    <p class="option-label">Goutte d'encre tombant<br>dans l'eau</p>
                </div>
            </div>
            
            <div class="navigation-buttons">
                <button onclick="prevQuestion(3)" class="btn btn-outline">PRÉCÉDENT</button>
                <button onclick="showResults()" class="btn btn-orange" id="next4" disabled>RÉSULTATS</button>
            </div>
        </div>
    </main>
</div>

<style>
.quiz-questions-page {
    min-height: calc(100vh - 200px);
    padding: 50px 20px;
    background-color: #ffffffff;
}

.quiz-main {
    max-width: 1200px;
    margin: 0 auto;
}

.question-container {
    display: none;
    animation: fadeIn 0.3s ease;
}

.question-container.active {
    display: block;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.question-title {
    font-size: 36px;
    text-align: left;
    margin-bottom: 30px;
    font-weight: bold;
    color: #000;
    font-family: 'Coolvetica', Arial, sans-serif;
}

.question-counter {
    text-align: right;
    font-size: 18px;
    color: #666;
    margin-bottom: 40px;
    font-weight: bold;
}

.options-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    margin-bottom: 50px;
   
}

.option-card {
    cursor: pointer;
    transition: all 0.3s ease;
}

.option-card:hover {
    transform: translateY(-5px);
}

.option-card.selected .option-image {
    border-color: #F6843F;
    border-width: 4px;
    box-shadow: 0 6px 20px rgba(255, 127, 80, 0.4);
}

.option-image {
    width: 100%;
    aspect-ratio: 4/3;
    background-color: white;
    border: 2px solid #ddd;
    border-radius: 20px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
     
  
}
/* Images Question 1 - Environnements */
#question1 .option-card:nth-child(1) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/ville.png');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
    

}

#question1 .option-card:nth-child(2) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/campagne.png');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

#question1 .option-card:nth-child(3) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/plage.png');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

#question1 .option-card:nth-child(4) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/foret.png');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

/* Images Question 2 - Saisons */
#question2 .option-card:nth-child(1) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/ete.jpg');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

#question2 .option-card:nth-child(2) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/hiver.png');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

#question2 .option-card:nth-child(3) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/printemps.png');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

#question2 .option-card:nth-child(4) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/automne.png');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

/* Images Question 3 - Activités */
#question3 .option-card:nth-child(1) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/velo.png');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

#question3 .option-card:nth-child(2) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/lecture.png');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

#question3 .option-card:nth-child(3) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/piquenique.png');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

#question3 .option-card:nth-child(4) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/promenade.jpg');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

/* Images Question 4 - Métaphores */
#question4 .option-card:nth-child(1) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/ballon.png');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

#question4 .option-card:nth-child(2) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/tasse.png');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

#question4 .option-card:nth-child(3) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/etincelle.png');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

#question4 .option-card:nth-child(4) .option-image {
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/goutte.jpg');
    background-size: cover;
    background-position: center;
     font-family:'MusticaPro', sans-serif;
}

.option-label {
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    color: #000;
    font-family: 'Coolvetica', Arial, sans-serif;
    line-height: 1.3;
}

.navigation-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
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
    background-color: #F6843F;
    color: white;
    border: 2px solid #F6843F;
    letter-spacing: 2px;
    display: flex;
    align-items: center;
}

.btn-orange:hover:not(:disabled) {
    background-color: #F6843F;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(255, 127, 80, 0.3);
}

.btn-orange:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.btn-outline {
    background-color: transparent;
    color: #F6843F;
    border: 2px solid #F6843F;
    letter-spacing: 2px;
    display: flex;
    align-items: center;
}

.btn-outline:hover {
    background-color: #F6843F;
    color: white;
}

/* Responsive */
@media (max-width: 1024px) {
    .options-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }
    
    .question-title {
        font-size: 28px;
    }
}

@media (max-width: 768px) {
    .question-title {
        font-size: 24px;
    }
    
    .options-grid {
        gap: 20px;
    }
    
    .navigation-buttons {
        flex-direction: column;
        gap: 15px;
    }
    
    .btn {
        width: 100%;
        max-width: 300px;
    }
}

@media (max-width: 480px) {
    .quiz-questions-page {
        padding: 30px 15px;
    }
    
    .question-title {
        font-size: 20px;
    }
    
    .options-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
let answers = {};

function selectOption(questionNumber, value) {
    // Désélectionner toutes les options de cette question
    const questionContainer = document.getElementById('question' + questionNumber);
    const allCards = questionContainer.querySelectorAll('.option-card');
    allCards.forEach(card => card.classList.remove('selected'));
    
    // Sélectionner la carte cliquée
    event.currentTarget.classList.add('selected');
    
    // Sauvegarder la réponse
    answers[questionNumber] = value;
    
    // Activer le bouton suivant
    const nextButton = document.getElementById('next' + questionNumber);
    if (nextButton) {
        nextButton.disabled = false;
    }
}

function nextQuestion(questionNumber) {
    // Cacher la question actuelle
    document.querySelectorAll('.question-container').forEach(q => {
        q.classList.remove('active');
    });
    
    // Afficher la question suivante
    document.getElementById('question' + questionNumber).classList.add('active');
    
    // Scroll vers le haut
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function prevQuestion(questionNumber) {
    // Cacher la question actuelle
    document.querySelectorAll('.question-container').forEach(q => {
        q.classList.remove('active');
    });
    
    // Afficher la question précédente
    document.getElementById('question' + questionNumber).classList.add('active');
    
    // Scroll vers le haut
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function showResults() {
    // Sauvegarder les réponses dans localStorage (ou envoyer au serveur)
    localStorage.setItem('quizAnswers', JSON.stringify(answers));
    
    // Rediriger vers la page de résultats
    window.location.href = '<?php echo home_url('/quiz-results'); ?>';
}
</script>

<?php
get_footer();
?>