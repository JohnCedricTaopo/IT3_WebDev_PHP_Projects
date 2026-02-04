<?php
declare(strict_types=1);

/**
 * TICKET #002-C: FREELANCE INVOICE ENGINE
 * Assignee: Junior Software Engineer (Block C)
 */

// -------------------------------------------------------------------------
// CONSTANTS
define('PLATFORM_FEE_RATE', 0.15);   // 15% platform fee
define('FIXED_SERVICE_TAX', 250.00);

// -------------------------------------------------------------------------
// VARIABLES (with URL override + explicit casting)
$project_base_rate  = isset($_GET['base'])
    ? (float) $_GET['base']
    : 35000.00;

$extra_hours_worked = isset($_GET['hours'])
    ? (float) $_GET['hours']
    : 8.0;

$hourly_bonus_rate  = 850.00;

// -------------------------------------------------------------------------
// CALCULATIONS
$bonus_pay    = $extra_hours_worked * $hourly_bonus_rate;
$gross_total  = $project_base_rate + $bonus_pay;
$platform_fee = $gross_total * PLATFORM_FEE_RATE;
$final_payout = $gross_total - $platform_fee - FIXED_SERVICE_TAX;

// -------------------------------------------------------------------------
// COMPARISONS
$fee_vs_tax     = $platform_fee <=> FIXED_SERVICE_TAX;
$identity_check = (500.0 === 500);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelance Invoice System - Ticket #002-C</title>
    <style>
        :root { --accent: #00d2ff; --warning: #ff9f43; --dark-card: #1e272e; --body-bg: #0f1418; }
        body { font-family: 'Consolas', 'Monaco', monospace; background: var(--body-bg); color: #ecf0f1; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .invoice-box { background: var(--dark-card); padding: 35px; border-radius: 8px; border-top: 5px solid var(--accent); width: 100%; max-width: 550px; box-shadow: 0 20px 50px rgba(0,0,0,0.5); }
        .terminal-header { text-align: left; border-bottom: 1px solid #3d4e5d; margin-bottom: 25px; padding-bottom: 10px; }
        .terminal-header h2 { margin: 0; color: var(--accent); font-size: 1.4em; }
        .data-grid { display: grid; grid-template-columns: 1fr; gap: 15px; }
        .item { display: flex; justify-content: space-between; padding: 10px; background: rgba(255,255,255,0.03); border-radius: 4px; }
        .label { color: #95a5a6; text-transform: uppercase; font-size: 0.85em; }
        .amount { color: #fff; font-weight: bold; }
        .total-section { margin-top: 25px; padding: 20px; background: rgba(0, 210, 255, 0.1); border-radius: 4px; border: 1px solid var(--accent); }
        .payout-label { display: block; color: var(--accent); font-size: 0.9em; margin-bottom: 5px; }
        .payout-value { font-size: 1.8em; font-weight: bold; color: #fff; }
        .debug-console { background: #000; color: #55efc4; padding: 15px; border-radius: 4px; margin-top: 25px; font-size: 0.8em; line-height: 1.6; }
        .debug-tag { color: var(--warning); font-weight: bold; }
    </style>
</head>
<body>

<div class="invoice-box">
    <div class="terminal-header">
        <h2>> INVOICE_GENERATOR_V1.0</h2>
        <small style="color: #576574;">Block C / Junior Dev Environment</small>
    </div>

    <div class="data-grid">
        <div class="item">
            <span class="label">Project Base Rate:</span>
            <span class="amount">₱<?= number_format($project_base_rate, 2); ?></span>
        </div>

        <div class="item">
            <span class="label">Gross Project Total:</span>
            <span class="amount">₱<?= number_format($gross_total, 2); ?></span>
        </div>

        <div class="item">
            <span class="label">Platform Fee Deduction:</span>
            <span class="amount" style="color: #ff7675;">
                - ₱<?= number_format($platform_fee, 2); ?>
            </span>
        </div>
    </div>

    <div class="total-section">
        <span class="payout-label">FINAL NET PAYOUT:</span>
        <div class="payout-value">₱<?= number_format($final_payout, 2); ?></div>
    </div>

    <div class="debug-console">
        <div><span class="debug-tag">[SYS_COMPARE]</span> FEE_VS_TAX_SPACESHIP: <?= $fee_vs_tax; ?></div>
        <div><span class="debug-tag">[SYS_IDENTITY]</span> FLOAT_VS_INT_CHECK: <?= $identity_check ? 'true' : 'false'; ?></div>
        <div style="margin-top: 10px;">> DEPLOYMENT_STATUS: SUCCESSFUL</div>
    </div>
</div>

</body>
</html>