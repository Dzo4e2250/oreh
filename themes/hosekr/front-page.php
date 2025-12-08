<?php
/**
 * Predloga za domačo stran (Onepager)
 *
 * @package Hosekr
 */

get_header();
?>

<!-- Hero sekcija -->
<section class="hero" id="hero">
    <div class="hero-content">
        <p class="hero-subtitle"><?php _e('Kakovost in zanesljivost', 'hosekr'); ?></p>
        <h1><?php _e('Vaš partner za fasadne in strešne rešitve', 'hosekr'); ?></h1>
        <p class="hero-description"><?php _e('Specializirani smo za fasadne panele, strešne panele in sodobne mobilne hiške. Zagotavljamo vrhunsko kakovost, energetsko učinkovitost in dolgo življenjsko dobo.', 'hosekr'); ?></p>
        <div class="hero-buttons">
            <a href="#contact" class="btn btn-cta"><?php _e('Zahtevajte brezplačen izračun', 'hosekr'); ?></a>
            <a href="#services" class="btn btn-outline"><?php _e('Naše storitve', 'hosekr'); ?></a>
        </div>
    </div>
    <div class="scroll-indicator">
        <?php echo hosekr_icon('arrow-down'); ?>
    </div>
</section>

<!-- O nas sekcija -->
<section class="about" id="about">
    <div class="container">
        <div class="section-header">
            <p class="section-subtitle"><?php _e('O nas', 'hosekr'); ?></p>
            <h2 class="section-title"><?php _e('Več kot 10 let ', 'hosekr'); ?><span><?php _e('izkušenj', 'hosekr'); ?></span></h2>
        </div>

        <div class="about-grid">
            <div class="about-image">
                <img src="<?php echo HOSEKR_URI; ?>/assets/images/about-placeholder.jpg" alt="<?php _e('O podjetju Hosekr', 'hosekr'); ?>" onerror="this.style.background='linear-gradient(135deg, var(--hosekr-green) 0%, var(--hosekr-blue) 100%)'; this.style.minHeight='400px';">
                <div class="about-image-accent"></div>
            </div>

            <div class="about-content">
                <h3><?php _e('Strokovnjaki za vaš dom in poslovne objekte', 'hosekr'); ?></h3>
                <p><?php _e('Pri Hosekru smo predani odličnosti v gradbeništvu. Naša ekipa strokovnjakov ima bogate izkušnje pri montaži fasadnih in strešnih panelov ter gradnji sodobnih mobilnih hiš.', 'hosekr'); ?></p>
                <p><?php _e('Uporabljamo samo vrhunske materiale priznanih proizvajalcev, ki zagotavljajo dolgotrajno kakovost, energetsko učinkovitost in estetsko dovršenost vaših objektov.', 'hosekr'); ?></p>

                <div class="about-features">
                    <div class="about-feature">
                        <?php echo hosekr_icon('check'); ?>
                        <span><?php _e('Certificirani materiali', 'hosekr'); ?></span>
                    </div>
                    <div class="about-feature">
                        <?php echo hosekr_icon('check'); ?>
                        <span><?php _e('Strokovna montaža', 'hosekr'); ?></span>
                    </div>
                    <div class="about-feature">
                        <?php echo hosekr_icon('check'); ?>
                        <span><?php _e('Garancija na delo', 'hosekr'); ?></span>
                    </div>
                    <div class="about-feature">
                        <?php echo hosekr_icon('check'); ?>
                        <span><?php _e('Brezplačen ogled', 'hosekr'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Storitve sekcija -->
<section class="services" id="services">
    <div class="container">
        <div class="section-header">
            <p class="section-subtitle"><?php _e('Storitve', 'hosekr'); ?></p>
            <h2 class="section-title"><?php _e('Kaj ', 'hosekr'); ?><span><?php _e('ponujamo', 'hosekr'); ?></span></h2>
        </div>

        <div class="services-grid">
            <!-- Fasadni paneli -->
            <div class="service-card">
                <div class="service-icon">
                    <?php echo hosekr_icon('facade'); ?>
                </div>
                <h3><?php _e('Fasadni paneli', 'hosekr'); ?></h3>
                <p><?php _e('Sodobni fasadni paneli za energetsko učinkovite in vizualno privlačne objekte. Široka izbira barv in materialov za vsak projekt.', 'hosekr'); ?></p>
                <a href="#contact" class="service-link">
                    <?php _e('Povpraševanje', 'hosekr'); ?>
                    <?php echo hosekr_icon('arrow-right'); ?>
                </a>
            </div>

            <!-- Strešni paneli -->
            <div class="service-card">
                <div class="service-icon">
                    <?php echo hosekr_icon('roof'); ?>
                </div>
                <h3><?php _e('Strešni paneli', 'hosekr'); ?></h3>
                <p><?php _e('Vzdržljivi strešni paneli z odlično toplotno in zvočno izolacijo. Zaščita pred vsemi vremenskimi vplivi in dolga življenjska doba.', 'hosekr'); ?></p>
                <a href="#contact" class="service-link">
                    <?php _e('Povpraševanje', 'hosekr'); ?>
                    <?php echo hosekr_icon('arrow-right'); ?>
                </a>
            </div>

            <!-- Mobilne hiške -->
            <div class="service-card">
                <div class="service-icon">
                    <?php echo hosekr_icon('house'); ?>
                </div>
                <h3><?php _e('Mobilne hiške', 'hosekr'); ?></h3>
                <p><?php _e('Sodobne mobilne hiške po meri. Idealne za počitniške objekte, dodatne bivalne prostore ali kot trajne rešitve za bivanje.', 'hosekr'); ?></p>
                <a href="#contact" class="service-link">
                    <?php _e('Povpraševanje', 'hosekr'); ?>
                    <?php echo hosekr_icon('arrow-right'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Zakaj mi sekcija -->
<section class="why-us" id="why-us">
    <div class="container">
        <div class="section-header">
            <p class="section-subtitle"><?php _e('Zakaj izbrati nas', 'hosekr'); ?></p>
            <h2 class="section-title"><?php _e('Številke govorijo zase', 'hosekr'); ?></h2>
        </div>

        <div class="why-us-grid">
            <div class="why-us-item">
                <div class="why-us-number" data-count="15000">15.000+</div>
                <h4><?php _e('Pokritih objektov', 'hosekr'); ?></h4>
                <p><?php _e('Več kot 15.000 uspešno pokritih streh in fasad', 'hosekr'); ?></p>
            </div>

            <div class="why-us-item">
                <div class="why-us-number" data-count="10">10+</div>
                <h4><?php _e('Let izkušenj', 'hosekr'); ?></h4>
                <p><?php _e('Desetletje strokovnih izkušenj v panogi', 'hosekr'); ?></p>
            </div>

            <div class="why-us-item">
                <div class="why-us-number" data-count="98">98%</div>
                <h4><?php _e('Zadovoljnih strank', 'hosekr'); ?></h4>
                <p><?php _e('Visoka stopnja zadovoljstva naših strank', 'hosekr'); ?></p>
            </div>

            <div class="why-us-item">
                <div class="why-us-number" data-count="15">15</div>
                <h4><?php _e('Strokovnjakov', 'hosekr'); ?></h4>
                <p><?php _e('Usposobljenih in izkušenih monterjev', 'hosekr'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Projekti sekcija -->
<section class="projects" id="projects">
    <div class="container">
        <div class="section-header">
            <p class="section-subtitle"><?php _e('Projekti', 'hosekr'); ?></p>
            <h2 class="section-title"><?php _e('Naše ', 'hosekr'); ?><span><?php _e('reference', 'hosekr'); ?></span></h2>
        </div>

        <div class="projects-grid">
            <div class="project-card">
                <img src="<?php echo HOSEKR_URI; ?>/assets/images/project-1.jpg" alt="<?php _e('Projekt fasadni paneli', 'hosekr'); ?>" onerror="this.style.background='linear-gradient(135deg, #2E7D32 0%, #1565C0 100%)';">
                <div class="project-overlay">
                    <h4><?php _e('Poslovni objekt Ljubljana', 'hosekr'); ?></h4>
                    <p><?php _e('Fasadni paneli', 'hosekr'); ?></p>
                </div>
            </div>

            <div class="project-card">
                <img src="<?php echo HOSEKR_URI; ?>/assets/images/project-2.jpg" alt="<?php _e('Projekt strešni paneli', 'hosekr'); ?>" onerror="this.style.background='linear-gradient(135deg, #1565C0 0%, #2E7D32 100%)';">
                <div class="project-overlay">
                    <h4><?php _e('Industrijska hala Maribor', 'hosekr'); ?></h4>
                    <p><?php _e('Strešni paneli', 'hosekr'); ?></p>
                </div>
            </div>

            <div class="project-card">
                <img src="<?php echo HOSEKR_URI; ?>/assets/images/project-3.jpg" alt="<?php _e('Projekt mobilna hiška', 'hosekr'); ?>" onerror="this.style.background='linear-gradient(135deg, #4CAF50 0%, #1976D2 100%)';">
                <div class="project-overlay">
                    <h4><?php _e('Počitniška hiška Bled', 'hosekr'); ?></h4>
                    <p><?php _e('Mobilna hiška', 'hosekr'); ?></p>
                </div>
            </div>

            <div class="project-card">
                <img src="<?php echo HOSEKR_URI; ?>/assets/images/project-4.jpg" alt="<?php _e('Projekt fasadni paneli', 'hosekr'); ?>" onerror="this.style.background='linear-gradient(135deg, #1B5E20 0%, #0D47A1 100%)';">
                <div class="project-overlay">
                    <h4><?php _e('Stanovanjski objekt Celje', 'hosekr'); ?></h4>
                    <p><?php _e('Fasadni paneli', 'hosekr'); ?></p>
                </div>
            </div>

            <div class="project-card">
                <img src="<?php echo HOSEKR_URI; ?>/assets/images/project-5.jpg" alt="<?php _e('Projekt strešni paneli', 'hosekr'); ?>" onerror="this.style.background='linear-gradient(135deg, #2E7D32 0%, #1976D2 100%)';">
                <div class="project-overlay">
                    <h4><?php _e('Skladišče Kranj', 'hosekr'); ?></h4>
                    <p><?php _e('Strešni paneli', 'hosekr'); ?></p>
                </div>
            </div>

            <div class="project-card">
                <img src="<?php echo HOSEKR_URI; ?>/assets/images/project-6.jpg" alt="<?php _e('Projekt mobilna hiška', 'hosekr'); ?>" onerror="this.style.background='linear-gradient(135deg, #4CAF50 0%, #0D47A1 100%)';">
                <div class="project-overlay">
                    <h4><?php _e('Moderna hiška Koper', 'hosekr'); ?></h4>
                    <p><?php _e('Mobilna hiška', 'hosekr'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kontakt sekcija -->
<section class="contact" id="contact">
    <div class="container">
        <div class="section-header">
            <p class="section-subtitle"><?php _e('Kontakt', 'hosekr'); ?></p>
            <h2 class="section-title"><?php _e('Stopite v ', 'hosekr'); ?><span><?php _e('stik', 'hosekr'); ?></span></h2>
        </div>

        <div class="contact-grid">
            <div class="contact-info">
                <h3><?php _e('Pošljite nam povpraševanje', 'hosekr'); ?></h3>
                <p><?php _e('Zainteresirani za naše storitve? Izpolnite obrazec ali nas kontaktirajte neposredno. Z veseljem vam pripravimo brezplačno ponudbo in svetujemo pri izbiri najboljše rešitve za vaš projekt.', 'hosekr'); ?></p>

                <div class="contact-details">
                    <?php
                    $phone = get_theme_mod('hosekr_phone', '+386 40 123 456');
                    $phone_clean = preg_replace('/[^0-9+]/', '', $phone);
                    $email = get_theme_mod('hosekr_email', 'info@hosekr.si');
                    ?>
                    <div class="contact-item">
                        <?php echo hosekr_icon('phone'); ?>
                        <div>
                            <h5><?php _e('Telefon', 'hosekr'); ?></h5>
                            <p><a href="tel:<?php echo esc_attr($phone_clean); ?>" class="contact-link"><?php echo esc_html($phone); ?></a></p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <?php echo hosekr_icon('email'); ?>
                        <div>
                            <h5><?php _e('E-pošta', 'hosekr'); ?></h5>
                            <p><a href="mailto:<?php echo esc_attr($email); ?>" class="contact-link"><?php echo esc_html($email); ?></a></p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <?php echo hosekr_icon('location'); ?>
                        <div>
                            <h5><?php _e('Naslov', 'hosekr'); ?></h5>
                            <p><?php echo esc_html(get_theme_mod('hosekr_address', 'Slovenska cesta 1, 1000 Ljubljana')); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <form id="hosekr-contact-form" method="post">
                    <?php wp_nonce_field('hosekr_contact_form', 'hosekr_nonce'); ?>

                    <div class="form-group">
                        <label for="contact-name"><?php _e('Ime in priimek *', 'hosekr'); ?></label>
                        <input type="text" id="contact-name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="contact-email"><?php _e('E-poštni naslov *', 'hosekr'); ?></label>
                        <input type="email" id="contact-email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="contact-phone"><?php _e('Telefonska številka', 'hosekr'); ?></label>
                        <input type="tel" id="contact-phone" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="contact-service"><?php _e('Storitev', 'hosekr'); ?></label>
                        <select id="contact-service" name="service">
                            <option value=""><?php _e('Izberite storitev', 'hosekr'); ?></option>
                            <option value="fasadni-paneli"><?php _e('Fasadni paneli', 'hosekr'); ?></option>
                            <option value="stresni-paneli"><?php _e('Strešni paneli', 'hosekr'); ?></option>
                            <option value="mobilne-hiske"><?php _e('Mobilne hiške', 'hosekr'); ?></option>
                            <option value="drugo"><?php _e('Drugo', 'hosekr'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="contact-message"><?php _e('Sporočilo *', 'hosekr'); ?></label>
                        <textarea id="contact-message" name="message" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-cta"><?php _e('Pošljite povpraševanje', 'hosekr'); ?></button>

                    <div class="form-message" id="form-message" style="display: none; margin-top: 20px; padding: 15px; border-radius: 5px;"></div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
