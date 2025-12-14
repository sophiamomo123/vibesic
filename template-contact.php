<?php
/*
Template Name: Contact Page
Template Post Type: page
*/

get_header();
?>

<div class="legal-page-container">
    <main class="legal-content">
        <div class="content-wrapper">
            <h1 class="page-title">Contactez-nous</h1>
            
            <div class="page-content">
                <section class="contact-section intro">
                    <p>Vous avez une question concernant le site Vibesic, son fonctionnement ou l'un des services proposés ?</p>
                    <p>Notre équipe se tient à votre disposition pour vous accompagner.</p>
                </section>

                <section class="contact-section email-highlight">
                    <p class="email-address"><a href="mailto:Vibesic@musique.com">Vibesic@musique.com</a></p>
                </section>

                <section class="contact-section">
                    <h2>Support général</h2>
                    <p>Pour toute demande d'information, suggestion, problème technique ou retour concernant votre expérience sur la plateforme, vous pouvez nous écrire à l'adresse ci-dessus.</p>
                    <p>Nous nous efforçons de répondre dans les meilleurs délais.</p>
                </section>

                <section class="contact-section">
                    <h2>Données personnelles et confidentialité</h2>
                    <p>Pour toute question relative à la protection de vos données ou à l'exercice de vos droits (accès, suppression, modification…), contactez-nous également via :</p>
                    <p class="email-address"><a href="mailto:Vibesic@musique.com">Vibesic@musique.com</a></p>
                </section>

                <section class="contact-section">
                    <h2>Feedback et améliorations</h2>
                    <p>Vibesic évolue grâce aux retours de ses utilisateurs.</p>
                    <p>N'hésitez pas à partager vos idées ou proposer des améliorations pour enrichir l'expérience musicale.</p>
                </section>
            </div>
        </div>
    </main>
</div>

<style>
.legal-page-container {
    min-height: calc(100vh - 200px);
    background-color: #f8f9fa;
    padding: 80px 20px 60px;
}

.legal-content {
    max-width: 900px;
    margin: 0 auto;
}

.content-wrapper {
    background-color: white;
    padding: 60px;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.page-title {
    font-family: 'Coolvetica', sans-serif;
    font-size: 48px;
    color: #F6843F;
    margin-bottom: 40px;
    text-align: center;
    letter-spacing: 2px;
}

.page-content {
    font-size: 16px;
    line-height: 1.8;
    color: #333;
}

.contact-section {
    margin-bottom: 40px;
}

.contact-section h2 {
    font-family: 'Coolvetica', sans-serif;
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
    letter-spacing: 1px;
}

.contact-section p {
    margin-bottom: 10px;
}

.contact-section.intro {
    text-align: center;
    font-size: 18px;
    margin-bottom: 50px;
}

.contact-section.intro p {
    margin-bottom: 15px;
}

.email-highlight {
    text-align: center;
    margin-bottom: 50px;
}

.email-address {
    font-size: 20px;
    font-weight: bold;
    margin-top: 15px;
}

.email-address a {
    color: #F6843F;
    text-decoration: none;
}

.email-address a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .content-wrapper {
        padding: 40px 30px;
    }
    
    .page-title {
        font-size: 36px;
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
}
</style>

<?php
get_footer();
?>