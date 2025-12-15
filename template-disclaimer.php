<?php
/**
 * Template Name: Disclaimer
 */

get_header();
?>

<div class="legal-page-container">
    <main class="legal-content">
        <div class="content-wrapper">
            <h1 class="page-title">Disclaimer</h1>
            <p class="page-subtitle">Clause de non-responsabilité</p> <br>
            
        

                <section class="legal-section intro-section">
                    <p>La plateforme vibesic propose des recommandations musicales basées sur l'humeur dans un but exclusivement ludique et informatif. Le questionnaire, les résultats obtenus et les playlists suggérées ne constituent en aucun cas une évaluation psychologique, émotionnelle ou médicale. Toute interprétation du résultat fourni par la plateforme est subjective et ne doit pas être considérée comme un avis professionnel, scientifique ou diagnostique.</p>
                </section>

                <section class="legal-section">
                    <p>Bien que vibesic s'efforce d'offrir une expérience fluide, agréable et fiable, aucune garantie n'est fournie quant :</p>
                    <ul>
                        <li>au fonctionnement ininterrompu, exempt d'erreurs ou de problèmes techniques du site,</li>
                        <li>à l'exactitude, la pertinence ou la signification des résultats d'humeur,</li>
                        <li>à l'adéquation des playlists instrumentales recommandées par rapport aux attentes ou besoins émotionnels de l'utilisateur,</li>
                        <li>à l'exhaustivité, l'actualité ou la parfaite exactitude des informations disponibles sur la plateforme.</li>
                    </ul>
                </section>

                <section class="legal-section">
                    <p>Vibesic ne peut être tenu responsable des conséquences directes ou indirectes pouvant résulter :</p>
                    <ul>
                        <li>de l'interprétation personnelle faite par l'utilisateur de son résultat d'humeur,</li>
                        <li>de l'utilisation ou de l'impossibilité d'utiliser la plateforme,</li>
                        <li>d'interruptions temporaires, bugs ou dysfonctionnements techniques,</li>
                        <li>de la confiance accordée aux suggestions, contenus ou playlists proposées,</li>
                        <li>de l'accès à des sites externes ou services tiers via des liens présents sur la plateforme.</li>
                    </ul>
                </section>

                <section class="legal-section closing-section">
                    <p>L'utilisateur reste entièrement responsable de ses choix et de son comportement lors de l'utilisation de vibesic. En accédant à la plateforme, il reconnaît avoir pris connaissance de cette clause de non-responsabilité et l'accepter dans son intégralité.</p>
                </section>
            </div>
        </div>
    </main>
</div>

<style>
.legal-page-container {
    min-height: calc(100vh - 200px);
    background-color: #ffffffff;
    padding: 80px 20px 60px;
    font-family: 'MusticaPro', sans-serif;
}

.legal-content {
    max-width: 900px;
    margin: 0 auto;
}

.content-wrapper {
    background-color: white;
    padding: 60px;
    border-radius: 20px;
    border: 2px solid #F6843F;
    
}

.page-title {
    font-family: 'Coolvetica', sans-serif;
    font-size: 48px;
    color: #F6843F;
    margin-bottom: 10px;
    text-align: center;
    letter-spacing: 2px;
}

.page-subtitle {
    font-size: 20px;
    color: #666;
    text-align: center;
    margin-bottom: 20px;
    font-style: italic;
}

.intro-text {
    text-align: center;
    color: #666;
    margin-bottom: 40px;
    font-style: italic;
}

.page-content {
    font-size: 16px;
    line-height: 1.8;
    color: #333;
}

.legal-section {
    margin-bottom: 30px;
}

.intro-section {
    background-color: #fff5f0;
    border-left: 4px solid #F6843F;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 40px;
}

.closing-section {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin-top: 40px;
    font-weight: 500;
}

.legal-section h2 {
    font-family: 'Coolvetica', sans-serif;
    font-size: 28px;
    color: #333;
    margin-bottom: 15px;
    letter-spacing: 1px;
}

.legal-section p {
    margin-bottom: 15px;
}

.legal-section ul {
    margin-left: 20px;
    margin-bottom: 15px;
}

.legal-section li {
    margin-bottom: 12px;
}

.legal-section a {
    color: #F6843F;
    text-decoration: none;
    font-weight: bold;
}

.legal-section a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .content-wrapper {
        padding: 40px 30px;
    }
    
    .page-title {
        font-size: 36px;
    }
    
    .page-subtitle {
        font-size: 18px;
    }
    
    .legal-section h2 {
        font-size: 24px;
    }
}

@media (max-width: 480px) {
    .legal-page-container {
        padding: 60px 15px 40px;
    }
    
    .content-wrapper {
        padding: 30px 20px;
    }
    
    .page-title {
        font-size: 28px;
    }
    
    .page-subtitle {
        font-size: 16px;
    }
    
    .intro-section,
    .closing-section {
        padding: 15px;
    }
}
</style>

<?php
get_footer();
?>