<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Tour Cost Calculator</title>
    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --secondary-color: #4b5563;
            --secondary-hover: #374151;
            --background: #f3f4f6;
            --card-bg: #ffffff;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --border: #d1d5db;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--background);
            color: var(--text-main);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .calculator-card {
            background: var(--card-bg);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 100%;
            max-width: 480px;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 24px;
            color: var(--primary-color);
            text-align: center;
            font-size: 24px;
        }

        .input-group {
            margin-bottom: 16px;
        }

        .row {
            display: flex;
            gap: 15px;
        }

        .row .input-group {
            flex: 1;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 14px;
            color: var(--secondary-color);
        }

        input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.2s;
        }

        input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        button {
            flex: 2;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button[type="submit"] {
            background-color: var(--primary-color);
        }

        button[type="submit"]:hover {
            background-color: var(--primary-hover);
        }

        button[type="button"] {
            flex: 1;
            background-color: #e5e7eb;
            color: var(--secondary-color);
        }

        button[type="button"]:hover {
            background-color: #d1d5db;
        }

        .results-box {
            margin-top: 24px;
            padding: 20px;
            background-color: #f9fafb;
            border: 1px solid var(--border);
            border-radius: 8px;
            display: none;
        }

        .results-box.active {
            display: block;
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 15px;
        }

        .result-row.breakdown {
            color: var(--text-muted);
            font-size: 14px;
            padding-left: 10px;
            border-left: 2px solid var(--border);
        }

        .result-row.total {
            font-size: 18px;
            font-weight: bold;
            color: var(--primary-color);
            margin-top: 15px;
            padding-top: 10px;
            border-top: 1px dashed var(--border);
        }

        .error-message {
            color: #dc2626;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
    </style>
</head>
<body>

    <div class="calculator-card">
        <h2>Tour Cost Calculator</h2>
        
        <form id="calcForm">
            <div class="row">
                <div class="input-group">
                    <label for="startDate">Start Date</label>
                    <input type="date" id="startDate" required>
                </div>

                <div class="input-group">
                    <label for="endDate">End Date</label>
                    <input type="date" id="endDate" required>
                </div>
            </div>
            
            <div id="dateError" class="error-message" style="margin-bottom: 15px; display: none;">End date must be after or equal to start date.</div>

            <div class="input-group">
                <label for="perDayHire">Per Day Hire ($)</label>
                <input type="number" id="perDayHire" min="0" step="0.01" placeholder="0.00" required>
            </div>

            <div class="row">
                <div class="input-group" style="flex: 2;">
                    <label for="extraCharges">Extra Charges ($)</label>
                    <input type="number" id="extraCharges" min="0" step="0.01" placeholder="0.00" value="0">
                </div>
                <div class="input-group" style="flex: 3;">
                    <label for="extraNote">Charge Reason (Optional)</label>
                    <input type="text" id="extraNote" placeholder="e.g., Insurance, GPS">
                </div>
            </div>

            <div class="button-group">
                <button type="button" id="resetBtn">Reset</button>
                <button type="submit">Calculate</button>
            </div>
        </form>

        <div class="results-box" id="resultsBox">
            <div class="result-row">
                <span>Total Duration:</span>
                <span id="resTotalDays" style="font-weight: 600;">0 Days</span>
            </div>
            <div class="result-row breakdown">
                <span>Base Hire Cost:</span>
                <span id="resBaseCost">$0.00</span>
            </div>
            <div class="result-row breakdown" id="resExtraRow">
                <span id="resExtraLabel">Extra Charges:</span>
                <span id="resExtraCost">$0.00</span>
            </div>
            <div class="result-row total">
                <span>Total Tour Charge:</span>
                <span id="resTotalCharge">$0.00</span>
            </div>
        </div>
    </div>

    <script defer src="/admin/js/calc.js"></script>
</body>
</html>