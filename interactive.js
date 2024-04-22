// JavaScript for responsive navigation
const navToggle = document.querySelector('.tombol button');
const navMenu = document.querySelector('.tombol nav');

navToggle.addEventListener('click', () => {
  navMenu.classList.toggle('show-nav');
});

// JavaScript for smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    e.preventDefault();

    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth'
    });
  });
});

// JavaScript for form validation
const form = document.querySelector('.contact-form');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const messageInput = document.getElementById('message');

form.addEventListener('submit', function(e) {
  e.preventDefault();
  
  if (validateForm()) {
    // Code to submit the form data to the server
    console.log('Form submitted successfully!');
    form.reset();
  } else {
    console.log('Form validation failed!');
  }
});

function validateForm() {
  let isValid = true;
  
  if (nameInput.value.trim() === '') {
    isValid = false;
    setErrorFor(nameInput, 'Name cannot be blank');
  } else {
    setSuccessFor(nameInput);
  }
  
  if (emailInput.value.trim() === '') {
    isValid = false;
    setErrorFor(emailInput, 'Email cannot be blank');
  } else if (!isValidEmail(emailInput.value.trim())) {
    isValid = false;
    setErrorFor(emailInput, 'Email is not valid');
  } else {
    setSuccessFor(emailInput);
  }
  
  if (messageInput.value.trim() === '') {
    isValid = false;
    setErrorFor(messageInput, 'Message cannot be blank');
  } else {
    setSuccessFor(messageInput);
  }
  
  return isValid;
}

function setErrorFor(input, message) {
  const formControl = input.parentElement;
  const small = formControl.querySelector('small');
  formControl.className = 'contact-form error';
  small.innerText = message;
}

function setSuccessFor(input) {
  const formControl = input.parentElement;
  formControl.className = 'contact-form success';
}

function isValidEmail(email) {
  const regex = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
  return regex.test(email);
}
