<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            [
                'name' => 'Programming',
                'subSkills' => ['Java', 'Python', 'JavaScript', 'C++', 'Ruby', 'Swift', 'PHP', 'C#', 'Go', 'TypeScript'],
            ],
            [
                'name' => 'Web Development',
                'subSkills' => ['HTML', 'CSS', 'JavaScript', 'React', 'Angular', 'Vue.js', 'Node.js', 'Express.js', 'Django', 'Laravel'],
            ],
            [
                'name' => 'Mobile App Development',
                'subSkills' => ['iOS Development', 'Android Development', 'React Native', 'Flutter', 'Swift', 'Kotlin'],
            ],
            [
                'name' => 'Database Administration',
                'subSkills' => ['MySQL', 'PostgreSQL', 'MongoDB', 'SQL Server', 'Oracle', 'SQLite'],
            ],
            [
                'name' => 'Data Science',
                'subSkills' => ['Machine Learning', 'Data Analysis', 'Statistics', 'Big Data', 'Data Visualization', 'Natural Language Processing'],
            ],
            [
                'name' => 'Graphic Design',
                'subSkills' => ['Adobe Photoshop', 'Illustrator', 'InDesign', 'Sketch', 'CorelDRAW', 'UI/UX Design'],
            ],
            [
                'name' => 'Network Security',
                'subSkills' => ['Firewall Configuration', 'Intrusion Detection Systems', 'VPN Setup', 'Network Monitoring'],
            ],
            [
                'name' => 'Digital Marketing',
                'subSkills' => ['Social Media Marketing', 'Google Ads', 'Content Creation', 'Email Marketing', 'SEO'],
            ],
            [
                'name' => 'Project Management',
                'subSkills' => ['Agile Methodology', 'Scrum', 'Kanban', 'Project Planning', 'Risk Management', 'Agile Scrum Master'],
            ],
            [
                'name' => 'UI/UX Design',
                'subSkills' => ['User Research', 'Wireframing', 'Prototyping', 'Usability Testing', 'Adobe XD', 'Figma'],
            ],
            [
                'name' => 'Business Analysis',
                'subSkills' => ['Requirements Gathering', 'Process Mapping', 'SWOT Analysis', 'User Stories', 'Business Process Modeling'],
            ],
            [
                'name' => 'Technical Writing',
                'subSkills' => ['Documentation', 'User Manuals', 'API Documentation', 'Proofreading', 'Editing'],
            ],
            [
                'name' => 'Foreign Languages',
                'subSkills' => ['Spanish', 'French', 'Mandarin', 'German', 'Japanese', 'Russian', 'Arabic', 'Italian'],
            ],
            [
                'name' => 'Photography',
                'subSkills' => ['Portrait Photography', 'Landscape Photography', 'Event Photography', 'Photo Editing', 'Studio Lighting'],
            ],
            [
                'name' => 'Video Editing',
                'subSkills' => ['Adobe Premiere Pro', 'Final Cut Pro', 'DaVinci Resolve', 'Video Production', 'Motion Graphics'],
            ],
            [
                'name' => 'Music Production',
                'subSkills' => ['Digital Audio Workstations (DAWs)', 'Music Composition', 'Sound Editing', 'Mixing and Mastering'],
            ],
            [
                'name' => 'Fitness Training',
                'subSkills' => ['Strength Training', 'Cardio Workouts', 'Yoga', 'Nutrition Planning', 'Personal Training'],
            ],
            [
                'name' => 'Cooking',
                'subSkills' => ['Culinary Techniques', 'Baking', 'Meal Planning', 'Cookbook Recipes', 'Gourmet Cooking'],
            ],
            [
                'name' => 'Content Writing',
                'subSkills' => ['Blog Writing', 'Copywriting', 'Technical Writing', 'Creative Writing', 'Editing and Proofreading'],
            ],
            [
                'name' => 'E-commerce',
                'subSkills' => ['Shopify', 'WooCommerce', 'Magento', 'E-commerce Strategy', 'Payment Gateway Integration'],
            ],
            [
                'name' => 'Game Development',
                'subSkills' => ['Unity', 'Unreal Engine', 'Game Design', '3D Modeling for Games', 'Game Testing'],
            ],
            [
                'name' => 'Illustration and Art',
                'subSkills' => ['Digital Illustration', 'Traditional Art', 'Character Design', 'Concept Art'],
            ],
            [
                'name' => 'Legal Services',
                'subSkills' => ['Legal Consulting', 'Legal Document Preparation', 'Contract Drafting', 'Intellectual Property Law'],
            ],
            [
                'name' => 'Life Coaching',
                'subSkills' => ['Personal Development Coaching', 'Goal Setting', 'Mindfulness Coaching', 'Career Coaching'],
            ],
            [
                'name' => 'Mobile App Design',
                'subSkills' => ['User Interface Design (UI)', 'User Experience Design (UX)', 'Prototyping', 'Wireframing'],
            ],
            [
                'name' => 'SEO and Digital Marketing',
                'subSkills' => ['Search Engine Optimization (SEO)', 'Keyword Research', 'Google Analytics', 'SEO Audits'],
            ],
            [
                'name' => 'Social Media Management',
                'subSkills' => ['Content Planning', 'Social Media Scheduling', 'Community Management', 'Social Media Analytics'],
            ],
            [
                'name' => 'Software Development',
                'subSkills' => ['Agile Development', 'Version Control (Git)', 'Code Review', 'Unit Testing'],
            ],
            [
                'name' => 'Sustainability Consulting',
                'subSkills' => ['Environmental Impact Assessment', 'Green Building Certification', 'Sustainable Supply Chain Management'],
            ],
            [
                'name' => 'Technical Support',
                'subSkills' => ['Troubleshooting', 'Hardware Support', 'Software Support', 'IT Help Desk'],
            ],
            [
                'name' => 'Time Management',
                'subSkills' => ['Task Prioritization', 'Goal Setting', 'Time Blocking', 'Productivity Techniques'],
            ],
            [
                'name' => 'Translation and Localization',
                'subSkills' => ['Language Translation', 'Localization Strategy', 'Cultural Adaptation'],
            ],
            [
                'name' => 'Virtual Assistance',
                'subSkills' => ['Administrative Support', 'Email Management', 'Calendar Management', 'Data Entry'],
            ],
            [
                'name' => 'Web and Mobile Design',
                'subSkills' => ['Responsive Web Design', 'Mobile App UI/UX Design', 'Wireframing', 'Prototype Design'],
            ],
            [
                'name' => 'Writing and Editing',
                'subSkills' => ['Creative Writing', 'Copy Editing', 'Proofreading', 'Technical Writing'],
            ],
            [
                'name' => 'Yoga and Wellness Coaching',
                'subSkills' => ['Yoga Instruction', 'Meditation Guidance', 'Holistic Wellness Coaching'],
            ],
        ];

        $data = [];

        foreach ($skills as $skillData) {
            $subSkills = isset($skillData['subSkills']) ? json_encode($skillData['subSkills']) : null;

            $data[] = [
                'name' => $skillData['name'],
                'subSkills' => $subSkills,
            ];
        }

        Skill::insert($data);
    }
}
