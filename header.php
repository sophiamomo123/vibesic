<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="https://use.typekit.net/ntg0fjv.css">
    <link rel="stylesheet" href="MusticaPro.otf">
    
    <?php wp_head(); ?>
    


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-weight: 400;
            font-style: normal;
            font-family:'MusticaPro', sans-serif;
            letter-spacing: 2px;
            background-color: #ffffffff;

        }

        .vibesic-header {
            background-color: #ffffff;
            padding: 15px 55px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

       .vibesic-logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            cursor: pointer;
            margin-top: 10px;
    
}

        .logo-image {
           height: 60px;
           width: auto;
           display: block;
    
}

@media (max-width: 480px) {
    .logo-image {
        height: 30px;
    }
}
        

        .header-nav {
            display: flex;
            gap: 10px;
            align-items: center;
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
        }

        .btn-orange {
            background-color: #F6843F;
            color: white;
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
            padding: 9px 45px;
            gap: 10px;
            border-radius: 25px;
            cursor: pointer;
        }

        .btn-outline {
            background-color: transparent;
            color: #F6843F;
            border: 2px solid #F6843F;
        }

        .btn-outline:hover {
            background-color: #F6843F;
            color: white;
        }

        .user-welcome {
            font-size: 14px;
            color: #000000ff;
            margin-right: 10px;
        }

        .user-welcome strong {
            color: #F6843F;
        }

        /* Menu hamburger pour mobile */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: #F6843F;
            cursor: pointer;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .vibesic-header {
                padding: 15px 20px;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .header-nav {
                position: fixed;
                top: 70px;
                right: -100%;
                background-color: white;
                flex-direction: column;
                padding: 20px;
                box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
                transition: right 0.3s ease;
                width: 250px;
                height: calc(100vh - 70px);
            }

            .header-nav.active {
                right: 0;
            }

            .header-btn {
                width: 100%;
                text-align: center;
            }

            .user-welcome {
                text-align: center;
                margin-right: 0;
                margin-bottom: 10px;
            }
        }

        @media (max-width: 480px) {
            .vibesic-logo {
                font-size: 22px;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="vibesic-header">
        <a href="<?= esc_url(home_url('')); ?>" class="vibesic-logo">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-vibesic.PNG" alt="Vibesic" class="logo-image">
</a>
        
        <button class="mobile-menu-toggle" onclick="toggleMobileMenu()" aria-label="Menu">
            ☰
        </button>
        
        <nav class="header-nav" id="headerNav">
            <?php if (is_user_logged_in()) : ?>
                <span class="user-welcome">
                    Bonjour <strong><?= esc_html(wp_get_current_user()->display_name); ?></strong>
                </span>
                <a href="<?= esc_url(wp_logout_url(home_url())); ?>" class="header-btn btn-orange">DÉCONNEXION</a>
            <?php else : ?>
                <a href="<?= esc_url(home_url('/template-register')); ?>" class="header-btn btn-orange">S'INSCRIRE</a>
                 <a href="#" class="header-btn btn-orange" onclick="showLogin(); return false;">CONNEXION</a>
            <?php endif; ?>
        </nav>
    </header>

    <main id="main-content">




    
    <script>
        function toggleMobileMenu() {
            const nav = document.getElementById('headerNav');
            nav.classList.toggle('active');
        }

        // Fermer le menu si on clique en dehors
        document.addEventListener('click', function(event) {
            const nav = document.getElementById('headerNav');
            const toggle = document.querySelector('.mobile-menu-toggle');
            
            if (!nav.contains(event.target) && !toggle.contains(event.target)) {
                nav.classList.remove('active');
            }
        });
    </script>