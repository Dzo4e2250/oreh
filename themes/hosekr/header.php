<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
    <div class="container">
        <div class="header-inner">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    Ho<span>sekr</span>
                <?php endif; ?>
            </a>

            <nav class="main-nav" id="main-nav">
                <ul>
                    <li><a href="#hero" class="nav-link">Domov</a></li>
                    <li><a href="#about" class="nav-link">O nas</a></li>
                    <li><a href="#services" class="nav-link">Storitve</a></li>
                    <li><a href="#projects" class="nav-link">Projekti</a></li>
                    <li><a href="#contact" class="nav-link">Kontakt</a></li>
                </ul>
            </nav>

            <div class="mobile-menu-toggle" id="mobile-menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>

<main id="main-content">
