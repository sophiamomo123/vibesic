<?php
/**
 * Template Name: Footer Page
 */

get_header();
?>

<div class="footer-page">
    <!-- Header avec logo -->
    <header class="page-header">
        <a href="<?= esc_url(home_url('/')); ?>" class="page-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-vibesic.PNG" alt="Vibesic">
        </a>
    </header>

    <!-- Main Content -->
    <main class="footer-page-main">
        <div class="footer-page-container">
            <h1 class="page-title"><?php the_title(); ?></h1>
            
            <div class="page-content">
                <?php
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </main>
</div>

<style>
/* Masquer le header WordPress */
body > header,
.site-header {
    display: none !important;
}

body {
    padding-top: 0 !important;
    margin: 0;
}

.footer-page {
    min-height: 100vh;
    background-color: #ffffffff;
}

/* Header avec logo */
.page-header {
    background-color: white;
    padding: 30px 60px;
    
}

.page-logo img {
    height: 50px;
    width: auto;
}

/* Main Content */
.footer-page-main {
    max-width: 1200px;
    margin: 0 auto;
    padding: 60px 20px;
}

.footer-page-container {
    background: white;
    padding: 60px 80px;
    border-radius: 20px;
    
}

.page-title {
    font-size: 48px;
    font-weight: bold;
    margin-bottom: 40px;
    font-family: 'Coolvetica', Arial, sans-serif;
}

.page-content {
    font-size: 16px;
    line-height: 1.8;
    color: #333;
}

.page-content h2 {
    font-size: 20px;
    font-weight: bold;
    margin-top: 40px;
    margin-bottom: 15px;
    color: #000;
}

.page-content p {
    margin-bottom: 20px;
}

.page-content strong {
    font-weight: 600;
    color: #000;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header {
        padding: 20px 30px;
    }
    
    .page-logo img {
        height: 40px;
    }
    
    .footer-page-main {
        padding: 30px 20px;
    }
    
    .footer-page-container {
        padding: 40px 30px;
    }
    
    .page-title {
        font-size: 36px;
    }
}
</style>

<?php
get_footer();
?>