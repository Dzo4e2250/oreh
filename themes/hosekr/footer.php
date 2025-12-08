</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-about">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                    Ho<span>sekr</span>
                </a>
                <p><?php _e('Strokovnjaki za fasadne panele, strešne panele in mobilne hiške. Kakovost in zanesljivost od leta 2010.', 'hosekr'); ?></p>
                <div class="social-links">
                    <?php if ($facebook = get_theme_mod('hosekr_facebook')) : ?>
                        <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <?php echo hosekr_icon('facebook'); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($instagram = get_theme_mod('hosekr_instagram')) : ?>
                        <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <?php echo hosekr_icon('instagram'); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($linkedin = get_theme_mod('hosekr_linkedin')) : ?>
                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                            <?php echo hosekr_icon('linkedin'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="footer-col">
                <h4><?php _e('Storitve', 'hosekr'); ?></h4>
                <ul>
                    <li><a href="#services"><?php _e('Fasadni paneli', 'hosekr'); ?></a></li>
                    <li><a href="#services"><?php _e('Strešni paneli', 'hosekr'); ?></a></li>
                    <li><a href="#services"><?php _e('Mobilne hiške', 'hosekr'); ?></a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4><?php _e('Povezave', 'hosekr'); ?></h4>
                <ul>
                    <li><a href="#about"><?php _e('O nas', 'hosekr'); ?></a></li>
                    <li><a href="#projects"><?php _e('Projekti', 'hosekr'); ?></a></li>
                    <li><a href="#contact"><?php _e('Kontakt', 'hosekr'); ?></a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4><?php _e('Kontakt', 'hosekr'); ?></h4>
                <?php
                $phone = get_theme_mod('hosekr_phone', '+386 40 123 456');
                $phone_clean = preg_replace('/[^0-9+]/', '', $phone);
                $email = get_theme_mod('hosekr_email', 'info@hosekr.si');
                ?>
                <ul>
                    <li><a href="tel:<?php echo esc_attr($phone_clean); ?>"><?php echo esc_html($phone); ?></a></li>
                    <li><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></li>
                    <li><?php echo esc_html(get_theme_mod('hosekr_address', 'Slovenska cesta 1, 1000 Ljubljana')); ?></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Hosekr. <?php _e('Vse pravice pridržane.', 'hosekr'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
