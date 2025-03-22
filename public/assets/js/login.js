document.addEventListener('DOMContentLoaded', function () {
  const departmentTab = document.getElementById('department-tab');
  const employeeTab = document.getElementById('employee-tab');
  const departmentContent = document.getElementById('department-content');
  const employeeContent = document.getElementById('employee-content');

  departmentTab.addEventListener('click', function () {
    departmentTab.classList.add('active');
    departmentTab.classList.remove('inactive');
    employeeTab.classList.remove('active');
    employeeTab.classList.add('inactive');

    departmentContent.classList.add('active');
    employeeContent.classList.remove('active');
    document.getElementById('logintext').innerText = 'Department Login';
  });


  employeeTab.addEventListener('click', function () {

    employeeTab.classList.add('active');
    employeeTab.classList.remove('inactive');
    departmentTab.classList.remove('active');
    departmentTab.classList.add('inactive');


    employeeContent.classList.add('active');
    departmentContent.classList.remove('active');
    document.getElementById('logintext').innerText = 'Employee Login';

  });


  employeeTab.click();
});
(() => {
  'use strict'


  const forms = document.querySelectorAll('.needs-validation')

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()