</main>

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
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt="Facebook">
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
</footer>


<style>
  /* Footer */
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
    filter: brightness(0); /* Rend les icônes noires */
}

.social-icon:hover {
    transform: translateY(-3px);
    background-color: rgba(0,0,0,0.1);
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