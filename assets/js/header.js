document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector('.ts-menu-toggle');
    const navigation = document.querySelector('#ts-primary-navigation');

    if (!toggle || !navigation) {
        return;
    }

    toggle.addEventListener('click', function () {
        const isOpen = toggle.getAttribute('aria-expanded') === 'true';

        toggle.setAttribute('aria-expanded', String(!isOpen));
        navigation.classList.toggle('is-open', !isOpen);
    });

    navigation.addEventListener('click', function (event) {
        const link = event.target.closest('a');

        if (!link) {
            return;
        }

        toggle.setAttribute('aria-expanded', 'false');
        navigation.classList.remove('is-open');
    });

    document.addEventListener('keydown', function (event) {
        if (event.key !== 'Escape') {
            return;
        }

        toggle.setAttribute('aria-expanded', 'false');
        navigation.classList.remove('is-open');
    });
});