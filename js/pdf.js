document.addEventListener("DOMContentLoaded", () => {
      const toggleBtn = document.getElementById('edit-toggle-btn');
      const addRowBtn = document.querySelectorAll('.add-row-btn');
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
      
      savePdfBtn.addEventListener('click', () => {
        const headerContent = document.querySelector('.header').cloneNode(true);
        const wrapperContent = document.querySelector('.wrapper').cloneNode(true);
        
        const addBtn = wrapperContent.querySelector('#add-row-btn');
        if (addBtn) addBtn.remove();
        
        const actionCols = wrapperContent.querySelectorAll('.action-column');
        actionCols.forEach(col => col.remove());
        
        const printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write(`
          <!DOCTYPE html>
          <html lang="en">
          <head>
            <meta charset="UTF-8">
            <title>Tour and Travel Services Agreement</title>
            <style>
              @page {
                size: A4;
                margin: 12mm 15mm 20mm 15mm;
              }
              
              body {
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                color: #2b2d42;
                background-color: #fdfaf6;
                line-height: 1.4;
                font-size: 9.5pt;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
              }
              
              .header {
                width: 100%;
                height: 28mm;
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 2px solid #1d3557;
                padding-bottom: 6px;
                background-color: #fdfaf6;
                z-index: 100;
                box-sizing: border-box;
              }
              
              .header .left {
                flex: 0 0 15%;
                max-width: 80px;
              }
              
              .header .left .image-wrapper img {
                width: 100%;
                height: auto;
              }
              
              .header .right {
                flex: 0 0 82%;
              }
              
              .agency-title {
                font-size: 18pt;
                font-weight: bold;
                color: #1d3557;
                margin: 0;
                text-transform: uppercase;
                letter-spacing: 0.5px;
              }
              
              .agency-tagline {
                font-size: 9pt;
                color: #457b9d;
                margin-top: 2px;
                margin-bottom: 6px;
                font-style: italic;
              }
              
              .header-details {
                font-size: 8.5pt;
                color: #6c757d;
                line-height: 1.3;
              }
              
              h2 {
                font-size: 12pt;
                color: #1d3557;
                border-left: 3px solid #e63946;
                padding-left: 6px;
                margin-top: 14px;
                margin-bottom: 6px;
                text-transform: uppercase;
                page-break-after: avoid;
                break-after: avoid;
              }
              
              .grid-container {
                width: 100%;
                margin-bottom: 10px;
              }
              
              .col-2 {
                width: 48.5%;
                display: inline-block;
                vertical-align: top;
                background-color: #ffffff;
                border: 1px solid #cbd5e1;
                padding: 8px 10px;
                box-sizing: border-box;
              }
              
              .col-2:first-child {
                margin-right: 2%;
              }

              .col-2 p {
                margin: 4px 0 0;
                line-height: 1.3;
              }
              
              table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 6px;
                margin-bottom: 10px;
                font-size: 9pt;
              }
              
              th {
                background-color: #f1faee;
                color: #1d3557;
                text-align: left;
                padding: 6px 8px;
                border-bottom: 1px solid #a8dadc;
                font-weight: bold;
              }
              
              td {
                padding: 6px 8px;
                border-bottom: 1px solid #e2e8f0;
              }
              
              tr:nth-child(even) {
                background-color: #f8f9fa;
              }
              
              .editable {
                cursor: default;
                padding: 1px 2px;
                border-radius: 3px;
                background-color: transparent !important;
                border: none !important;
              }
              
              .highlight-box {
                background-color: #fef9c3;
                border-left: 4px solid #eab308;
                padding: 8px 10px;
                margin: 10px 0;
                font-size: 9pt;
                page-break-inside: avoid;
                break-inside: avoid;
              }

              .highlight-box p {
                margin: 0;
                line-height: 1.3;
              }
              
              .badge {
                background-color: #d8f3dc;
                color: #1b4332;
                padding: 2px 6px;
                border-radius: 3px;
                font-size: 8pt;
                font-weight: bold;
              }

              .chauffeur-details {
                margin: 4px 0 12px;
                line-height: 1.3;
              }

              .payment-options {
                line-height: 1.4;
                margin-top: 4px;
                margin-bottom: 12px;
              }

              .terms-acceptance {
                margin-top: 20px;
                font-style: italic;
                page-break-inside: avoid;
                break-inside: avoid;
              }
              
              .signature-section {
                display: flex;
                justify-content: space-between;
                margin-top: 35px;
                page-break-inside: avoid;
                break-inside: avoid;
              }
              
              .signature-block {
                display: inline-block;
                width: 45%;
                vertical-align: top;
                margin-right: 30px;
              }
              
              .signature-line {
                border-bottom: 1px solid #333;
                margin-top: 30px;
                margin-bottom: 8px;
              }
              
              .footer-text {
                text-align: center;
                font-size: 8pt;
                color: #888;
                margin-top: 20px;
                border-top: 1px solid #e0e0e0;
                padding-top: 8px;
              }

              .last-footer {
                margin-top: 50px;
              }

              .action-column {
                display: none;
              }
              
              .page-break {
                page-break-before: always;
                break-before: page;
              }
                
            </style>
          </head>
          <body>
            ${wrapperContent.innerHTML}
          </body>
          </html>
        `);
        printWindow.document.close();
        printWindow.focus();
        
        setTimeout(() => {
          printWindow.print();
          printWindow.close();
        }, 250);
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