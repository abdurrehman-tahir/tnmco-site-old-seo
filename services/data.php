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

/* ---------------------------------------------------------------------
   Authority content (verbatim from service-pages-authority-content.md).
   Merged into each $SERVICES entry below; [CONFIRM] markers dropped per
   the content pack's own instruction, answer text kept as written.
   --------------------------------------------------------------------- */
$SERVICES_AUTHORITY = [
    'ai-agents' => [
        'intro_h2'   => 'Agents that do the work, not demos that do the talking',
        'intro'      => [
            'Most "AI agent" projects die in one of two places: the demo that never survives contact with real customers, or the production system that nobody maintains after launch. We build for the second week, not the first call.',
            'T&M designs, ships and runs voice and chat agents for businesses where missed conversations cost money — clinics losing bookings after hours, restaurants with phones ringing into voicemail, operations teams answering the same forty questions a week. The agent picks up, answers from your actual data, books into your actual calendar, and hands off to a human the moment it should.',
            'You don\'t have to take our word for any of this. Two of our agents are running publicly right now: <strong>VIOLET</strong>, a clinic assistant, and <strong>BiteBot</strong>, a restaurant assistant. Call them, try to confuse them, ask something weird. That\'s the standard your agent will be built to.',
        ],
        'proof_h2'   => 'Built and running',
        'proof_cards'=> [
            ['title' => 'VIOLET — Clinic AI Assistant.', 'text' => 'Handles patient inquiries and appointment booking. Live demo, open to the public.', 'url' => '/demos/'],
            ['title' => 'BiteBot — Restaurant AI Assistant.', 'text' => 'Menus, orders, reservations, hours. Live demo, open to the public.', 'url' => '/demos/'],
            ['title' => 'OTTO — Autonomous on-chain agent.', 'text' => 'A fully autonomous agent monitoring live blockchain networks and executing cryptographically constrained transactions from natural-language prompts, built on Pydantic AI. Running on live social and crypto channels.', 'url' => '/case-studies/otto/'],
        ],
        'how_h2'     => 'How an agent project actually runs',
        'how'        => [
            'Week one is a scoping call and a written brief: which conversations the agent owns, which it escalates, what "success" measures (calls answered, bookings made, minutes saved). We\'ve run this discovery process across 29+ projects and it\'s blunt by design — if an agent is the wrong tool for your problem, we say so on that call and you\'ve spent nothing.',
            'Then a fixed-scope build, usually two to four weeks: agent logic, your knowledge base wired in, integrations (calendar, POS, CRM, WhatsApp or phone line), and a test harness of real conversation scenarios it must pass before launch. After go-live we monitor transcripts, patch the gaps real users find, and tune monthly. Agents degrade without this; ours don\'t, because maintenance is part of the engagement, not an afterthought.',
        ],
        'opinion_h2' => 'Where agent projects go wrong',
        'opinion'    => [
            'An honest note from the build side: the failure mode is almost never the model. It\'s scope. Agents pitched as "do everything" end up doing nothing reliably. The agents that earn their keep own a narrow, high-volume slice of work — bookings, FAQs, order capture — and refuse everything else loudly. We will push you toward narrow and reliable over impressive and fragile, every time. It\'s also why we put working demos in public: an agent you can\'t poke before buying is a promise, not a product.',
        ],
        'faq'        => [
            ['q' => 'How long until something is live?', 'a' => 'A working pilot typically takes two to four weeks from the scoping call, depending on integrations. We\'d rather ship a narrow agent in three weeks than a broad one in three months.'],
            ['q' => 'What does it cost?', 'a' => 'Pilots are fixed-scope and fixed-price, agreed after the scoping call — no hourly meters. Ongoing hosting and tuning is a small monthly retainer. First-project pricing is deliberately accessible.'],
            ['q' => 'Will it work with our phone system / calendar / POS?', 'a' => 'Almost certainly. We\'ve integrated agents with standard telephony, Google and Outlook calendars, WhatsApp, and custom backends. If something in your stack genuinely can\'t be integrated, we\'ll tell you during scoping, not after invoicing.'],
            ['q' => 'What happens when the agent doesn\'t know the answer?', 'a' => 'It says so and routes to a human — by transfer, callback ticket, or message — with the conversation context attached. An agent that bluffs is worse than no agent. Ours are configured to escalate early.'],
            ['q' => 'Who owns it after launch?', 'a' => 'You do. Code, prompts, data, accounts — all yours. We stay on for maintenance because agents need tuning, but you\'re never locked in.'],
        ],
        'cta'        => [
            ['label' => 'Try VIOLET or BiteBot first', 'url' => '/demos/'],
            ['label' => 'Then book a scoping call', 'url' => 'https://cal.com/tnm-co'],
        ],
    ],
    'ai-automation' => [
        'intro_h2'   => 'Automation that survives production',
        'intro'      => [
            'There\'s a graveyard of RAG prototypes that worked in the notebook and fell over in the real world: retrieval that misses, answers that drift, costs that triple quietly. We build the other kind — retrieval pipelines, LLM applications and workflow automation that run in production, with evals and monitoring treated as part of the system rather than a launch-week afterthought.',
            'Our approach is grounded in peer-reviewed machine learning research — T&M\'s technical leadership includes a published AI researcher — which matters less as a credential and more as a habit: we test claims before we ship them, ours included.',
        ],
        'proof_h2'   => 'In production now',
        'proof_cards'=> [
            ['title' => 'IqbalAI — AI-first Urdu education platform.', 'text' => 'Stateful agent workflows on LangGraph, multilingual hybrid vector search (BGE-M3 + Qdrant), Urdu speech-to-text, multi-tenant school administration. Shipped in 3–4.5 months, cutting development costs roughly 70% against the conventional build estimate.', 'url' => '/case-studies/iqbalai/'],
            ['title' => 'Atlas — real-time AI copilot.', 'text' => 'RAG backend on FastAPI and LangChain turning natural language into SQL and analytics reports in under 1.5 seconds.', 'url' => '/case-studies/atlas/'],
            ['title' => 'CaptureProof — medical computer vision.', 'text' => 'Custom CV models for clinical visual tracking, run on HIPAA-compliant AWS infrastructure we\'ve maintained at 99.99% availability for three years.', 'url' => '/case-studies/captureproof/'],
        ],
        'how_h2'     => 'The build loop',
        'how'        => [
            'Every automation engagement starts with the same uncomfortable question: what does this workflow cost you today, in hours or errors or missed revenue? If we can\'t beat that number, the project shouldn\'t exist. Scoping produces a written brief with the target metric in it.',
            'Builds run in short cycles against an eval set — real documents, real queries, real edge cases from your business — so "it works" means measured retrieval accuracy and answer quality, not a happy demo. On IqbalAI we went further and made the engineering loop itself AI-native, auto-generating typed client contracts so the codebase couldn\'t drift from its API. Launch includes cost monitoring (token spend is a budget line, and it leaks if nobody watches it) and a handover doc your team can actually operate from.',
        ],
        'opinion_h2' => 'What usually goes wrong',
        'opinion'    => [
            'Two patterns kill most automation projects. First: automating a process nobody has written down, which means automating the confusion. We make you define the workflow before we touch it — tedious, and it\'s saved more budgets than any model upgrade. Second: skipping evals because the first ten answers looked right. Retrieval quality is a distribution, not an anecdote; without a test set you find the failures when your customers do. We don\'t ship without one.',
        ],
        'faq'        => [
            ['q' => 'RAG, fine-tuning, or just better prompts — which do we need?', 'a' => 'Usually retrieval first; it\'s cheaper, auditable, and your data stays current. Fine-tuning earns its cost in narrow cases. We\'ll tell you which during scoping, including when the honest answer is "a prompt and a spreadsheet."'],
            ['q' => 'Can you work with our existing stack — n8n, Zapier, internal APIs?', 'a' => 'Yes. We build heavily on n8n and Python ourselves and run our own agency operations on the same automation we sell.'],
            ['q' => 'How do you keep costs from blowing up?', 'a' => 'Model routing (small models for small jobs), caching, and a cost dashboard from day one. Token spend gets reviewed like any other budget line.'],
            ['q' => 'What about our data — privacy and access?', 'a' => 'Your data stays in your accounts wherever possible; we work inside your cloud and sign NDAs as standard. Three years of passing healthcare data-protection audits on CaptureProof shaped how we handle everything else.'],
            ['q' => 'What does an engagement look like?', 'a' => 'A scoping call, a fixed-price pilot on one workflow with a measurable target, then expand or stop. Most clients know within a month whether the numbers work.'],
        ],
        'cta'        => [
            ['label' => 'Bring us one workflow that wastes your team\'s week', 'url' => 'https://cal.com/tnm-co'],
        ],
    ],
    'fractional-cto' => [
        'intro_h2'   => 'A CTO\'s judgement, without the CTO\'s salary',
        'intro'      => [
            'Somewhere between "founder with an idea" and "company with an engineering org" sits a long stretch where you need senior technical judgement a few days a month — not a £150k hire. That\'s the gap we fill. T&M\'s principal has spent 10+ years as architect, program manager and CTO across AI systems, fintech and healthcare, holds an MSc in computer and communications engineering, and publishes AI research. The combination matters: academic rigor for evaluating what\'s real, delivery scars for knowing what ships.',
            'A fractional CTO engagement means someone in your corner who has scoped, hired, fired, rescued and shipped before — and who has no incentive to overbuild, because we\'re not billing you by the engineer.',
        ],
        'proof_h2'   => 'Where this has worked',
        'proof_cards'=> [
            ['title' => 'Docushield.', 'text' => 'As Fractional CTO we designed custom L2 blockchain infrastructure, shipped native iOS and Android apps, and ran the full engineering and QA team. The client raised $0.5M in seed funding on the product. "T&M went above and beyond... I was thoroughly impressed with the speed of delivery" — Jules Mancion, Project Manager.', 'url' => '/case-studies/docushield/'],
            ['title' => 'IqbalAI.', 'text' => 'As Fractional CTO we set the architecture and an AI-native engineering process that compressed delivery to 3–4.5 months — roughly 70% below conventional cost.', 'url' => '/case-studies/iqbalai/'],
            ['title' => 'QuickCard.', 'text' => 'E-commerce and payments platform powered by our ledger technology, later acquired into NASDAQ-listed RYVYL.', 'url' => '/case-studies/quickcard/'],
        ],
        'how_h2'     => 'What the engagement covers',
        'how'        => [
            'The first month is an honest technical audit: architecture, codebase, team, vendor contracts, and the roadmap\'s relationship with reality. You get a written assessment with priorities — including the things that are fine and should be left alone, which consultants rarely say.',
            'Ongoing, the role flexes to what the month needs: architecture decisions, hiring and vetting engineers, vendor and agency oversight (we\'re unusually good at catching what outsourced teams hide, having run those teams), investor-facing technical material, and delivery management with real program-management discipline — written scopes, staged milestones, kickoff checklists. It\'s a retainer measured in days per month, sized to your stage, and it scales down as your own team scales up. A fractional CTO who tries to become permanent is doing it wrong.',
        ],
        'opinion_h2' => 'A warning about this market',
        'opinion'    => [
            '"Fractional CTO" has become a title people award themselves between jobs. Two filters separate the real ones: have they carried a product from scoping to production <em>recently</em>, with the AI-era toolchain rather than 2015\'s; and will they show you written artifacts — audits, scopes, decision docs — rather than talk in frameworks. We pass both and will happily be tested on either. The third filter is yours to apply: a good fractional CTO should sometimes tell you to spend less.',
        ],
        'faq'        => [
            ['q' => 'How is this different from hiring an agency?', 'a' => 'Opposite incentives. An agency profits when you build more. A fractional CTO on a flat retainer profits when you build the right things — including telling you what not to build, which we do often.'],
            ['q' => 'How many days a month do we get?', 'a' => 'Typically two to six, set quarterly. Months ship-heavy in delivery get more; quiet months get strategy and review.'],
            ['q' => 'Can you manage our existing developers or outsourced team?', 'a' => 'Yes — this is the most common engagement shape. We set the process (scoped tickets, review gates, staging discipline) and hold the team to it.'],
            ['q' => 'Do you also build, or only advise?', 'a' => 'Both, deliberately. Advice from people who no longer build goes stale fast, especially in AI. When hands-on work is needed, it\'s scoped separately so the retainer stays honest.'],
            ['q' => 'What if we outgrow you?', 'a' => 'Then we\'ve succeeded. Part of the role is hiring your full-time technical lead and handing over cleanly — documented decisions, no hostage-taking.'],
        ],
        'cta'        => [
            ['label' => 'Start with the one-month technical audit', 'url' => 'https://cal.com/tnm-co'],
        ],
    ],
    'software-delivery' => [
        'intro_h2'   => 'From idea to shipped product, without the rebuild',
        'intro'      => [
            'Every founder has heard a horror story: the MVP that took nine months, the codebase no second developer could touch, the agency that vanished after the invoice cleared. The fix is unglamorous — written scopes, staged milestones, weekly demos, code that\'s handed over rather than held hostage. We\'ve shipped 29+ projects this way across web, mobile, e-commerce and Web3, and several clients have stayed for years, which is the only retention metric that means anything in this business.',
        ],
        'proof_h2'   => 'Shipped and still standing',
        'proof_cards'=> [
            ['title' => 'QuickCard.', 'text' => 'E-commerce and payments platform built on our ledger technology, acquired into NASDAQ-listed RYVYL.', 'url' => '/case-studies/quickcard/'],
            ['title' => 'e-Sehat.', 'text' => 'Telemedicine platform extending healthcare access in emerging economies — our own product, run as a social enterprise.', 'url' => '/case-studies/e-sehat/'],
            ['title' => 'NonRival Data.', 'text' => 'Web 3.0 data platform.', 'url' => '/case-studies/nonrival-data/'],
            ['title' => '', 'text' => 'Plus production work across real estate (Tameer Estate), retail and e-commerce (His & Hers, Tiny Crews, Mint-It Studio).', 'url' => '/case-studies/'],
        ],
        'how_h2'     => 'Delivery with the boring parts done right',
        'how'        => [
            'Scoping comes first and it\'s written down: features in, features explicitly out, acceptance criteria, payment tied to milestones. (Our scoping discipline is documented internally as a checklist-driven process; clients see its output as a proposal you can hold us to.) Builds run in two-week cycles with a demo at the end of each — you watch the product grow instead of waiting for a reveal. Deployment, domain setup and handover are part of the scope, and the repository is yours from day one.',
            'For MVPs specifically, our bias is speed-to-evidence: ship the smallest version that can teach you something about your market, then iterate on data instead of guesses. AI tooling has changed the economics here — IqbalAI\'s 3–4.5-month, ~70%-below-estimate delivery is what a disciplined AI-native build process produces — and we bring that same loop to conventional product builds.',
        ],
        'opinion_h2' => 'The uncomfortable truth about MVPs',
        'opinion'    => [
            'Most MVPs fail before a line of code: the scope was a wishlist, not a hypothesis. The brutal question — what\'s the <em>one</em> thing this product must prove? — gets skipped because it\'s harder than listing features. We ask it in the first call. Sometimes the honest outcome of scoping is a smaller, cheaper project than you arrived with. We consider that a win, and so should you: money not spent on unproven features is runway.',
        ],
        'faq'        => [
            ['q' => 'How much does an MVP cost?', 'a' => 'It depends on scope, and anyone quoting before scoping is guessing with your money. What we fix is the structure: written scope, fixed price, milestone payments, no surprise invoices.'],
            ['q' => 'How fast can you ship?', 'a' => 'Small fixed-scope projects in weeks; full MVPs typically in one to three months. The schedule is in the proposal and milestone payments keep us honest against it.'],
            ['q' => 'Do you handle design too?', 'a' => 'Yes — UI/UX through deployment is in scope when needed. Several portfolio projects, Atlas among them, were design-led builds.'],
            ['q' => 'We have an existing codebase another team built. Can you take it over?', 'a' => 'Usually, after a paid audit — a short review that tells you what you actually have. Sometimes the answer is "salvageable," occasionally "rebuild the core." You get the truth either way, in writing.'],
            ['q' => 'Web3 — still?', 'a' => 'When it\'s the right tool. We\'ve shipped production blockchain systems (Docushield, NonRival, OTTO) and we\'re equally quick to say when a database does the job for a tenth of the cost.'],
        ],
        'cta'        => [
            ['label' => 'Bring the idea; the scoping call is where it gets real', 'url' => 'https://cal.com/tnm-co'],
        ],
    ],
];
foreach ($SERVICES_AUTHORITY as $tnmSlug => $tnmAuth) {
    $SERVICES[$tnmSlug] = array_merge($SERVICES[$tnmSlug], $tnmAuth);
}
