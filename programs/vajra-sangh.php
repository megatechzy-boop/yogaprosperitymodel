<?php
require_once dirname(__DIR__) . '/includes/config.php';
$program = [
    'name' => 'Vajra Sangh',
    'slug' => 'vajra-sangh',
    'level' => 'Mentorship at depth.',
    'price' => '₹99,999',
    'description' => 'The highest level of mentorship for established yoga teachers building a differentiated program, retreat or long-term body of work.',
    'intro' => 'Vajra Sangh combines the Rajat learning pathway with individual guidance and deeper collaborative development.',
    'image' => 'trainer-mentoring-v1.jpg',
    'image_alt' => 'Prabhu Zunja in a focused personal mentoring conversation',
    'image_label' => 'Mentorship at depth',
    'image_focus' => 'focus-right',
    'audience' => 'Established yoga teachers seeking personal strategic guidance for a differentiated program, retreat or longer-term professional pathway.',
    'outcomes' => [
        'Refine a differentiated yoga program around your experience and audience.',
        'Make business and delivery decisions with one-to-one mentoring support.',
        'Develop a purposeful retreat concept with clearer structure and positioning.',
        'Follow a longer-term pathway for professional development and recognition.',
    ],
    'delivery' => [
        ['Format', 'Rajat Sangh foundation plus personal coaching and collaborative development.'],
        ['Duration', 'One-year mentorship membership, with a separate longer-term certification pathway described by the team.'],
        ['Access', 'Online learning and mentoring, with collaborative experiences confirmed before enrolment.'],
        ['Best fit', 'Teachers with an existing body of work who want deeper individual guidance.'],
    ],
    'features' => [['Rajat foundation', 'Build on the core learning and implementation support included in Rajat Sangh.'], ['One-to-one coaching', 'Receive focused support for your business, program and decisions.'], ['Retreat collaboration', 'Develop a purposeful retreat concept and experience.'], ['Certification pathway', 'Follow a longer-term three-year development and recognition path.']],
    'faqs' => [
        ['What is included in Vajra Sangh?', 'Vajra Sangh combines the Rajat Sangh learning foundation with one-to-one coaching, retreat collaboration and a longer-term certification pathway.'],
        ['Who is Vajra Sangh for?', 'It is intended for established yoga teachers who want high-touch guidance while developing a differentiated program, retreat or long-term body of work.'],
        ['Is Vajra Sangh delivered online?', 'The learning and mentoring include online delivery. Any collaborative retreat experience, schedule and location are confirmed directly with the team before enrolment.'],
        ['Does Vajra Sangh guarantee business income?', 'No. The program provides education, mentoring and implementation support. Individual outcomes depend on experience, decisions, execution and market conditions.'],
    ],
];
require dirname(__DIR__) . '/includes/program-page.php';
