const express = require('express');
const puppeteer = require('puppeteer');
const fs = require('fs');
const app = express();

app.use(express.json({ limit: '10mb' }));

app.post('/generate-pdf', async (req, res) => {
  const html = req.body.html;

  const browser = await puppeteer.launch();
  const page = await browser.newPage();

  await page.setContent(html, { waitUntil: 'networkidle0' });

  const pdf = await page.pdf({
    format: 'A4',
    printBackground: true,

    displayHeaderFooter: true,

    headerTemplate: `
      <div style="width:100%; font-size:10px; padding:10px 20px;">
        <div style="border-bottom:1px solid #ccc;">
          <strong>Ceylon Travel Lanka</strong><br/>
          Your Gateway to Unforgettable Adventures
        </div>
      </div>
    `,

    footerTemplate: `
      <div style="width:100%; font-size:9px; text-align:center;">
        Page <span class="pageNumber"></span> of <span class="totalPages"></span>
      </div>
    `,

    margin: {
      top: '80px',
      bottom: '60px',
      left: '40px',
      right: '40px'
    }
  });

  await browser.close();

  res.set({
    'Content-Type': 'application/pdf',
    'Content-Disposition': 'attachment; filename=agreement.pdf',
    'Content-Length': pdf.length
  });

  res.send(pdf);
});

app.listen(3000, () => console.log('Server running on http://localhost:3000'));