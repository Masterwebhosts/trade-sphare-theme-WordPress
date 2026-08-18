document.addEventListener('DOMContentLoaded', function () {

    const toggle = document.querySelector('.ts-menu-toggle');
    const navigation = document.querySelector('.ts-navigation');

    if (!toggle || !navigation) {
        return;
    }

    toggle.addEventListener('click', function () {

        const isOpen = toggle.getAttribute('aria-expanded') === 'true';
        const nextState = !isOpen;

        toggle.setAttribute('aria-expanded', String(nextState));
        navigation.classList.toggle('is-open', nextState);

    });

});