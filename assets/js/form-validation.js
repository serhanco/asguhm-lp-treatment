(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim();
    if (all) {
      return [...document.querySelectorAll(el)];
    } else {
      return document.querySelector(el);
    }
  };

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all);
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener));
      } else {
        selectEl.addEventListener(type, listener);
      }
    }
  };

  /**
   * Centralized Form Validation Logic
   */
  const handleFormSubmit = (e) => {
    e.preventDefault();
    const form = e.target;
    const submitButton = form.querySelector('button[type="submit"]');
    let isValid = true;

    // Clear previous errors
    form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    form.querySelectorAll('.error-message').forEach(el => el.remove());

    // Check required fields
    form.querySelectorAll('[required]').forEach(input => {
      if (!input.value.trim()) {
        isValid = false;
        input.classList.add('is-invalid');
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message text-danger mt-1';
        errorDiv.textContent = input.dataset.msg || 'This field is required.';
        input.parentElement.appendChild(errorDiv);
      }
    });

    // Special validation for phone/email
    const phoneInput = form.querySelector('input[name="Phone"]');
    const emailInput = form.querySelector('input[name="Mail"]');
    if (phoneInput && emailInput) {
      if (phoneInput.value.length < 6 && emailInput.value.length < 6) {
        isValid = false;
        if (!form.querySelector('.phone-email-error')) {
          const errorDiv = document.createElement('div');
          errorDiv.className = 'error-message text-danger mt-1 phone-email-error';
          errorDiv.textContent = 'Please fill at least one of the phone or email fields with at least 6 characters.';
          const emailParent = emailInput.parentElement;
          emailParent.appendChild(errorDiv);
          phoneInput.classList.add('is-invalid');
          emailInput.classList.add('is-invalid');
        }
      }
    }

    if (isValid) {
      const messageInput = form.querySelector('textarea[name="Message"]');
      
      // Special logic for appointment form (form2)
      if (form.id === 'form2') {
        const pdateInput = form.querySelector('input[name="pdate"]');
        if (pdateInput && messageInput && pdateInput.value) {
          messageInput.value += ' | preferred appointment date: ' + pdateInput.value;
        }
      }

      // Append the exact URL
      const urlInput = form.querySelector('input[name="form_url"]');
      if (urlInput && messageInput && urlInput.value) {
        messageInput.value += ' | Exact URL: ' + urlInput.value;
      }

      // Disable button and submit
      if (submitButton) {
        submitButton.disabled = true;
        const originalButtonText = submitButton.innerHTML;
        submitButton.innerHTML = 'Submitting...';
        setTimeout(() => {
          if (!form.submitted) {
            submitButton.disabled = false;
            submitButton.innerHTML = originalButtonText;
          }
        }, 8000);
      }
      form.submit();
      form.submitted = true;
    }
  };

  // Attach event listeners and set URL when the DOM is ready
  document.addEventListener('DOMContentLoaded', () => {
    // Set the value for all hidden URL fields
    const formUrlFields = select('input[name="form_url"]', true);
    if(formUrlFields.length) {
        formUrlFields.forEach(input => {
            input.value = window.location.href;
        });
    }

    // Attach submit handlers
    on('submit', '#form1', handleFormSubmit);
    on('submit', '#form2', handleFormSubmit);
    on('submit', '#form3', handleFormSubmit);
  });

})();