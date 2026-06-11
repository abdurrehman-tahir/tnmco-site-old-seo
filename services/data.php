<?php
/**
 * Single source of truth for the four service pages.
 * Titles / metas / H1s are section-2.2 copy verbatim. Schema name/serviceType/
 * description follow section 3.2. "proof" lists the case-study slugs named in
 * section 1 as evidence for each service.
 */

$SERVICES = [

    'ai-agents' => [
        'lead'                => 'Voice and chat agents that answer, book and act — for clinics, restaurants and operations teams.',
        'bullets'             => ['Voice agents & AI assistants', 'Tool-using & workflow agents', 'Integration with your existing systems', 'Hosting, monitoring & maintenance'],
        'proof_text'          => 'Proof: Try VIOLET (clinic) and BiteBot (restaurant) live',
        'proof_url'           => '/demos/',
        'icon'                => 'fas fa-robot',
        'icon_bg'             => '#e6f6fb',
        'icon_color'          => '#1bb1dc',
        'motif'               => 'dots',
        'title'               => 'AI Voice Agents & Assistants for Business | T&M Consultants',
        'meta'                => 'Custom AI voice agents and assistants for clinics, restaurants and operations — built, integrated and maintained. Try our live demos VIOLET and BiteBot.',
        'h1'                  => 'AI Agents That Answer, Book and Act — Live in Weeks',
        'schema_name'         => 'AI Voice Agents & Assistants',
        'schema_service_type' => 'AI Agent Development',
        'schema_description'  => 'Design, development and maintenance of custom AI voice agents and assistants for clinics, restaurants and business operations, including live demos VIOLET and BiteBot.',
        'show_demos'          => true,
        'proof'               => ['otto'],
    ],

    'ai-automation' => [
        'lead'                => 'LLM apps, retrieval pipelines and workflow automation that cut manual work in production.',
        'bullets'             => ['RAG pipelines & knowledge search', 'LLM application development', 'n8n / Python workflow automation', 'Evals, monitoring & cost control'],
        'proof_text'          => 'Proof: IqbalAI shipped in 3–4.5 months, ~70% cost reduction',
        'proof_url'           => '/case-studies/iqbalai/',
        'icon'                => 'fas fa-bolt',
        'icon_bg'             => '#eef4ff',
        'icon_color'          => '#2282ff',
        'motif'               => 'flow',
        'title'               => 'AI Automation & RAG Development | T&M Consultants',
        'meta'                => 'RAG pipelines, LLM apps and n8n/Python workflow automation that cut manual work. Production systems like IqbalAI and Atlas — not demos that die in a notebook.',
        'h1'                  => 'Automate the Work Your Team Shouldn\'t Be Doing',
        'schema_name'         => 'AI Automation & RAG Development',
        'schema_service_type' => 'AI Automation & RAG Development',
        'schema_description'  => 'RAG pipelines, LLM apps and n8n/Python workflow automation that cut manual work. Production systems like IqbalAI and Atlas — not demos that die in a notebook.',
        'show_demos'          => false,
        'proof'               => ['atlas', 'iqbalai'],
    ],

    'fractional-cto' => [
        'lead'                => 'Senior architecture, team leadership and delivery management — without the full-time cost.',
        'bullets'             => ['Architecture & technical strategy', 'Engineering team leadership', 'Project & program management', 'Technical due diligence & scoping'],
        'proof_text'          => 'Proof: CTO on Docushield through its $0.5M seed raise',
        'proof_url'           => '/case-studies/docushield/',
        'icon'                => 'fas fa-user-tie',
        'icon_bg'             => '#f1ecfb',
        'icon_color'          => '#6f42c1',
        'motif'               => 'brain',
        'title'               => 'Fractional CTO & Technical Leadership | T&M Consultants',
        'meta'                => 'Senior technical leadership without the full-time cost: architecture, team leadership, delivery management. Trusted CTO on funded products like Docushield ($0.5M raised) and IqbalAI.',
        'h1'                  => 'A CTO\'s Judgement, On Your Budget',
        'schema_name'         => 'Fractional CTO Services',
        'schema_service_type' => 'Fractional CTO',
        'schema_description'  => 'Senior technical leadership without the full-time cost: architecture, team leadership, delivery management. Trusted CTO on funded products like Docushield ($0.5M raised) and IqbalAI.',
        'show_demos'          => false,
        'proof'               => ['docushield', 'nonrival-data', 'iqbalai'],
    ],

    'software-delivery' => [
        'lead'                => 'End-to-end product development: web, mobile, e-commerce, Web3 and desktop.',
        'bullets'             => ['Full-stack web & mobile apps', 'MVP & proof-of-concept builds', 'E-commerce (Shopify / WooCommerce)', 'Blockchain & Web3 systems'],
        'proof_text'          => 'Proof: 29+ projects shipped, incl. QuickCard — acquired into NASDAQ-listed RYVYL',
        'proof_url'           => '/case-studies/',
        'icon'                => 'fas fa-laptop-code',
        'icon_bg'             => '#fff2e6',
        'icon_color'          => '#e98e06',
        'motif'               => 'code',
        'title'               => 'Full-Stack Product Development & MVPs | T&M Consultants',
        'meta'                => 'End-to-end web, mobile and e-commerce development — MVPs, Web3 and enterprise systems shipped across 29+ projects since 2015.',
        'h1'                  => 'From Idea to Shipped Product',
        'schema_name'         => 'Full-Stack Product Development',
        'schema_service_type' => 'Software Development',
        'schema_description'  => 'End-to-end web, mobile and e-commerce development — MVPs, Web3 and enterprise systems shipped across 29+ projects since 2015.',
        'show_demos'          => false,
        'proof'               => ['quickcard', 'tameer-estate', 'e-sehat', 'mintit-studio', 'tiny-crews', 'his-and-hers', 'build-on-hybrid'],
    ],

];
