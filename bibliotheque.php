<?php
/**
 * Template Name: Bibliothèque
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="Bibliothèque vibesic pour les utilisateurs inscrits.">
    <title><?php wp_title(); ?></title>
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="bibliotheque-wrapper" style="min-height:100vh;display:flex;flex-direction:column;">
    <div class="top-auth-buttons">
        <a href="<?= esc_url(home_url('/template-register')); ?>" class="header-btn btn-orange">S'INSCRIRE</a>
                <a href="#" class="header-btn btn-orange" onclick="showLogin(); return false;">CONNEXION</a>
    </div>

    <aside class="sidebar">
        <div class="sidebar-content">
            <button class="sidebar-toggle" aria-label="Toggle menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            
            <!-- Logo sous le burger (visible quand ouvert) -->
            <a href="<?= esc_url(home_url('/')); ?>" class="sidebar-logo-inside">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.webp" alt="Vibesic" class="logo-image">
            </a>

            <nav class="sidebar-nav">
                <a href="<?= esc_url(home_url('/')); ?>" class="nav-item">
                    <span class="nav-icon">
                        <img src="<?= get_template_directory_uri(); ?>/assets/images/Acceuil.png" alt="Accueil">
                    </span>
                    <span class="nav-text">ACCUEIL</span>
                </a>
                <a href="<?= esc_url(home_url('/bibliotheque')); ?>" class="nav-item">
                    <span class="nav-icon">
   <img src="<?= get_template_directory_uri();  ?>/assets/images/Bibliothèque.png" alt="Bibliothèque">
      </span>
                    <span class="nav-text">BIBLIOTHÈQUE</span>
                </a>
                <a href="<?= esc_url(wp_logout_url(home_url())); ?>" class="nav-item logout">
                    <span class="nav-icon">
                        <img src="<?= get_template_directory_uri(); ?>/assets/images/Deconnexion.png" alt="Déconnexion">
                    </span>
                    <span class="nav-text">DÉCONNEXION</span>
                </a>
            </nav>
        </div>
    </aside>
    
    <!-- Logo externe (visible quand sidebar fermée) -->
    <a href="<?= esc_url(home_url('/')); ?>" class="sidebar-logo-outside">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-vibesic.PNG" alt="Vibesic" class="logo-image">
    </a>

    
    <main class="library-main-content">
        <div class="library-section">
            <h1 class="library-main-title">Votre bibliothèque</h1>
            
            <div class="library-accordion">
                <div class="accordion-header">
                    <button class="accordion-toggle" id="library-toggle">
                        <span class="toggle-text">Titres de musique</span>
                        <svg class="toggle-icon" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M4 6L8 10L12 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
                
                <div class="accordion-dropdown" id="library-dropdown">
                    <button class="dropdown-option" data-filter="ecoutees">Écoutés</button>
                    <button class="dropdown-option" data-filter="enregistrees">Enregistrés</button>
                </div>
                
                <div class="library-content" id="library-content">
                
                </div>
            </div>
        </div>
    </main>
    
    <footer class="vibesic-footer" style="margin-top:auto;">
        <div class="footer-content">
            <a href="<?= esc_url(home_url('')); ?>" class="vibesic-logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.webp" alt="Vibesic" class="logo-image">
            </a>
        </div>
        
        <div class="footer-columns">
            <div class="footer-column">
                <a href="<?= esc_url(home_url('/contact')); ?>">Contacts</a>
                <a href="<?= esc_url(home_url('/politique-de-vie-privee')); ?>">Politique de vie privée</a>
                <a href="<?= esc_url(home_url('/conditions-utilisations')); ?>">Conditions d'utilisations</a>
            </div>

            <div class="footer-divider"></div>

            <div class="footer-column">
                <a href="<?= esc_url(home_url('/mentions-legales')); ?>">Mentions légales</a>
                <a href="<?= esc_url(home_url('/disclaimer')); ?>">Disclaimer</a>
                <a href="<?= esc_url(home_url('/politique-des-cookies')); ?>">Politique des cookies</a>
                <a href="<?= esc_url(home_url('/conditions-generales')); ?>">Conditions générales</a>
            </div>
            
            <div class="footer-divider"></div>
            <div class="footer-column social-column">
                <div class="social-icons">
                    <a href="https://www.linkedin.com/company/votre-entreprise" target="_blank" rel="noopener noreferrer" class="social-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Linkedin.png" alt="LinkedIn">
                    </a>
                    <a href="https://www.facebook.com/votre-page" target="_blank" rel="noopener noreferrer" class="social-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Facebook.png" alt="Facebook">
                    </a>
                    <a href="https://www.instagram.com/votre-compte" target="_blank" rel="noopener noreferrer" class="social-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Instagram.png" alt="Instagram">
                    </a>
                    <a href="https://www.youtube.com/@votre-chaine" target="_blank" rel="noopener noreferrer" class="social-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Youtube.png" alt="YouTube">
                    </a>
                    <a href="https://www.tiktok.com/@votre-compte" target="_blank" rel="noopener noreferrer" class="social-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Tiktok.png" alt="TikTok">
                    </a>
                </div>
                <p class="copyright">copyright © 2025 vibesic</p>
            </div>
        </div>
    </footer>
</div>

<style>



@media (max-width: 768px) {
    .biblio-accordeon-title {
        font-size: 36px;
        margin-bottom: 40px;
    }
    
    .biblio-acc-btn {
        font-size: 18px;
        padding: 18px 24px;
    }
    
    .biblio-acc-arrow-round {
        width: 45px;
        height: 45px;
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .biblio-accordeon-title {
        font-size: 28px;
        margin-bottom: 30px;
    }
    
    .biblio-acc-btn {
        font-size: 16px;
        padding: 16px 20px;
    }
    
    .biblio-acc-arrow-round {
        width: 40px;
        height: 40px;
        font-size: 14px;
    }
    
    .biblio-acc-panel {
        padding: 20px;
    }

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

.library-main-content {
    margin-left: 240px;
    padding: 80px 30px 40px;
    flex: 1;
    transition: margin-left 0.3s ease;
}

.sidebar.collapsed ~ .library-main-content {
    margin-left: 80px;
}


.library-section {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 30px;
}
.library-main-title {
    font-family: 'Coolvetica', sans-serif;
    font-size: 35px;
    font-weight: bold;
    letter-spacing: 6px;
    margin-bottom: 40px;
    color: #000;
    text-align: center;
}


.library-accordion {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 4px 20px rgba(181, 71, 71, 0.08);
}
.accordion-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.accordion-title {
    font-family: 'Coolvetica', sans-serif;
    font-size: 24px;
    font-weight: bold;
    color: #333;
    letter-spacing: 2px;
}
.accordion-toggle {
    background: none;
    border: none;
    display: flex;
    align-items: center;
    cursor: pointer;
    font-family: 'Coolvetica', sans-serif;
    font-size: 16px;
    font-weight: bold;
    color: #F6843F;
    gap: 8px;
}
.accordion-toggle:hover {
    background: #ffffffff;
}

.toggle-icon {
    transition: transform 0.3s ease;
}

.accordion-toggle.active .toggle-icon {
    transform: rotate(180deg);
}

.accordion-toggle.active .toggle-icon path {
    stroke: white;
}
/* Dropdown */
.accordion-dropdown {
    display: none;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 25px;
    padding: 20px;
    border-radius: 15px;
}

.accordion-dropdown.show {
    display: flex;
}
.dropdown-option {
    padding: 14px 24px;
    background: #F6843F;
    border: 2px solid #ffffffff;
    border-radius: 18px;
    font-family: 'Coolvetica', sans-serif;
    font-size: 16px;
    color: #ffffffff;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: left;
    letter-spacing: 3px;
    
}
.dropdown-option :hover { 
       color: #F6843F;
    }
    

.library-content {
    display: flex;
    flex-direction: column;
    gap: 12px;
    min-height: 200px;
}

.library-track {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 18px 20px;
    background: #ffffff;
    border: 2px solid #e0e0e0;
    border-radius: 20px;
    transition: all 0.2s ease;
}

.library-track:hover {
    border-color: #F6843F;
    box-shadow: 0 4px 12px rgba(246, 132, 63, 0.15);
    transform: translateY(-2px);
}
.library-track .play-icon {
    flex-shrink: 0;
    cursor: pointer;
}

.library-track .play-icon svg {
    width: 32px;
    height: 32px;
}

.library-track .play-icon svg circle {
    fill: #F6843F;
    stroke: #d66b2e;
}

.library-track .music-title-text {
    flex: 1;
    font-family: 'Coolvetica', sans-serif;
    font-size: 16px;
    color: #333;
}



.header-btn {
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            font-size: 13px;
            transition: all 0.3s ease;
            display: inline-block;
            cursor: pointer;
            border: 2px solid transparent;
            padding: 9px 45px;
            margin-top: -10px;
            font-family: 'Coolvetica', sans-serif;
            
        }

        .btn-orange {
            background-color: #F6843F;
            color: black;
            border: 2px solid #F6843F;
            gap: 10px;
            padding: 9px 45px;
            border-radius: 25px;
            cursor: pointer;
            letter-spacing: 2px;
        }

        .btn-orange:hover {
            background-color: #F6843F;
            border-color: #F6843F;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(255, 127, 80, 0.3);
            padding: 9px 45px;
            gap: 10px;
            border-radius: 25px;
            cursor: pointer;
        }

.top-auth-buttons {
    position: fixed;
    top: 30px;
    right: 40px;
    z-index: 1000;
    display: flex;
    gap: 15px;
}


.sidebar {
    width: 240px;
    background-color: #ffffff;
    box-shadow: 2px 0 10px rgba(246, 132, 63, 0.2);
    border-right: 3px solid #F6843F;
    position: fixed;
    height: 100vh;
    left: 0;
    top: 0;
    z-index: 100;
    transition: width 300ms cubic-bezier(.2,.9,.2,1);
    overflow: hidden;
}

.sidebar.collapsed {
    width: 80px;
}

.sidebar-content {
    display: flex;
    flex-direction: column;
    height: 100%;
    padding: 20px 0;
}

.sidebar-toggle {
    display: flex;
    flex-direction: column;
    gap: 5px;
    background: transparent;
    border: none;
    padding: 12px;
    cursor: pointer;
    align-items: center;
    transition: all 300ms ease;
    flex-shrink: 0;
    margin: 0 auto;
}

.sidebar .sidebar-toggle .bar {
    display: block;
    width: 28px;
    height: 3px;
    background-color: #F6843F;
    border-radius: 3px;
    transition: all 250ms ease;
    transform-origin: center;
}

.sidebar.collapsed .sidebar-toggle {
    flex-direction: row;
    gap: 4px;
}

.sidebar.collapsed .sidebar-toggle .bar {
    width: 3px;
    height: 20px;
}

.sidebar-logo-inside {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px 20px;
    margin-bottom: 15px;
    border-bottom: 0.5px solid #000000ff;

    
    opacity: 1;
    transition: opacity 0.3s ease, max-height 0.3s ease;
    max-height: 100px;
    height: 0px;
}

.sidebar-logo-inside img {
    max-width: 130px;
    height: 22px;
}

.sidebar.collapsed .sidebar-logo-inside {
    opacity: 0;
    max-height: 0;
    padding: 0;
    margin: 0;
    overflow: hidden;
}

.sidebar-logo-outside {
    position: fixed;
    top: 30px;
    left: 100px;
    z-index: 999;
    display: flex;
    align-items: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease, left 0.3s ease;
    height: 60px;
}

.sidebar-logo-outside img {
    max-width: 120px;
    height: 60px;
}

.sidebar.collapsed ~ .sidebar-logo-outside {
    opacity: 1;
    pointer-events: auto;
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 30px 10px 0 10px;
    flex: 1;
}

.nav-item {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 15px;
    padding: 15px 12px;
    border-radius: 10px;
    text-decoration: none;
    color: #333;
    font-weight: 500;
    font-size: 14px;
    transition: all 0.3s ease;
    margin-bottom: 8px;
}

.nav-item:hover {
    background-color: #fff5f0;
    color: #F6843F;
}

.nav-item.logout:hover {
    background-color: #fff5f0;
    color: #FF6B6B;
}

.nav-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.nav-icon img {
    width: 36px;
    height: 36px;
    display: block;
}

.nav-text {
    font-family: 'Coolvetica', sans-serif;
    font-weight: bold;
    letter-spacing: 2px;
    font-size: 13px;
    white-space: nowrap;
    opacity: 1;
    transition: opacity 0.3s ease, width 0.3s ease;
}

.sidebar.collapsed .nav-text {
    opacity: 0;
    width: 0;
    overflow: hidden;
}

.sidebar.collapsed .nav-item {
    justify-content: center;
    padding: 15px 8px;
}


.vibesic-footer {
    position: relative;
    z-index: 200;
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
    height: 60px;
    display: block;
}

.vibesic-logo img {
    max-width: 130px;
    height: 60px;
    object-fit: contain;
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

.footer-divider {
    width: 2px;
    height: 150px;
    background-color: white;
    opacity: 0.5;
}

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
}

.social-icon:hover {
    transform: translateY(-3px);
    background-color: rgba(0, 0, 0, 0.1);
}

.copyright {
    font-size: 14px;
    text-align: center;
    font-weight: 500;
}


@media (max-width: 1024px) {
    .footer-columns {
        flex-wrap: wrap;
    }
    
    .footer-divider {
        display: none;
    }
}

@media (max-width: 768px) {
    .sidebar {
        width: 80px;
    }
    
    .sidebar-logo-inside {
        display: none;
    }
    
    .sidebar-logo-outside {
        left: 90px;
        top: 25px;
    }
    
    .sidebar-logo-outside img {
        max-width: 90px;
    }
    
    .nav-text {
        display: none;
    }
    
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // GESTION DE L'ACCORDÉON BIBLIOTHÈQUE
    const libraryToggle = document.getElementById('library-toggle');
    const dropdown = document.getElementById('library-dropdown');
    const content = document.getElementById('library-content');
    
    let currentFilter = 'recentes';
    
    // Toggle dropdown
    if (libraryToggle) {
        libraryToggle.addEventListener('click', function() {
            libraryToggle.classList.toggle('active');
            dropdown.classList.toggle('show');
        });
    }
    
    // Options du dropdown
    document.querySelectorAll('.dropdown-option').forEach(option => {
        option.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            currentFilter = filter;
            
            // Update active state
            document.querySelectorAll('.dropdown-option').forEach(opt => {
                opt.classList.remove('active');
            });
            this.classList.add('active');
            
            // Update toggle text
            const toggleText = libraryToggle.querySelector('.toggle-text');
            toggleText.textContent = this.textContent;
            
            // Close dropdown
            libraryToggle.classList.remove('active');
            dropdown.classList.remove('show');
            
            // Update content
            displayLibrary(filter);
        });
    });
    
    // Afficher la bibliothèque
    function displayLibrary(filter) {
        let tracks = [];
        
        if (filter === 'recentes') {
            const played = JSON.parse(localStorage.getItem('vibesic_recently_played') || '[]');
            const saved = JSON.parse(localStorage.getItem('vibesic_recently_saved') || '[]');
            tracks = [...new Set([...played, ...saved])].slice(0, 10);
        } else if (filter === 'ecoutees') {
            tracks = JSON.parse(localStorage.getItem('vibesic_recently_played') || '[]');
        } else if (filter === 'enregistrees') {
            tracks = JSON.parse(localStorage.getItem('vibesic_recently_saved') || '[]');
        }
        
        if (tracks.length === 0) {
            content.innerHTML = '<div class="library-empty" style="text-align:center;padding:60px 20px;color:#999;font-family:\'Coolvetica\',sans-serif;font-size:18px;">Aucun titre pour le moment</div>';
            return;
        }
        
        content.innerHTML = tracks.map(track => `
            <div class="library-track">
                <span class="play-icon" data-playing="false">
                    <svg width="32" height="32" viewBox="0 0 32 32">
                        <circle cx="16" cy="16" r="15" stroke-width="2"/>
                        <polygon points="13,10 23,16 13,22" fill="#fff"/>
                    </svg>
                </span>
                <span class="music-title-text">${track}</span>
            </div>
        `).join('');
    }
    
    // Initialiser avec "Titres de musique"
    displayLibrary('recentes');
    
    // ANCIEN CODE - Sidebar Library
    function renderSidebarLibrary() {
        const played = JSON.parse(localStorage.getItem('vibesic_recently_played') || '[]');
        const saved = JSON.parse(localStorage.getItem('vibesic_recently_saved') || '[]');
        const playedList = document.getElementById('library-recently-played');
        const savedList = document.getElementById('library-recently-saved');
        
        if (playedList) {
            playedList.innerHTML = played.length ? 
                played.map(t => `<li>${t}</li>`).join('') : 
                '<li style="color:#aaa;font-style:italic;">Aucun titre</li>';
        }
        
        if (savedList) {
            savedList.innerHTML = saved.length ? 
                saved.map(t => `<li>${t}</li>`).join('') : 
                '<li style="color:#aaa;font-style:italic;">Aucun titre</li>';
        }
    }

    // Accordéon (ancien)
    const accBtns = document.querySelectorAll('.biblio-acc-btn');
    accBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const target = btn.getAttribute('data-target');
            const panel = document.getElementById('biblio-panel-' + target);
            const isOpen = btn.classList.contains('active');
            
            // Fermer tous les panneaux
            accBtns.forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.biblio-acc-panel').forEach(p => p.style.display = 'none');
            
            if (!isOpen) {
                btn.classList.add('active');
                if (panel) panel.style.display = 'block';
            }
        });
    });
    
    // Ouvre le premier par défaut
    if (accBtns[0]) accBtns[0].click();

    renderSidebarLibrary();

    // Sidebar toggle
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const sidebar = document.querySelector('.sidebar');
    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            sidebar.classList.toggle('collapsed');
        });
    }
});
</script>

<?php wp_footer(); ?>
</body>
<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoA6DQD021OlistMZC1ZlUPq8cxEN4l4p3Gm5t9UJ0Z" crossorigin="anonymous"></script>
</html>