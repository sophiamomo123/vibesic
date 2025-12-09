</main>

<footer class="vibesic-footer">
    <div class="footer-content">
        <a href="<?= esc_url(home_url('')); ?>" class="vibesic-logo">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-vibesic.PNG" alt="Vibesic" class="logo-image">
        
        </a>
    </div>
</footer>

<style>
    .vibesic-footer {
        background-color: #ff7f50;
        padding: 40px 50px;
        margin-top: auto;
        width: 100%;
    }

    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-logo {
        font-size: 32px;
        font-weight: bold;
        color: #000;
        font-family: 'Coolvetica', Arial, sans-serif;
        text-decoration: none;
        display: inline-block;
        transition: opacity 0.3s;
    }

    .footer-logo:hover {
        opacity: 0.8;
    }

    .footer-logo-dot {
        color: #000;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .vibesic-footer {
            padding: 30px 30px;
        }

        .footer-logo {
            font-size: 28px;
        }
    }

    @media (max-width: 480px) {
        .vibesic-footer {
            padding: 25px 20px;
            text-align: center;
        }

        .footer-logo {
            font-size: 24px;
        }
    }
</style>

<?php wp_footer(); ?>
</body>
</html>