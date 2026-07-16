<?php
require_once __DIR__ . '/includes/config.php';
$legal = ['title' => 'Refund Policy', 'path' => '/refund-policy/', 'description' => 'Working refund-policy information for Yoga Prosperity Model programs.', 'sections' => [['Before payment launch', ['Online payment is not enabled in the first website phase. Final refund conditions will be displayed clearly before Razorpay checkout is activated.']], ['Program commitment', ['Because programs may include immediate access to digital materials, community and coaching, eligibility and timelines for refunds must be confirmed for each program.']], ['How to request support', ['Contact support@yogaprosperitymodel.com with your name, program and payment reference when payments are live.']]]];
require __DIR__ . '/includes/legal-page.php';
