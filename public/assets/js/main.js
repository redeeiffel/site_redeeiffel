
document.addEventListener('DOMContentLoaded', function () {
    if (typeof M === 'undefined') {
        console.error('Materialize não foi carregado.');
        return;
    }

    // Menu lateral
    M.Sidenav.init(document.querySelectorAll('.sidenav'));

    // Efeito parallax
    M.Parallax.init(document.querySelectorAll('.parallax'));

    // Janelas modais
    M.Modal.init(document.querySelectorAll('.modal'));

    // Slider principal
    M.Slider.init(document.querySelectorAll('.slider'), {
        indicators: true,
        height: 600,
        duration: 600,
        interval: 6000
    });

    // Menus suspensos
    M.Dropdown.init(document.querySelectorAll('.dropdown-trigger'), {
        hover: false,
        inDuration: 200,
        outDuration: 300,
        coverTrigger: false
    });

    // Separadores
    M.Tabs.init(document.querySelectorAll('.tabs'));
});

// Alternância dos separadores personalizados
function openCity(evt, cityName) {
    const tabcontent = document.getElementsByClassName('tabcontent');
    const tablinks = document.getElementsByClassName('tablinks');

    for (let i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = 'none';
    }

    for (let i = 0; i < tablinks.length; i++) {
        tablinks[i].className =
            tablinks[i].className.replace(' active', '');
    }

    const target = document.getElementById(cityName);

    if (target) {
        target.style.display = 'block';
    }

    if (evt && evt.currentTarget) {
        evt.currentTarget.className += ' active';
    }
}
