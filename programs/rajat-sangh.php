<?php
require_once dirname(__DIR__) . '/includes/config.php';
$program = [
    'name' => 'Rajat Sangh',
    'slug' => 'rajat-sangh',
    'level' => 'Build the foundation.',
    'price' => '₹6,999',
    'description' => 'A guided one-year foundation for yoga teachers ready to clarify their offer, learn the business essentials and implement with community support.',
    'intro' => 'Rajat Sangh brings practical recorded learning and consistent action together so you can start building your yoga career with greater clarity.',
    'image' => 'rajat-recorded-lectures-v1.jpg',
    'image_alt' => 'A Rajat Sangh member learning through Prabhu Zunja recorded lectures',
    'image_label' => 'Learn at your pace',
    'image_focus' => 'focus-right',
    'audience' => 'Yoga teachers who want a structured, affordable starting point for learning business fundamentals and taking consistent action.',
    'outcomes' => [
        'Choose a focused audience and communicate a clear yoga offer.',
        'Organise your knowledge into a practical signature program.',
        'Build a simple, ethical marketing and enrolment routine.',
        'Use weekly guidance and community accountability to keep implementing.',
    ],
    'delivery' => [
        ['Format', 'Recorded learning, a focused implementation challenge, weekly online Q&A and community support.'],
        ['Duration', 'One-year membership designed for self-paced learning with consistent implementation.'],
        ['Access', 'Learn online from your own location and bring questions to the weekly guidance sessions.'],
        ['Best fit', 'Teachers who are beginning or rebuilding the business side of their yoga practice.'],
    ],
    'features' => [['12 recorded lecture courses', 'Learn at your pace through recorded lessons on positioning, program design, marketing and enrolment.'], ['30-day hackathon', 'Move from ideas to implementation through focused challenges.'], ['Weekly Q&A', 'Bring questions, remove blockers and keep making progress.'], ['Accountability community', 'Learn alongside yoga teachers committed to responsible growth.']],
    'faqs' => [
        ['What do I receive in Rajat Sangh?', 'Rajat Sangh includes 12 recorded lecture courses, a 30-day implementation hackathon, weekly online question-and-answer guidance and an accountability community.'],
        ['Are the Rajat Sangh lessons recorded?', 'Yes. The main learning library is recorded so members can study at their own pace. Weekly guidance and community support help turn the lessons into action.'],
        ['Is Rajat Sangh suitable for a new yoga teacher?', 'It is designed as a foundation for teachers who need clarity on their audience, offer, positioning, marketing and enrolment. A clarity conversation can confirm whether it matches your current stage.'],
        ['How long is the Rajat Sangh membership?', 'The published membership duration is one year. Current scheduling and access details are confirmed with the team before enrolment.'],
    ],
];
require dirname(__DIR__) . '/includes/program-page.php';
