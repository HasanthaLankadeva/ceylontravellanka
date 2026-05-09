document.addEventListener("DOMContentLoaded", () => {
      const toggleBtn = document.getElementById('edit-toggle-btn');
      const addRowBtn = document.querySelectorAll('.add-row-btn');
      const saveHTMLBtn = document.getElementById('save-html-btn');
      const savePdfBtn = document.getElementById('save-pdf-btn');
      
      let editMode = false;
      
      const toggleEditMode = () => {
        editMode = !editMode;
        
        const editableElements = document.querySelectorAll('.editable');
        const actionColumns = document.querySelectorAll('.action-column');
        
        editableElements.forEach(el => {
          if (editMode) {
            el.setAttribute('contenteditable', 'true');
            el.classList.add('editable-active');
          } else {
            el.setAttribute('contenteditable', 'false');
            el.classList.remove('editable-active');
          }
        });
        
        if (editMode) {
          document.body.classList.add('edit-mode');
          toggleBtn.innerText = "Disable Edit Mode";
          toggleBtn.style.backgroundColor = "#e63946";
          addRowBtn.forEach(btn => {
            btn.style.display = "inline-block";
          });
        } else {
          document.body.classList.remove('edit-mode');
          toggleBtn.innerText = "Enable Edit Mode";
          toggleBtn.style.backgroundColor = "#1d3557";
          addRowBtn.forEach(btn => {
            btn.style.display = "none";
          });
        }
      };

      toggleBtn.addEventListener('click', toggleEditMode);
      // Loop through each button and add the event listener
      addRowBtn.forEach(button => {
        button.addEventListener('click', addRow);
      });
      
      // 1. Get the page type from the body tag (e.g., 'agreementhtml' or 'quotationhtml')
      const pageType = document.body.getAttribute('data-type') || 'default';
      const storageKey = `savedHTML_${pageType}`;

      // SAVE LOGIC
      saveHTMLBtn.addEventListener('click', () => {
          const data = {
              wrapper: document.getElementById('wrapper').innerHTML,
              timestamp: new Date().toISOString()
          };
          
          // Uses the dynamic key (e.g., savedHTML_agreementhtml)
          localStorage.setItem(storageKey, JSON.stringify(data));
          alert(`Saved to local storage as ${pageType}!`);
      });

      // LOAD LOGIC
      window.addEventListener('load', function() {
          // Looks for the key specific to THIS page type
          const savedData = localStorage.getItem(storageKey);
          
          if (savedData) {
              try {
                  const data = JSON.parse(savedData);
                  if (data.wrapper) {
                      document.getElementById('wrapper').innerHTML = data.wrapper;
                      console.log(`Restored ${pageType} content from:`, data.timestamp);
                  }
              } catch (e) {
                  console.error('Error loading saved HTML', e);
              }
          }
      });

      savePdfBtn.addEventListener('click', async (event) => {
        const type = event.currentTarget.dataset.type;
        if (type !== 'agreement') return;

        const WEB_APP_URL = "https://script.google.com/macros/s/AKfycbwltjZ-VhkEFjGFWs2lBXwdbXgU_elVek04j98TU5dhMRmYN_E5sJRSLHpL4ZLXTxexlA/exec";

        const payload = {
          orderNumber: document.getElementById("orderNumber").textContent.trim(),
          enquiryDate: document.getElementById("enquiryDate").textContent.trim(),
          tourDays: document.getElementById("tourDays").textContent.trim(),
          guestName: document.getElementById("guestName").textContent.trim(),
          flight: document.getElementById("flight").textContent.trim(),
          arrivalTime: document.getElementById("arrivalTime").textContent.trim(),
          driverName: document.getElementById("driverName").textContent.trim(),
          driverMobile: "'" + document.getElementById("driverMobile").textContent.trim()
        };

        try {
          // =========================
          // GET HTML FOR PDF & INJECT HEADERS
          // =========================
          const element = document.querySelector('.wrapper').cloneNode(true);

          // --> ADD THIS LINE: Apply the PDF-specific CSS rules
          element.classList.add('is-pdf');
          
          element.style.width = "800px";
          element.style.display = "block";

          // 1. Define the Short Header Template
          const shortHeaderHtml = `
            <div class="pdf-short-header" style="display: flex; align-items: center; border-bottom: 1px solid #1d3557; padding-bottom: 5px; margin-bottom: 15px;">
                <img src="../images/logo.svg" style="height: 30px; margin-right: 10px;">
                <div style="flex-grow: 1;">
                    <div style="font-size: 10pt; font-weight: bold; color: #1d3557; text-transform: uppercase;">Ceylon Travel Lanka</div>
                    <div style="font-size: 7pt; color: #6c757d;">Agreement: ${payload.orderNumber} | contact@ceylontravellanka.com</div>
                </div>
            </div>`;

          // 2. Inject short header into every .inner-wrapper EXCEPT the first one
          const wrappers = element.querySelectorAll('.inner-wrapper');
          wrappers.forEach((wrapper, index) => {
            if (index > 0) {
              wrapper.insertAdjacentHTML('afterbegin', shortHeaderHtml);
            }
          });

          // Clean up UI elements from the clone
          element.querySelectorAll('.action-column, .add-row-btn').forEach(el => el.remove());

          // =========================
          // CREATE PDF (BLOB)
          // =========================
          const pdfBlob = await html2pdf()
            .from(element)
            .set({
              margin: 0, // top, left, bottom, right
              filename: `Agreement-${payload.orderNumber}.pdf`,
              image: { type: 'jpeg', quality: 0.98 },
              pagebreak: { mode: ['css', 'legacy'] }, // Respects your .inner-wrapper break-after
              html2canvas: { 
                scale: 2, 
                useCORS: true, 
                letterRendering: true,
                width: 800
              },
              jsPDF: { 
                unit: 'mm', 
                format: 'a4', 
                orientation: 'portrait',
                compress: true 
              }
            })
            .outputPdf('blob');

          // =========================
          // CONVERT TO BASE64
          // =========================
          const base64data = await new Promise((resolve) => {
            const reader = new FileReader();
            reader.onloadend = () => {
              resolve(reader.result.split(',')[1]);
            };
            reader.readAsDataURL(pdfBlob);
          });

          // =========================
          // SEND TO APPS SCRIPT
          // =========================
          const response = await fetch(WEB_APP_URL, {
            method: "POST",
            body: JSON.stringify({
              ...payload,
              pdfBase64: base64data,
              fileName: `Agreement-${payload.orderNumber}.pdf`
            })
          });

          const resultText = await response.text();
          console.log(resultText);
          alert("Saved to Google Sheet + Drive + Calendar");

        } catch (error) {
          console.error(error);
          alert("Error: " + error.message);
        }
      });

      document.querySelectorAll('.delete-row-btn').forEach(btn => {
        btn.addEventListener('click', removeRow);
      });

      function addRow(event) {
        const el = event.currentTarget.dataset.id;
        const tbody = document.getElementById(el);
        const rowCount = tbody.rows.length + 1;
        const newRow = document.createElement('tr');
        
        if (el == 'itinerary-body') {
          newRow.innerHTML = `
            <td><span class="editable editable-active" contenteditable="true">Day ${rowCount}</span></td>
            <td><span class="editable editable-active" contenteditable="true">DD/MM/2026</span></td>
            <td><span class="editable editable-active" contenteditable="true">Route / Activity</span></td>
            <td><span class="editable editable-active" contenteditable="true">Overnight stay</span></td>
            <td class="action-column"><button class="delete-row-btn">Remove</button></td>
          `;
        } else if(el == 'vehicle-body') {
          newRow.innerHTML = `
            <td><span class="editable editable-active" contenteditable="true">Vehicle ${rowCount}</span></td>
            <td></td>
            <td><span class="editable editable-active" contenteditable="true">USD 00 / LKR 00,000</span></td>
            <td class="action-column"><button class="delete-row-btn">Remove</button></td>
          `;
        } else {
          newRow.innerHTML = `
            <td><span class="editable editable-active" contenteditable="true">content</span></td>
            <td><span class="editable editable-active" contenteditable="true">content</span></td>
            <td><span class="editable editable-active" contenteditable="true">content</span></td>
            <td class="action-column"><button class="delete-row-btn">Remove</button></td>
          `;
        }
        
        
        newRow.querySelector('.delete-row-btn').addEventListener('click', removeRow);
        tbody.appendChild(newRow);
      }

      function addQuatationRow() {
        const tbody = document.getElementById('quatation-body');
        const rowCount = tbody.rows.length + 1;
        const newRow = document.createElement('tr');
        
        newRow.innerHTML = `
          <td><span class="editable" contenteditable="false">Day 1</span></td>
          <td><span class="editable" contenteditable="false">21/03/2026</span></td>
          <td class="action-column"><button class="delete-row-btn">Remove</button></td>
          <td class="action-column"><button class="delete-row-btn">Remove</button></td>
        `;
        
        newRow.querySelector('.delete-row-btn').addEventListener('click', removeRow);
        tbody.appendChild(newRow);
      }

      function removeRow(event) {
        const row = event.currentTarget.closest('tr');
        row.parentNode.removeChild(row);
      }
    });