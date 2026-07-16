const menuButton = document.querySelector('.menu-toggle');
const navigation = document.querySelector('#primary-nav');

if (menuButton && navigation) {
  menuButton.addEventListener('click', () => {
    const open = menuButton.getAttribute('aria-expanded') === 'true';
    menuButton.setAttribute('aria-expanded', String(!open));
    navigation.classList.toggle('open', !open);
  });

  navigation.addEventListener('click', (event) => {
    if (event.target.closest('a')) {
      menuButton.setAttribute('aria-expanded', 'false');
      navigation.classList.remove('open');
    }
  });
}

document.querySelectorAll('.accordions details').forEach((item) => {
  item.addEventListener('toggle', () => {
    if (!item.open) return;
    document.querySelectorAll('.accordions details').forEach((other) => {
      if (other !== item) other.open = false;
    });
  });
});
