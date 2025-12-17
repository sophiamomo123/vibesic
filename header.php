<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Vibesic, plateforme de musique.">
    <meta name="robots" content="index, follow">
    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="https://use.typekit.net/ntg0fjv.css">
    <link rel="stylesheet" href="MusticaPro.otf">
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

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
            margin-top: 24px;
    
}

        .logo-image {
           height: 22px;
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



@media (max-width: 480px) {
    .logo-image {
        height: 26px;
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
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="vibesic-header">
        <a href="<?= esc_url(home_url('')); ?>" class="vibesic-logo">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.webp" alt="Vibesic" class="logo-image">
</a>
        
        
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
        <!-- Bootstrap 5 JS Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoA6DQD021OlistMZC1ZlUPq8cxEN4l4p3Gm5t9UJ0Z" crossorigin="anonymous"></script>