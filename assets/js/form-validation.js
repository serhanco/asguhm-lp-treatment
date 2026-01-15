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

    // Clear previous errors and ARIA attributes
    form.querySelectorAll('.is-invalid').forEach(el => {
      el.classList.remove('is-invalid');
      el.removeAttribute('aria-invalid');
      el.removeAttribute('aria-describedby');
    });
    form.querySelectorAll('.error-message').forEach(el => el.remove());

    // Helper function to display error
    const displayError = (inputElement, message) => {
      isValid = false;
      inputElement.classList.add('is-invalid');
      inputElement.setAttribute('aria-invalid', 'true');

      const errorDiv = document.createElement('div');
      const errorId = `${inputElement.id}-error`;
      errorDiv.id = errorId;
      errorDiv.className = 'error-message text-danger mt-1';
      errorDiv.textContent = message;
      
      // Insert error message after the input element
      inputElement.insertAdjacentElement('afterend', errorDiv);
      inputElement.setAttribute('aria-describedby', errorId);
    };

    // Check required fields
    form.querySelectorAll('[required]').forEach(input => {
      if (!input.value.trim()) {
        displayError(input, input.dataset.msg || 'This field is required.');
      }
    });

    // Helper for phone/email validation
    const validatePhoneEmail = (formElement, displayErrorFn) => {
        let phoneEmailValid = true;
        const phoneInput = formElement.querySelector('input[name="Phone"]');
        const emailInput = formElement.querySelector('input[name="Mail"]');

        if (phoneInput && emailInput) {
            const isPhoneFilled = phoneInput.value.trim().length > 0;
            const isEmailFilled = emailInput.value.trim().length > 0;

            const isPhoneValidFormat = phoneInput.value.trim().length >= 6;
            const isEmailValidFormat = emailInput.value.trim().length >= 6 && emailInput.value.includes('@') && emailInput.value.includes('.');

            if (!isPhoneFilled && !isEmailFilled) {
                // If both are completely empty, treat as an error for both
                const errorMessage = phoneInput.dataset.msg || emailInput.dataset.msg || 'Please fill at least one of the phone or email fields.';
                displayErrorFn(phoneInput, errorMessage);
                displayErrorFn(emailInput, errorMessage);
                phoneEmailValid = false;
            } else if (isPhoneFilled && !isPhoneValidFormat) {
                // If phone is filled but invalid format
                const errorMessage = phoneInput.dataset.msg || 'Please enter a valid phone number (at least 6 characters).';
                displayErrorFn(phoneInput, errorMessage);
                phoneEmailValid = false;
            } else if (isEmailFilled && !isEmailValidFormat) {
                // If email is filled but invalid format
                const errorMessage = emailInput.dataset.msg || 'Please enter a valid email address (at least 6 characters, including @ and .).';
                displayErrorFn(emailInput, errorMessage);
                phoneEmailValid = false;
            }
        }
        return phoneEmailValid;
    };

    // ... (rest of handleFormSubmit) ...

    // Special validation for phone/email
    if (!validatePhoneEmail(form, displayError)) {
        isValid = false;
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

    // Handle modal button clicks to populate form messages
    const handleModalButtonClick = (e) => {
      const target = e.target.closest('.btn-apply, .btn-appointment');
      if (!target) return;

      const modal = target.closest('.modal');
      if (!modal) return;

      const title = modal.querySelector('.modal-title').textContent.replace(' Details', '').trim();
      let targetTextarea;

      if (target.classList.contains('btn-apply')) {
        targetTextarea = select('#f1message');
      } else if (target.classList.contains('btn-appointment')) {
        targetTextarea = select('#f2message');
      }

      if (targetTextarea) {
        targetTextarea.value = `I am interested in the ${title} package.`;
      }
      
      // Manually hide the modal
      const modalInstance = bootstrap.Modal.getInstance(modal);
      if (modalInstance) {
          modalInstance.hide();
      }
    };

    on('click', document, handleModalButtonClick, true);
  });

})();