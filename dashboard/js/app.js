// alerts
const hideAlert = () => {
  const el = document.querySelector('.cust_alert');
  if (el)
    el.parentElement.removeChild(el);
};
const showAlert = (msg, time = 3) => {
  hideAlert();
  const markup = `<div class="cust_alert">${msg}</div>`;
  document.querySelector('body').insertAdjacentHTML('afterbegin', markup);
  window.setTimeout(hideAlert, time * 1000);
};