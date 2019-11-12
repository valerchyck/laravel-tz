require('./bootstrap');

window.applyFilter = function (formId) {
  document.querySelector(`#${formId}`).submit();
};
