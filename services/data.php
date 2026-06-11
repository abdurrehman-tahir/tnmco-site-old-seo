<?php
/**
 * Single source of truth for the four service pages.
 * Titles / metas / H1s are section-2.2 copy verbatim. Schema name/serviceType/
 * description follow section 3.2. "proof" lists the case-study slugs named in
 * section 1 as evidence for each service.
 */

$SERVICES = [

    'ai-agents' => [
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
