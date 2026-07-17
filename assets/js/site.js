const menuButton = document.querySelector('.menu-toggle');
const navigation = document.querySelector('#primary-nav');
const siteBase = document.querySelector('base')?.getAttribute('href');

if (siteBase) {
  document.querySelectorAll('a[href^="/"]').forEach((link) => {
    const href = link.getAttribute('href');
    if (href && !href.startsWith('//')) link.setAttribute('href', siteBase + href.slice(1));
  });
}

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

document.querySelectorAll('[data-lead-form]').forEach((form) => {
  const status = form.querySelector('[data-form-status]');
  const button = form.querySelector('button[type="submit"]');

  form.addEventListener('submit', async (event) => {
    event.preventDefault();
    if (!form.checkValidity()) {
      form.reportValidity();
      if (status) {
        status.textContent = 'Please complete the required fields.';
        status.dataset.state = 'error';
      }
      return;
    }

    if (status) {
      status.textContent = 'Sending your enquiry...';
      status.dataset.state = 'pending';
    }
    if (button) button.disabled = true;

    try {
      const response = await fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: { Accept: 'application/json' },
      });
      const data = await response.json();
      if (!response.ok || !data.ok) throw new Error(data.message || 'Please try again.');
      form.reset();
      if (status) {
        status.textContent = data.message;
        status.dataset.state = 'success';
      }
    } catch (error) {
      if (status) {
        status.textContent = error.message || 'Something went wrong. Please try again.';
        status.dataset.state = 'error';
      }
    } finally {
      if (button) button.disabled = false;
    }
  });
});
