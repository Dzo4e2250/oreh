/**
 * Hosekr tema - Glavna JavaScript datoteka
 */

document.addEventListener('DOMContentLoaded', function() {
    // Elementi
    const header = document.getElementById('site-header');
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mainNav = document.getElementById('main-nav');
    const navLinks = document.querySelectorAll('.nav-link');
    const contactForm = document.getElementById('hosekr-contact-form');

    // Header scroll efekt
    function handleScroll() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Preveri ob nalaganju

    // Mobilni meni
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            this.classList.toggle('active');
        });
    }

    // Zapri mobilni meni ob kliku na povezavo
    navLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            mainNav.classList.remove('active');
            if (mobileMenuToggle) {
                mobileMenuToggle.classList.remove('active');
            }
        });
    });

    // Gladko pomikanje do sekcij
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                const headerHeight = header.offsetHeight;
                const targetPosition = targetElement.offsetTop - headerHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Animacija števil (počakaj da sekcija pride v pogled)
    const observerOptions = {
        threshold: 0.5
    };

    const countObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                animateNumbers();
                countObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const whyUsSection = document.getElementById('why-us');
    if (whyUsSection) {
        countObserver.observe(whyUsSection);
    }

    function animateNumbers() {
        const numbers = document.querySelectorAll('.why-us-number');

        numbers.forEach(function(numberEl) {
            const target = parseInt(numberEl.getAttribute('data-count'));
            const suffix = numberEl.textContent.replace(/[0-9]/g, '');
            let current = 0;
            const increment = target / 50;
            const duration = 2000;
            const stepTime = duration / 50;

            const timer = setInterval(function() {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                numberEl.textContent = Math.floor(current) + suffix;
            }, stepTime);
        });
    }

    // Kontaktni obrazec
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            formData.append('action', 'hosekr_contact');

            const submitBtn = this.querySelector('button[type="submit"]');
            const formMessage = document.getElementById('form-message');
            const originalBtnText = submitBtn.textContent;

            submitBtn.textContent = 'Pošiljanje...';
            submitBtn.disabled = true;

            fetch(hosekrAjax.ajaxurl, {
                method: 'POST',
                body: formData
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                formMessage.style.display = 'block';

                if (data.success) {
                    formMessage.style.backgroundColor = '#E8F5E9';
                    formMessage.style.color = '#2E7D32';
                    formMessage.textContent = data.data.message;
                    contactForm.reset();
                } else {
                    formMessage.style.backgroundColor = '#FFEBEE';
                    formMessage.style.color = '#C62828';
                    formMessage.textContent = data.data.message;
                }
            })
            .catch(function(error) {
                formMessage.style.display = 'block';
                formMessage.style.backgroundColor = '#FFEBEE';
                formMessage.style.color = '#C62828';
                formMessage.textContent = 'Pri pošiljanju je prišlo do napake. Prosimo, poskusite znova.';
            })
            .finally(function() {
                submitBtn.textContent = originalBtnText;
                submitBtn.disabled = false;

                // Skrij sporočilo po 5 sekundah
                setTimeout(function() {
                    formMessage.style.display = 'none';
                }, 5000);
            });
        });
    }

    // Animacija elementov ob scrollu
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.service-card, .project-card, .about-content, .about-image');

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        elements.forEach(function(el) {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    };

    animateOnScroll();
});
