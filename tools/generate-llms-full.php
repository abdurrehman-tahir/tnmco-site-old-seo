<?php
/**
 * Regenerates /llms-full.txt from the site's single sources of truth
 * (services/data.php + case-studies/data.php), so the on-page HTML,
 * the FAQPage JSON-LD and llms-full.txt can never drift apart.
 *
 * Usage (from repo root):  php tools/generate-llms-full.php
 */
$root = dirname(__DIR__);
require $root . '/case-studies/data.php';
require $root . '/services/data.php';

function plain($s) { return trim(html_entity_decode(strip_tags($s), ENT_QUOTES, 'UTF-8')); }

$out  = "# T&M Consultants — Expanded Catalog (llms-full.txt)\n\n";
$out .= "> UK-registered AI consultancy (Company No. 12621485) building AI voice agents, RAG systems\n";
$out .= "> and workflow automation, with Fractional CTO and full-stack product delivery for start-ups\n";
$out .= "> and SMEs. Offices in London, UK and Faisalabad, Pakistan. 10+ years experience, 29+ projects\n";
$out .= "> shipped. This document expands on /llms.txt with full service detail, FAQs and case studies\n";
$out .= "> for AI search engines and RAG systems.\n\n";

$out .= "## Services\n\n";
foreach ($SERVICES as $slug => $sv) {
    $out .= '### ' . $sv['schema_name'] . ' — https://tnmco.uk/services/' . $slug . "/\n\n";
    $out .= $sv['lead'] . "\n";
    foreach ($sv['bullets'] as $b) { $out .= '- ' . $b . "\n"; }
    $out .= "\n#### " . plain($sv['intro_h2']) . "\n";
    foreach ($sv['intro'] as $p) { $out .= plain($p) . "\n\n"; }
    $out .= '#### ' . plain($sv['proof_h2']) . "\n";
    foreach ($sv['proof_cards'] as $c) {
        $t = $c['title'] !== '' ? $c['title'] . ' ' : '';
        $out .= '- ' . plain($t . $c['text']) . ' (https://tnmco.uk' . $c['url'] . ")\n";
    }
    $out .= "\n#### " . plain($sv['how_h2']) . "\n";
    foreach ($sv['how'] as $p) { $out .= plain($p) . "\n\n"; }
    $out .= '#### ' . plain($sv['opinion_h2']) . "\n";
    foreach ($sv['opinion'] as $p) { $out .= plain($p) . "\n\n"; }
    $out .= "#### FAQ\n";
    foreach ($sv['faq'] as $f) {
        $out .= 'Q: ' . plain($f['q']) . "\n";
        $out .= 'A: ' . plain($f['a']) . "\n\n";
    }
}

$out .= "## Case Studies\n\n";
foreach ($CASE_STUDIES as $slug => $cs) {
    $out .= '### ' . $cs['name'] . ' — https://tnmco.uk/case-studies/' . $slug . "/\n";
    $out .= '- Role: ' . $cs['role'] . "\n";
    $out .= '- Timeline: ' . $cs['timeline'] . "\n";
    $out .= '- Tech stack: ' . implode(', ', $cs['tech']) . "\n";
    $out .= '- Challenge: ' . $cs['challenge'] . "\n";
    $out .= '- Solution: ' . $cs['solution'] . "\n";
    $out .= '- Impact: ' . implode(' ', $cs['impact']) . "\n";
    if (!empty($cs['private'])) { $out .= "- Note: Enterprise IP — source code and live backend are private.\n"; }
    if (!empty($cs['live_url']) && empty($cs['private'])) { $out .= '- Live: ' . $cs['live_url'] . "\n"; }
    $out .= "\n";
}

$out .= "## Demos\n- VIOLET — Clinic AI Assistant: https://ai.assistant.tnmco.uk/\n- BiteBot — Restaurant AI Assistant: https://bitebot.tnmco.uk/\n- Demos page: https://tnmco.uk/demos/\n\n";
$out .= "## Booking\n- Book a call: https://cal.com/tnm-co\n\n";
$out .= "## Company\n- Legal name: Technology and Management Consultants Ltd (trading as T&M Consultants)\n- UK Company Number: 12621485 · Founded 2020\n- Headquarters: 49 Eglinton Rd, London, SE18 3SL, United Kingdom\n- Development office: Sargodha Road, Faisalabad, Punjab, Pakistan\n- Email: info@tnmco.uk\n- Website: https://tnmco.uk · Index: https://tnmco.uk/llms.txt · Privacy: https://tnmco.uk/privacy/\n";

file_put_contents($root . '/llms-full.txt', $out);
echo 'llms-full.txt regenerated: ' . strlen($out) . " bytes, " . substr_count($out, "\nQ: ") . " FAQ entries\n";
