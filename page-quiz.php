<?php
/**
 * Template Name: Quiz Vibesic
 * Description: Page du quiz interactif
 */

get_header();
?>

<div class="quiz-intro-page orange-blur">
    <main class="quiz-main">
        <div class="quiz-content">
            <div class="quiz-left">
                <h1 class="quiz-title fadein-block">
                    Vous êtes invité à répondre<br>
                    à notre <span class="highlight">quiz interactif !</span>
                </h1>
                
                <p class="quiz-description fadein-block">
                    Il y aura 4 questions auxquelles vous devrez choisir une image qui vous 
                    inspire le plus afin de découvrir votre humeur d'aujourd'hui
                </p>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function() {
                        document.querySelectorAll('.fadein-block').forEach(function(el){
                            el.classList.add('fadein-visible');
                        });
                    }, 200);
                });
                </script>
                
                <button onclick="startQuiz()" class="btn btn-orange quiz-start-btn fadein-block">
                    QUIZ
                </button>
            </div>
            <div class="quiz-right fadein-block">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Tableau.svg" alt="Avatars des émotions" class="avatars-image">
</div>
            </div>
        </div>
    </main>
</div>



<style>
/* MOBILE FIRST */
.quiz-intro-page {
    min-height: calc(100vh - 200px);
    display: flex;
    align-items: center;
    padding: 30px 10px;
    background-color: #fff;
}
.quiz-main {
    width: 100%;
    max-width: 100vw;
    margin: 0 auto;
}
.quiz-content {
    display: block;
    background-color: white;
    padding: 30px 10px;
    border-radius: 16px;
}
.quiz-left {
    max-width: 100%;
    margin-bottom: 30px;
}
.quiz-title {
    font-size: 28px;
    line-height: 1.3;
    margin-bottom: 20px;
    font-weight: bold;
    color: #000;
    font-family: 'Coolvetica', Arial, sans-serif;
}
.quiz-title .highlight {
    color: #F6843F;
    font-weight: bold;
}
.quiz-description {
    font-size: 15px;
    line-height: 1.6;
    color: #000;
    margin-bottom: 30px;
}
.quiz-start-btn {
    background-color: #F6843F;
            color: black;
            border: 2px solid #F6843F;
            gap: 10px;
            padding: 9px 45px;
            border-radius: 25px;
            cursor: pointer;
    font-size: 14px;
   
    letter-spacing: 2px;
    font-weight: bold;
    
}
.quiz-right {
    display: flex;
    justify-content: center;
    align-items: center;
}
.avatars-image {
    max-width: 100%;
    width: 90vw;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(226, 112, 60, 0.94);
}
.btn-orange {
   background-color: #F6843F;
            color: black;
            border: 2px solid #F6843F;
            gap: 10px;
            padding: 9px 45px;
            border-radius: 25px;
            cursor: pointer;
   
}
.btn-orange:hover {
    background-color: #F6843F;
    border-color: #F6843F;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(255, 127, 80, 0.3);
    border-radius: 25px;
    padding: 12px 45px;
    gap: 8px;
}
.fadein-block {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}
.fadein-block.fadein-visible {
    opacity: 1;
    transform: translateY(0);
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
    .quiz-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        padding: 50px 40px;
    }
    .quiz-title {
        font-size: 36px;
    }
    .avatars-image {
        width: 350px;
        border-radius: 15px;
    }
}
/* DESKTOP */
@media (min-width: 1024px) {
    .quiz-main {
        max-width: 1400px;
    }
    .quiz-content {
        gap: 80px;
        padding: 80px 100px;
        border-radius: 20px;
        align-items: center;
    }
    .quiz-title {
        font-size: 40px;
        letter-spacing: 3px;
    }
    .avatars-image {
        width: 500px;
    }
    .quiz-left {
        max-width: 600px;
    }
}
</style>

</style>




<script>
    
function startQuiz() {
    // Redirection vers la page des questions du quiz
    window.location.href = '<?php echo home_url('/quiz-questions'); ?>';
}
fadeBlocks.forEach(function(block, index) {
    setTimeout(function() {
        block.classList.add('fadein-visible');
    }, 200 + (index * 150)); // Animation progressive
});
</script>



<?php
get_footer();
?>
<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoA6DQD021OlistMZC1ZlUPq8cxEN4l4p3Gm5t9UJ0Z" crossorigin="anonymous"></script>