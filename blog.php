<?php
require_once __DIR__ . '/includes/config.php';
$current = 'blog';

$articles = [
    'start-online-yoga-business-india' => [
        'category' => 'Yoga business',
        'title' => 'How to start an online yoga business in India',
        'meta_title' => 'Start an Online Yoga Business in India | YPM',
        'description' => 'A practical path from choosing a focused audience to delivering your first structured online yoga program.',
        'intro' => 'An online yoga business becomes easier to build when you begin with one clear audience, one meaningful outcome and one simple way to deliver it.',
        'quick_answer' => 'To start an online yoga business in India, choose one audience, define one responsible outcome, package it into a short pilot program, select simple delivery and payment tools, and enrol the first learners through trusted conversations. Validate the offer before investing in complex technology or advertising.',
        'checklist' => ['A defined learner group and problem', 'A four-to-eight week pilot with a clear scope', 'A reliable live-video, communication and payment setup', 'Written schedule, inclusions, boundaries and refund terms', 'A feedback process for improving the next cohort'],
        'faqs' => [
            ['Do I need a website to start an online yoga business?', 'No. A clear offer, a dependable video platform, a communication channel and a responsible payment process are enough for a small pilot. A website becomes more useful as you build trust and repeatable demand.'],
            ['What should my first online yoga program include?', 'Include an orientation, a realistic practice sequence, live or recorded teaching, participant support, progress reflection and a clear completion step. Keep the scope appropriate to your training.'],
            ['Should I begin with ads or organic outreach?', 'Most new teachers benefit from validating the offer through existing students, referrals, workshops and helpful content before paying for advertising.'],
        ],
        'sections' => [
            ['Start with a specific person', ['Choose a group whose needs you understand well—such as working professionals with back discomfort, new mothers rebuilding strength or older adults seeking safe mobility. A focused audience makes your message clearer without limiting your future growth.']],
            ['Design one useful outcome', ['Move beyond a list of classes. Define what a participant should understand, practise or experience by the end of the journey. Organise the program into a realistic sequence with clear milestones.']],
            ['Keep the first delivery simple', ['Begin with tools you can operate confidently: live video sessions, a private communication group, recorded support material and a basic payment process. Improve the system after observing real learners.']],
            ['Build trust before scale', ['Share helpful demonstrations, answer genuine questions and invite interested people into a conversation. Strong delivery and participant feedback create a healthier foundation than chasing large follower counts.']],
        ],
    ],
    'choose-profitable-yoga-niche' => [
        'category' => 'Positioning',
        'title' => 'How to choose a profitable yoga niche',
        'meta_title' => 'How to Choose a Profitable Yoga Niche | YPM',
        'description' => 'Find the overlap between your experience, the people you understand and a problem they actively want to solve.',
        'intro' => 'A useful niche is not simply a yoga style. It connects your strengths with a recognisable person, situation and desired transformation.',
        'quick_answer' => 'Choose a yoga niche by combining three things: people you understand, a need they actively recognise and an outcome you can support within your training. Interview potential learners, test a small workshop and use actual questions and enrolment behaviour—not trends alone—to decide.',
        'checklist' => ['Name one recognisable audience', 'Describe a specific situation or need', 'Confirm that the outcome fits your professional scope', 'Speak with at least a small set of potential learners', 'Test the message through a workshop or pilot'],
        'faqs' => [
            ['What is an example of a yoga niche?', 'Examples include desk workers seeking a sustainable mobility routine, older adults needing accessible movement, or yoga teachers learning to package their expertise. The niche should describe both the person and the need.'],
            ['Will choosing a niche limit my yoga career?', 'A niche gives your initial marketing and program a clear focus. It does not prevent you from serving other people or developing additional offers later.'],
            ['How do I know whether a niche is profitable?', 'Look for repeated questions, willingness to attend a pilot, completion and feedback, referrals and responsible willingness to pay. No niche guarantees profit; evidence from real people reduces guesswork.'],
        ],
        'sections' => [
            ['List the people you understand', ['Think about communities you have taught, life stages you have experienced and health or lifestyle challenges you can discuss responsibly. Familiarity helps you communicate with empathy and precision.']],
            ['Look for an active need', ['Speak with potential learners and listen to the language they use. A viable need is specific enough to describe, important enough to prioritise and appropriate for your training and professional scope.']],
            ['Test before committing', ['Run a short workshop or a small pilot program. Track attendance, questions, completion and feedback. Evidence from real conversations is more valuable than choosing a niche only from social-media trends.']],
            ['Position without overpromising', ['Describe the process, support and intended outcome honestly. Avoid medical or income guarantees. Clear expectations protect trust and attract participants who value the work.']],
        ],
    ],
    'package-yoga-signature-program' => [
        'category' => 'Programs',
        'title' => 'Package your yoga expertise into a signature program',
        'meta_title' => 'Create a Signature Yoga Program | YPM',
        'description' => 'Turn individual sessions into a structured learning journey with a clear promise, sequence and participant experience.',
        'intro' => 'A signature program gives your teaching a repeatable structure while leaving room to respond to the people in front of you.',
        'quick_answer' => 'Package yoga expertise into a signature program by defining the learner, starting point, responsible outcome, learning stages, delivery format and support level. Give every module a purpose and run a small cohort before treating the program as final.',
        'checklist' => ['One clearly described participant profile', 'A responsible and observable program outcome', 'A sequence of modules or practice stages', 'Defined live, recorded and support elements', 'Onboarding, feedback and completion steps'],
        'faqs' => [
            ['How long should a signature yoga program be?', 'Choose the shortest duration that responsibly supports the intended outcome. Many pilot programs can be tested over four to eight weeks, while deeper journeys may require longer support.'],
            ['Does a signature program need recorded videos?', 'No. Recorded lessons can improve flexibility, but live teaching, worksheets, audio guidance or group support may be more appropriate depending on the learner and outcome.'],
            ['How should I test a new yoga program?', 'Invite a small suitable cohort, explain that it is a pilot, set clear expectations, observe participation and collect feedback at meaningful milestones.'],
        ],
        'sections' => [
            ['Define the starting and finishing points', ['Describe what participants commonly struggle with before the program and what responsible progress could look like afterwards. Keep the outcome meaningful, observable and within your professional scope.']],
            ['Create a learning sequence', ['Arrange practices and concepts so each stage prepares participants for the next. Include orientation, core learning, guided implementation, reflection and a clear completion step.']],
            ['Choose the right support level', ['Decide what belongs in recorded lessons, live sessions, group discussion, individual feedback and supporting worksheets. The delivery format should serve the outcome rather than add unnecessary complexity.']],
            ['Improve through each cohort', ['Collect feedback at useful milestones, observe where participants lose momentum and update the program carefully. A signature program becomes stronger through consistent delivery and evidence.']],
        ],
    ],
    'yoga-teacher-pricing' => [
        'category' => 'Pricing',
        'title' => 'How much should a yoga teacher charge?',
        'meta_title' => 'Yoga Teacher Pricing Guide | YPM',
        'description' => 'Price your work according to delivery, support, preparation and value—not only the minutes spent teaching live.',
        'intro' => 'There is no single correct price for every yoga teacher. A responsible price reflects the complete participant experience and the real cost of delivering it well.',
        'quick_answer' => 'A yoga teacher should price a program by calculating preparation, delivery, support, technology, venue, payment fees and applicable taxes, then comparing the scope and format with realistic market alternatives. The final price must be sustainable for the teacher and transparent to the learner.',
        'checklist' => ['Calculate every delivery and support cost', 'Define exactly what the participant receives', 'Compare like-for-like local and online alternatives', 'Publish payment, cancellation and refund terms', 'Review effort, enrolment and completion after each cohort'],
        'faqs' => [
            ['Should yoga teachers charge per class or per program?', 'Drop-in classes suit general access, while program pricing can better reflect a structured outcome, preparation and support. Choose the model that matches the actual participant experience.'],
            ['Can a new yoga teacher charge premium fees?', 'Price should follow the depth, specificity, support and evidence of the offer—not labels alone. A smaller pilot and transparent scope help a new teacher establish responsible proof.'],
            ['Should discounts be part of yoga program pricing?', 'Discounts can be used carefully, but avoid artificial urgency or permanently reducing a price below sustainable delivery cost. Explain any genuine early or group rate clearly.'],
        ],
        'sections' => [
            ['Calculate the full delivery cost', ['Include preparation, live teaching, follow-up, technology, venue, payment fees, support time and taxes where applicable. A price that ignores hidden work becomes difficult to sustain.']],
            ['Match price to scope', ['A general group class, a focused multi-week program and individual mentoring provide different levels of access and support. Explain those differences clearly so participants can choose confidently.']],
            ['Use a confident, transparent offer', ['State what is included, the schedule, payment terms and refund conditions before enrolment. Avoid artificial pressure or unclear discounts. Transparency strengthens long-term trust.']],
            ['Review with evidence', ['Track enrolment, attendance, completion, feedback and delivery effort. Adjust pricing when the program, support or operating cost changes—not simply because another teacher charges differently.']],
        ],
    ],
    'ethical-yoga-marketing' => [
        'category' => 'Marketing',
        'title' => 'Ethical marketing for yoga teachers',
        'meta_title' => 'Ethical Marketing for Yoga Teachers | YPM',
        'description' => 'Communicate your work with clarity and confidence without fear-based claims, pressure or unrealistic promises.',
        'intro' => 'Marketing can be an extension of service when it helps the right people understand a genuine problem, a responsible process and a suitable next step.',
        'quick_answer' => 'Ethical yoga marketing explains who an offer is for, what the process includes, what progress may reasonably look like and where its limits are. It avoids guaranteed health, income or spiritual claims, respects privacy and gives people enough information to decide without pressure.',
        'checklist' => ['Use specific, non-guaranteed outcome language', 'Explain the method, duration and support clearly', 'Obtain permission for every testimonial and image', 'Disclose prices, important conditions and limitations', 'Use invitations and follow-up without pressure'],
        'faqs' => [
            ['Can yoga teachers use testimonials in marketing?', 'Yes, when the participant has given informed permission and the story is presented accurately with relevant context. Do not imply that one person’s experience is guaranteed for everyone.'],
            ['What claims should yoga teachers avoid?', 'Avoid guaranteed cures, guaranteed income, exaggerated spiritual outcomes and claims outside your qualifications. Describe the process and intended support honestly.'],
            ['How can I market yoga without posting every day?', 'Choose a sustainable rhythm: answer recurring questions, publish a useful demonstration or guide, nurture existing relationships and invite suitable people to a workshop or conversation.'],
        ],
        'sections' => [
            ['Teach before you ask', ['Share useful explanations, simple practices and thoughtful answers connected to your area of work. Helpful communication lets people experience your approach before making a decision.']],
            ['Use specific, honest language', ['Explain who the offer is for, how it works and what kind of progress it supports. Avoid guaranteed health, spiritual or financial outcomes.']],
            ['Invite a conversation', ['For higher-support programs, a short clarity conversation can help both sides assess fit. Use the call to understand the person rather than pressure them into an immediate purchase.']],
            ['Protect dignity and privacy', ['Use testimonials, photographs and participant stories only with permission. Present results with appropriate context and never expose sensitive personal information for promotion.']],
        ],
    ],
    'premium-yoga-clients' => [
        'category' => 'Clients',
        'title' => 'Finding your first premium yoga clients',
        'meta_title' => 'Find Premium Yoga Clients Responsibly | YPM',
        'description' => 'Build trust, start better conversations and offer deeper support to people who value a focused transformation.',
        'intro' => 'Premium does not mean expensive for its own sake. It means a more focused outcome, thoughtful delivery and an appropriate level of support.',
        'quick_answer' => 'Find your first premium yoga clients by making the offer specific, starting with trusted relationships, using a structured clarity conversation and delivering a strong pilot experience. Premium positioning comes from relevance, depth and support—not pressure or a high price alone.',
        'checklist' => ['A clearly defined audience and outcome', 'A documented format, duration and support level', 'A respectful clarity-call question flow', 'Transparent price, boundaries and policies', 'A strong onboarding and feedback experience'],
        'faqs' => [
            ['What makes a yoga offer premium?', 'A premium offer usually has a focused audience, a deeper or more specific journey, thoughtful support, clear boundaries and a well-designed participant experience. Price alone does not make it premium.'],
            ['Where can I find my first premium yoga clients?', 'Begin with former students, referrals, professional communities and workshop participants who already understand your approach. Relevance and trust matter more than a large audience.'],
            ['What should happen on a yoga clarity call?', 'Understand the person’s goal, current situation, constraints and readiness; explain the program accurately; answer questions; and agree on a clear next step without pressure.'],
        ],
        'sections' => [
            ['Strengthen the offer first', ['Make the audience, outcome, duration, format and support clear. It is difficult to enrol confidently when the program itself remains vague.']],
            ['Begin with warm relationships', ['Reconnect respectfully with former students, professional contacts and communities where trust already exists. Ask about current needs and share your offer only when it is relevant.']],
            ['Use a structured clarity call', ['Understand the person’s goal, present situation, constraints and readiness. Explain your process and allow space for questions. A good conversation should lead to a clear yes, no or later—not pressure.']],
            ['Deliver an excellent first experience', ['Set expectations, communicate consistently, notice progress and request feedback. Strong participant experience creates referrals and evidence for future enrolment.']],
        ],
    ],
];

$slug = trim((string) ($_GET['article'] ?? ''));

if ($slug !== '' && isset($articles[$slug])) {
    $article = $articles[$slug];
    $meta = page_meta([
        'title' => $article['meta_title'],
        'description' => $article['description'],
        'path' => '/resources/' . $slug . '/',
    ]);
    $faqEntities = array_map(static fn(array $faq): array => [
        '@type' => 'Question',
        'name' => $faq[0],
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq[1]],
    ], $article['faqs']);
    $structuredData = [
        breadcrumb_schema([['Home', '/'], ['Resources', '/resources/'], [$article['title'], '/resources/' . $slug . '/']]),
        [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            '@id' => SITE_URL . '/resources/' . $slug . '/#article',
            'headline' => $article['title'],
            'description' => $article['description'],
            'image' => [SITE_URL . '/assets/images/trainer-business-planning-v1.jpg', SITE_URL . '/assets/images/og.jpg'],
            'datePublished' => '2026-08-11',
            'dateModified' => '2026-08-11',
            'inLanguage' => 'en-IN',
            'articleSection' => $article['category'],
            'author' => ['@type' => 'Person', '@id' => SITE_URL . '/about/#prabhu-zunja', 'name' => 'Prabhu Zunja', 'url' => SITE_URL . '/about/'],
            'publisher' => ['@id' => SITE_URL . '/#organization'],
            'mainEntityOfPage' => SITE_URL . '/resources/' . $slug . '/',
        ],
        ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $faqEntities],
    ];
    require __DIR__ . '/includes/header.php';
    ?>
    <section class="page-hero page-hero-visual"><div><p class="breadcrumbs"><a href="<?= e(site_path()) ?>">Home</a> / <a href="<?= e(site_path('resources')) ?>">Resources</a> / <?= e($article['category']) ?></p><h1><?= e($article['title']) ?></h1></div><p><?= e($article['description']) ?></p><div class="page-hero-image focus-right"><img src="<?= e(asset_url('images/trainer-business-planning-v1.jpg')) ?>" fetchpriority="high" decoding="async" srcset="<?= e(responsive_srcset('trainer-business-planning-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Prabhu Zunja developing a practical yoga business strategy" width="1536" height="1024"><span><?= e($article['category']) ?> guide</span></div></section>
    <section class="content-section"><article class="prose resource-article"><p class="eyebrow">Practical guide</p><p class="article-meta">Written by <a href="<?= e(site_path('about')) ?>">Prabhu Zunja</a> · Published 11 August 2026 · Updated 11 August 2026</p><p class="resource-intro"><?= e($article['intro']) ?></p><div class="answer-box"><strong>Quick answer</strong><p><?= e($article['quick_answer']) ?></p></div><?php foreach ($article['sections'] as $section): ?><h2><?= e($section[0]) ?></h2><?php foreach ($section[1] as $paragraph): ?><p><?= e($paragraph) ?></p><?php endforeach; ?><?php endforeach; ?><h2>Practical checklist</h2><ul class="checklist"><?php foreach ($article['checklist'] as $item): ?><li><?= e($item) ?></li><?php endforeach; ?></ul><h2>Frequently asked questions</h2><div class="inline-faq"><?php foreach ($article['faqs'] as $faq): ?><details><summary><?= e($faq[0]) ?><span>+</span></summary><p><?= e($faq[1]) ?></p></details><?php endforeach; ?></div><div class="notice">Use these ideas as a practical starting point and adapt them to your training, professional scope and participants.</div><a class="button primary" href="<?= e(site_path('contact')) ?>?message=<?= rawurlencode('I would like guidance on ' . $article['title']) ?>">Discuss this with a mentor <span>→</span></a></article></section>
    <?php
    require __DIR__ . '/includes/footer.php';
    return;
}

if ($slug !== '') {
    require __DIR__ . '/404.php';
    return;
}

$meta = page_meta([
    'title' => 'Yoga Business Resources for Teachers | Yoga Prosperity Model',
    'description' => 'Practical resources on yoga business, client attraction, signature programs, pricing and online yoga teaching.',
    'path' => '/resources/',
]);
$structuredData = [breadcrumb_schema([['Home', '/'], ['Resources', '/resources/']])];
require __DIR__ . '/includes/header.php';
?>
<section class="page-hero page-hero-visual"><div><p class="breadcrumbs"><a href="<?= e(site_path()) ?>">Home</a> / Resources</p><h1>Ideas for<br><em>purposeful growth.</em></h1></div><p>Practical guidance for yoga teachers building meaningful programs, trusted visibility and sustainable careers.</p><div class="page-hero-image focus-right"><img src="<?= e(asset_url('images/trainer-podcast-v1.jpg')) ?>" srcset="<?= e(responsive_srcset('trainer-podcast-v1.jpg')) ?>" sizes="(max-width: 768px) 100vw, 768px" alt="Prabhu Zunja sharing practical insights in a podcast conversation" width="1536" height="1024"><span>Ideas worth sharing</span></div></section>
<section class="content-section"><div class="article-grid"><?php foreach ($articles as $articleSlug => $article): ?><article class="article-card"><span><?= e($article['category']) ?></span><h2><?= e($article['title']) ?></h2><p><?= e($article['description']) ?></p><a href="<?= e(site_path('resources/' . $articleSlug)) ?>">Read guide →</a></article><?php endforeach; ?></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
