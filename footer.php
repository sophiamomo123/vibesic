</main>

<footer class="vibesic-footer">
    <div class="footer-wrapper">
        <div class="footer-logo-section">
            <a href="<?= esc_url(home_url('/')); ?>" class="footer-logo-link">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-vibesic.png" alt="Vibesic" class="footer-logo-image">
            </a>
        </div>
        
        <div class="footer-columns">
            <div class="footer-column">
                <ul class="footer-links">
                    <li><a href="#contacts">Contacts</a></li>
                    <li><a href="#politique">Politique de vie privée</a></li>
                    <li><a href="#conditions">Conditions d'utilisations</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <ul class="footer-links">
                    <li><a href="#mentions">Mentions légales</a></li>
                    <li><a href="#disclaimer">Disclaimer</a></li>
                    <li><a href="#cookies">Politique des cookies</a></li>
                    <li><a href="#generales">Conditions générales</a></li>
                </ul>
            </div>
            
            <div class="footer-separator"></div>
            
            <div class="footer-column social-column">
                <div class="social-icons">
    <a href="#" aria-label="LinkedIn" class="social-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Linkedin.png" alt="LinkedIn">
    </a>
    <a href="#" aria-label="Facebook" class="social-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Facebook.png" alt="Facebook">
    </a>
    <a href="#" aria-label="Instagram" class="social-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Instagram.png" alt="Instagram">
    </a>
    <a href="#" aria-label="YouTube" class="social-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Youtube.png" alt="YouTube">
    </a>
    <a href="#" aria-label="TikTok" class="social-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Tiktok.png" alt="TikTok">
    </a>
</div>
                
                <p class="copyright">copyright © 2025 vibesic</p>
            </div>
        </div>
    </div>
</footer>

<style>
    @font-face {
    font-family: 'MusticaPro';
    src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/musticapro.otf') format('opentype'),
    font-weight: normal;
    font-style: normal;
}
.vibesic-footer {
    background-color: #ff7f50;
    padding: 50px 0;
    margin-top: auto;
    width: 100%;
}

.footer-wrapper {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 50px;
}

.footer-logo-section {
    margin-bottom: 40px;
}

.footer-logo-link {
    display: inline-block;
    transition: opacity 0.3s;
}

.footer-logo-link:hover {
    opacity: 0.8;
}

.footer-logo-image {
    height: 45px;
    width: auto;
}

.footer-columns {
    display: grid;
    grid-template-columns: 1fr 1fr 2px 1.5fr;
    gap: 80px;
    align-items: start;
}

.footer-column ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 15px;
}

.footer-links a {
    color: #ffffff;
    text-decoration: none;
    font-size: 18px;
    font-weight: 500;
    font-family: 'Coolvetica', Arial, sans-serif;
    transition: opacity 0.3s;
}

.footer-links a:hover {
    opacity: 0.7;
}

.footer-separator {
    width: 2px;
    height: 100%;
    background-color: #ffffff;
    min-height: 150px;
}

.social-column {
    display: flex;
    flex-direction: column;
    gap: 30px;
}



.social-icons {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    align-items: center;
}

.social-icon {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    text-decoration: none;
}

.social-icon:hover {
    transform: translateY(-3px);
    opacity: 0.8;
}

.social-icon img {
    width: 48px;
    height: 48px;
    object-fit: contain;
}





.copyright {
    color: #ffffff;
    font-size: 14px;
    margin: 0;
    font-weight: 500;
    font-family: 'MusticaPro', Arial, sans-serif;


    @media (max-width: 1024px) {
    .footer-columns {
        grid-template-columns: 1fr 1fr;
        gap: 40px;
    }
    
    .footer-separator {
        display: none;
    }
    
    .social-column {
        grid-column: 1 / -1;
        align-items: center;
        text-align: center;
    }
}

@media (max-width: 768px) {
    .footer-wrapper {
        padding: 0 30px;
    }
    
    .footer-columns {
        grid-template-columns: 1fr;
        gap: 30px;
         font-family:"Musticapro", sans-serif;
    }
    
    .footer-links {
        text-align: center;
    }
    
    .social-icons {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .vibesic-footer {
        padding: 40px 0;
    }
    
    .footer-wrapper {
        padding: 0 20px;
    }
    
    .footer-logo-image {
        height: 35px;
    }
    
    .footer-links a {
        font-size: 16px;
    }
}
</style>

<?php wp_footer(); ?>
</body>
</html>
