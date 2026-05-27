document.addEventListener('DOMContentLoaded', () => {
    // 1. Automatically set default dates on load (Today and Tomorrow)
    const today = new Date();
    const tomorrow = new Date();
    tomorrow.setDate(today.getDate() + 1);

    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');

    if (startDateInput) {
        startDateInput.value = today.toISOString().split('T')[0];
    }
    if (endDateInput) {
        endDateInput.value = tomorrow.toISOString().split('T')[0];
    }

    // 2. Attach 'change' event listeners to both date fields dynamically for validation
    if (startDateInput) {
        startDateInput.addEventListener('change', validateDates);
    }
    if (endDateInput) {
        endDateInput.addEventListener('change', validateDates);
    }

    // 3. Attach the submit event listener dynamically to handle the calculations
    const form = document.getElementById('calcForm');
    if (form) {
        form.addEventListener('submit', function(event) {
            // Stops the browser from reloading the page
            event.preventDefault(); 
            
            // Call the calculation function
            calculateTour(); 
        });
    }

    // 4. FIXED: Attach the click event to the Reset button to prevent fallback form behaviors
    const resetBtn = document.getElementById('resetBtn');
    if (resetBtn) {
        resetBtn.addEventListener('click', resetCalculator);
    }
});

// Validation function remains clean and unchanged
function validateDates() {
    const startInput = document.getElementById('startDate');
    const endInput = document.getElementById('endDate');
    const dateError = document.getElementById('dateError');

    if (!startInput || !endInput) return false;

    const start = new Date(startInput.value);
    const end = new Date(endInput.value);

    // If both dates are filled and end date is before start date
    if (startInput.value && endInput.value && end < start) {
        if (dateError) dateError.style.display = 'block';
        return false;
    } else {
        if (dateError) dateError.style.display = 'none';
        return true;
    }
}

// Calculation logic execution
function calculateTour() {
    if (!validateDates()) return;

    const startDateVal = document.getElementById('startDate').value;
    const endDateVal = document.getElementById('endDate').value;
    const perDayHire = parseFloat(document.getElementById('perDayHire').value) || 0;
    const extraCharges = parseFloat(document.getElementById('extraCharges').value) || 0;
    const extraNote = document.getElementById('extraNote').value.trim();
    
    const resultsBox = document.getElementById('resultsBox');

    const start = new Date(startDateVal);
    const end = new Date(endDateVal);

    // Calculate inclusive days
    const timeDiff = end.getTime() - start.getTime();
    let totalDays = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1; 

    // Cost breakdowns
    const baseCost = totalDays * perDayHire;
    const totalTourCharge = baseCost + extraCharges;

    // Update UI elements
    document.getElementById('resTotalDays').textContent = totalDays + (totalDays === 1 ? ' Day' : ' Days');
    document.getElementById('resBaseCost').textContent = `$${baseCost.toFixed(2)} (${totalDays} x $${perDayHire.toFixed(2)})`;
    
    // Handle optional extra charges label
    const extraRow = document.getElementById('resExtraRow');
    if (extraCharges > 0) {
        extraRow.style.display = 'flex';
        document.getElementById('resExtraLabel').textContent = extraNote ? `Extra (${extraNote}):` : 'Extra Charges:';
        document.getElementById('resExtraCost').textContent = `$${extraCharges.toFixed(2)}`;
    } else {
        extraRow.style.display = 'none';
    }

    document.getElementById('resTotalCharge').textContent = '$' + totalTourCharge.toFixed(2);
    if (resultsBox) resultsBox.classList.add('active');
}

// Reset wrapper execution
function resetCalculator() {
    const calcForm = document.getElementById('calcForm');
    const resultsBox = document.getElementById('resultsBox');
    const dateError = document.getElementById('dateError');
    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');

    if (calcForm) calcForm.reset();
    if (resultsBox) resultsBox.classList.remove('active');
    if (dateError) dateError.style.display = 'none';
    
    // Trigger date reset to default (Today and Tomorrow)
    const today = new Date();
    const tomorrow = new Date();
    tomorrow.setDate(today.getDate() + 1);
    
    if (startDateInput) startDateInput.value = today.toISOString().split('T')[0];
    if (endDateInput) endDateInput.value = tomorrow.toISOString().split('T')[0];
}