// Event snippet for WhatsApp Click - Driver Page conversion page 
document.addEventListener('DOMContentLoaded', function () {
    // 1. Find the WhatsApp button/link by its class or ID
    // Replace '.whatsapp-link' with the actual class of your button
    const whatsappBtn = document.querySelector('#getbutton-whatsapp');

    if (whatsappBtn) {
        whatsappBtn.addEventListener('click', function (event) {
            // Stop the browser from leaving the page immediately
            event.preventDefault();
            const url = this.getAttribute('href');

            // Send the conversion data to Google
            // IMPORTANT: Ensure 'AW-123456789/AbCdEfGhIjK' is your actual ID and Label
            gtag('event', 'conversion', {
                'send_to': 'AW-18163798890/lXEqCIK_xa0cEOqmltVD', 
                'event_callback': function () {
                    // Navigate to WhatsApp after the signal is sent
                    window.location.href = url;
                }
            });
        });
    }
});