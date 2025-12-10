<?php
/**
 * Template Name: Quiz Vibesic
 * Description: Page du quiz interactif
 */

get_header();
?>

<div class="quiz-intro-page">
    <main class="quiz-main">
        <div class="quiz-content">
            <div class="quiz-left">
                <h1 class="quiz-title">
                    Vous êtes invité à répondre<br>
                    à notre <span class="highlight">quiz interactif !</span>
                </h1>
                
                <p class="quiz-description">
                    Il y aura 4 questions auxquelles vous devrez choisir une image qui vous 
                    inspire le plus afin de découvrir votre humeur d'aujourd'hui
                </p>
                
                <button onclick="startQuiz()" class="btn btn-orange quiz-start-btn">
                    QUIZ
                </button>
            </div>
            <div class="quiz-right">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/humeurs.png" alt="Avatars des émotions" class="avatars-image">
</div>
            </div>
        </div>
    </main>
</div>

<style>
.quiz-intro-page {
    min-height: calc(100vh - 200px);
    display: flex;
    align-items: center;
    padding: 50px 20px;
    background-color: #ffffffff;
}

.quiz-main {
    width: 100%;
    max-width: 1400px;
    margin: 0 auto;
}

.quiz-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 80px;
    align-items: center;
    background-color: white;
    padding: 80px 100px;
    border-radius: 20px;
    
}

.quiz-left {
    max-width: 600px;
}

.quiz-title {
    font-size: 42px;
    line-height: 1.3;
    margin-bottom: 30px;
    font-weight: bold;
    color: #000;
    font-family: 'Coolvetica', Arial, sans-serif;
}

.quiz-title .highlight {
    color: #F6843F;
}

.quiz-description {
    font-size: 16px;
    line-height: 1.6;
    color: #333;
    margin-bottom: 40px;
}

.quiz-start-btn {
    padding: 15px 50px;
    font-size: 16px;
    border: none;
    letter-spacing: 2px;
    gap: 10px;
    padding: 10px 40px;
}
.quiz-right {
    display: flex;
    justify-content: center;
    align-items: center;
}

.avatars-image {
    max-width: 100%;
    width: 500px;
    height: auto;
    border-radius: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    border: 2px solid #000000ff;
}

@media (max-width: 1024px) {
    .avatars-image {
        width: 400px;
    }
}

@media (max-width: 768px) {
    .avatars-image {
        width: 100%;
        max-width: 350px;
    }
}

.btn-orange {
    background-color: #F6843F;
    color: white;
    border: 2px solid #F6843F;
    border-radius: 25px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 40px;
    gap: 10px;
    font-family: 'Coolvetica', sans-serif;
    font-size: 16px;
    font-weight: bold;
}

.btn-orange:hover {
    background-color: #F6843F; 
    border-color: #F6843F;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(255, 127, 80, 0.3);
    border-radius: 25px;
}

/* Responsive */
@media (max-width: 1024px) {
    .quiz-content {
        grid-template-columns: 1fr;
        gap: 50px;
        padding: 60px 50px;
    }
    
    .quiz-left {
        max-width: 100%;
        text-align: center;
    }
    
    .avatars-grid {
        max-width: 350px;
    }
}

@media (max-width: 768px) {
    .quiz-content {
        padding: 40px 30px;
    }
    
    .quiz-title {
        font-size: 32px;
    }
    
    .avatars-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        max-width: 300px;
    }
    
    .avatar-item {
        font-size: 40px;
    }
}

@media (max-width: 480px) {
    .quiz-content {
        padding: 30px 20px;
    }
    
    .quiz-title {
        font-size: 24px;
    }
    
    .quiz-description {
        font-size: 14px;
    }
    
    .avatars-grid {
        gap: 8px;
        max-width: 250px;
    }
    
    .avatar-item {
        font-size: 30px;
    }
}
</style>

<script>
    
function startQuiz() {
    // Redirection vers la page des questions du quiz
    window.location.href = '<?php echo home_url('/quiz-questions'); ?>';
}
</script>

<?php
get_footer();
?>