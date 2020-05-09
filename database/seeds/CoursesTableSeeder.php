<?php

use Domain\Course\Models\Unit;
use Domain\Course\Models\Course;
use Domain\Course\Models\Section;
use Domain\Topic\Models\Topic;
use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * SVG Gevorderde Cursus.
         */
        $course = new Course();
        $course->slug = 'svg-gevorderde-cursus';
        $course->setTranslation('title', 'nl', 'SVG gevorderde cursus');
        $course->setTranslation('headline', 'nl', 'Leer de basisprincipes van SVG');
        $course->setTranslation('description', 'nl', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium velit leo, vitae congue nisi ullamcorper et. Aenean vitae orci eleifend, efficitur ante at, posuere ex. Donec laoreet pharetra molestie. Suspendisse lacinia vehicula nisi, id congue nibh porta at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Morbi eu tempus est. Phasellus sed justo sodales, ornare nisl sed, viverra dolor. Suspendisse eget mi auctor elit vestibulum volutpat. Curabitur auctor dictum est, ac efficitur sem. Maecenas et faucibus turpis, nec tempor mauris. Praesent sagittis dapibus neque ut aliquam. Nam dapibus, arcu sit amet laoreet eleifend, enim ante euismod diam, at lacinia enim leo et sem. Donec quam eros, dignissim vel vestibulum eu, elementum et dolor. Aliquam hendrerit tellus sit amet ante molestie fermentum. Nulla et sem vitae augue finibus fringilla vitae vel ligula. Maecenas leo quam, molestie tincidunt condimentum quis, sodales ac massa.</p>');
        $course->setTranslation('description_excerpt', 'nl', 'In deze cursus leer je de basisbeginselen van PHP. Je weet na afloop wat een conditional statement, for-loop, class en variable is.');
        $course->setTranslation('learning_points', 'nl', [
            'Variables',
            'Operators',
            'Conditionals',
            'Comments',
            'PHP on the Web',
        ]);

        // $course->target_audience = [
        //     'MBO-ers',
        //     'Beginners',
        //     'Hobbiesten',
        // ];
        $course->language = 'nl';
        // $course->level = 'gevorderde';
        $course->estimated_duration = 12;
        // $course->status = 'draft';
        // $course
        //     ->addMedia(storage_path('app/public/defaults/example-car-2048x1152.png'))
        //     ->preservingOriginal()
        //     ->toMediaCollection('images');
        $course->published_at = now();
        $course->created_at = now();
        $course->updated_at = now()->addWeeks(1);

        // Topic
        $course->topic()->associate(5);

        $course->save();

        // Tags
        $tag_svg = Tag::findOrCreate('SVG', 'courseTag');
        $course->attachTag($tag_svg);

        // Authors
        $course->authors()->attach(1);

        // The units and sections
        $course_unit = new Unit();
        $course_unit->slug = 'welkom-op-de-cursus';
        $course_unit->title = 'Welkom op de cursus';
        $course_unit->description = 'Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.';
        $course_unit->draft = false;
        $course_unit->status = true;
        $course->units()->save($course_unit);

        $course_unit_section = new Section();
        $course_unit_section->slug = 'cursus-introductie-en-overzicht';
        $course_unit_section->title = 'Cursus Introductie & Overzicht';
        $course_unit_section->content_type = 'plain_html_db';
        $course_unit_section->content = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium velit leo, vitae congue nisi ullamcorper et. Aenean vitae orci eleifend, efficitur ante at, posuere ex. Donec laoreet pharetra molestie. Suspendisse lacinia vehicula nisi, id congue nibh porta at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Morbi eu tempus est. Phasellus sed justo sodales, ornare nisl sed, viverra dolor. Suspendisse eget mi auctor elit vestibulum volutpat. Curabitur auctor dictum est, ac efficitur sem. Maecenas et faucibus turpis, nec tempor mauris. Praesent sagittis dapibus neque ut aliquam. Nam dapibus, arcu sit amet laoreet eleifend, enim ante euismod diam, at lacinia enim leo et sem. Donec quam eros, dignissim vel vestibulum eu, elementum et dolor. Aliquam hendrerit tellus sit amet ante molestie fermentum. Nulla et sem vitae augue finibus fringilla vitae vel ligula. Maecenas leo quam, molestie tincidunt condimentum quis, sodales ac massa.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium velit leo, vitae congue nisi ullamcorper et. Aenean vitae orci eleifend, efficitur ante at, posuere ex. Donec laoreet pharetra molestie. Suspendisse lacinia vehicula nisi, id congue nibh porta at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Morbi eu tempus est. Phasellus sed justo sodales, ornare nisl sed, viverra dolor. Suspendisse eget mi auctor elit vestibulum volutpat. Curabitur auctor dictum est, ac efficitur sem. Maecenas et faucibus turpis, nec tempor mauris. Praesent sagittis dapibus neque ut aliquam. Nam dapibus, arcu sit amet laoreet eleifend, enim ante euismod diam, at lacinia enim leo et sem. Donec quam eros, dignissim vel vestibulum eu, elementum et dolor. Aliquam hendrerit tellus sit amet ante molestie fermentum. Nulla et sem vitae augue finibus fringilla vitae vel ligula. Maecenas leo quam, molestie tincidunt condimentum quis, sodales ac massa.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium velit leo, vitae congue nisi ullamcorper et. Aenean vitae orci eleifend, efficitur ante at, posuere ex. Donec laoreet pharetra molestie. Suspendisse lacinia vehicula nisi, id congue nibh porta at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Morbi eu tempus est. Phasellus sed justo sodales, ornare nisl sed, viverra dolor. Suspendisse eget mi auctor elit vestibulum volutpat. Curabitur auctor dictum est, ac efficitur sem. Maecenas et faucibus turpis, nec tempor mauris. Praesent sagittis dapibus neque ut aliquam. Nam dapibus, arcu sit amet laoreet eleifend, enim ante euismod diam, at lacinia enim leo et sem. Donec quam eros, dignissim vel vestibulum eu, elementum et dolor. Aliquam hendrerit tellus sit amet ante molestie fermentum. Nulla et sem vitae augue finibus fringilla vitae vel ligula. Maecenas leo quam, molestie tincidunt condimentum quis, sodales ac massa.</p>';
        $course_unit_section->draft = false;
        $course_unit_section->status = true;
        $course_unit->sections()->save($course_unit_section);

        $course_unit_section = new Section();
        $course_unit_section->slug = 'create-a-custom-slack-slash-command-with-node.js-and-express';
        $course_unit_section->title = 'Create a custom Slack slash command with Node.js and Express';
        $course_unit_section->content_type = 'plain_html_db';
        $course_unit_section->content = '<p>In this tutorial we are going to learn how to build and deploy a custom Slack slash command using Node.js and the Express web framework.</p>
            <p>If you are interested in creating Slack integrations with Node.js, you might also be interested in a previous article that illustrates how to build a Slack bot with Node.js.</p>
            <h2>Slack "slash commands"... Wait, what?</h2>
            <p>Slash commands are special messages that begin with a slash (/) and behave differently from regular chat messages. For example, you can use the /feed command to subscribe the current channel to an RSS feed and receive notifications directly into Slack everytime a new article is published into that feed.</p>
            <img src="https://cdn.scotch.io/22/V5muHgj9T3qbf0eXZd7g_01-slack-feed-slash-command-screenshot.jpg">
            <p>There are many slash commands available by default, and you can create your custom ones to trigger special actions or to retrieve information from external sources without leaving Slack.</p>
            <h2>Building a URL shortener slash command</h2>
            <p>In this tutorial we are going to build a "URL shortener" slash command, which will allow us to generate personalised short urls with a versatile syntax. For example, we want the following command to generate the shorturl http://loige.link/rome17.</p>
            <p>We are going to use Rebrandly as Short URL service. If you don\'t know this service I totally recommend you, essentially for 3 reasons</p>';
        $course_unit_section->draft = false;
        $course_unit_section->status = true;
        $course_unit->sections()->save($course_unit_section);

        $course_unit = new Unit();
        $course_unit->slug = 'workflow-setup-en-tools-voor-cursus-project';
        $course_unit->title = 'Workflow setup en tools voor cursus project';
        $course_unit->description = 'Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.';
        $course_unit->draft = false;
        $course_unit->status = true;
        $course->units()->save($course_unit);

        $course_unit_section = new Section();
        $course_unit_section->slug = 'maak-een-svg-en-krijg-toegang-tot-de-code';
        $course_unit_section->title = 'Maak een SVG en krijg toegang tot de code';
        $course_unit_section->content_type = 'plain_html_db';
        $course_unit_section->content = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium velit leo, vitae congue nisi ullamcorper et. Aenean vitae orci eleifend, efficitur ante at, posuere ex. Donec laoreet pharetra molestie. Suspendisse lacinia vehicula nisi, id congue nibh porta at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Morbi eu tempus est. Phasellus sed justo sodales, ornare nisl sed, viverra dolor. Suspendisse eget mi auctor elit vestibulum volutpat. Curabitur auctor dictum est, ac efficitur sem. Maecenas et faucibus turpis, nec tempor mauris. Praesent sagittis dapibus neque ut aliquam. Nam dapibus, arcu sit amet laoreet eleifend, enim ante euismod diam, at lacinia enim leo et sem. Donec quam eros, dignissim vel vestibulum eu, elementum et dolor. Aliquam hendrerit tellus sit amet ante molestie fermentum. Nulla et sem vitae augue finibus fringilla vitae vel ligula. Maecenas leo quam, molestie tincidunt condimentum quis, sodales ac massa.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium velit leo, vitae congue nisi ullamcorper et. Aenean vitae orci eleifend, efficitur ante at, posuere ex. Donec laoreet pharetra molestie. Suspendisse lacinia vehicula nisi, id congue nibh porta at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Morbi eu tempus est. Phasellus sed justo sodales, ornare nisl sed, viverra dolor. Suspendisse eget mi auctor elit vestibulum volutpat. Curabitur auctor dictum est, ac efficitur sem. Maecenas et faucibus turpis, nec tempor mauris. Praesent sagittis dapibus neque ut aliquam. Nam dapibus, arcu sit amet laoreet eleifend, enim ante euismod diam, at lacinia enim leo et sem. Donec quam eros, dignissim vel vestibulum eu, elementum et dolor. Aliquam hendrerit tellus sit amet ante molestie fermentum. Nulla et sem vitae augue finibus fringilla vitae vel ligula. Maecenas leo quam, molestie tincidunt condimentum quis, sodales ac massa.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium velit leo, vitae congue nisi ullamcorper et. Aenean vitae orci eleifend, efficitur ante at, posuere ex. Donec laoreet pharetra molestie. Suspendisse lacinia vehicula nisi, id congue nibh porta at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Morbi eu tempus est. Phasellus sed justo sodales, ornare nisl sed, viverra dolor. Suspendisse eget mi auctor elit vestibulum volutpat. Curabitur auctor dictum est, ac efficitur sem. Maecenas et faucibus turpis, nec tempor mauris. Praesent sagittis dapibus neque ut aliquam. Nam dapibus, arcu sit amet laoreet eleifend, enim ante euismod diam, at lacinia enim leo et sem. Donec quam eros, dignissim vel vestibulum eu, elementum et dolor. Aliquam hendrerit tellus sit amet ante molestie fermentum. Nulla et sem vitae augue finibus fringilla vitae vel ligula. Maecenas leo quam, molestie tincidunt condimentum quis, sodales ac massa.</p>';
        $course_unit_section->draft = false;
        $course_unit_section->status = true;
        $course_unit->sections()->save($course_unit_section);

        $course_unit_section = new Section();
        $course_unit_section->slug = 'code-optimaliseren-met-omgsvg';
        $course_unit_section->title = 'Code optimaliseren met OMGSVG';
        $course_unit_section->content_type = 'plain_html_db';
        $course_unit_section->content = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium velit leo, vitae congue nisi ullamcorper et. Aenean vitae orci eleifend, efficitur ante at, posuere ex. Donec laoreet pharetra molestie. Suspendisse lacinia vehicula nisi, id congue nibh porta at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Morbi eu tempus est. Phasellus sed justo sodales, ornare nisl sed, viverra dolor. Suspendisse eget mi auctor elit vestibulum volutpat. Curabitur auctor dictum est, ac efficitur sem. Maecenas et faucibus turpis, nec tempor mauris. Praesent sagittis dapibus neque ut aliquam. Nam dapibus, arcu sit amet laoreet eleifend, enim ante euismod diam, at lacinia enim leo et sem. Donec quam eros, dignissim vel vestibulum eu, elementum et dolor. Aliquam hendrerit tellus sit amet ante molestie fermentum. Nulla et sem vitae augue finibus fringilla vitae vel ligula. Maecenas leo quam, molestie tincidunt condimentum quis, sodales ac massa.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium velit leo, vitae congue nisi ullamcorper et. Aenean vitae orci eleifend, efficitur ante at, posuere ex. Donec laoreet pharetra molestie. Suspendisse lacinia vehicula nisi, id congue nibh porta at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Morbi eu tempus est. Phasellus sed justo sodales, ornare nisl sed, viverra dolor. Suspendisse eget mi auctor elit vestibulum volutpat. Curabitur auctor dictum est, ac efficitur sem. Maecenas et faucibus turpis, nec tempor mauris. Praesent sagittis dapibus neque ut aliquam. Nam dapibus, arcu sit amet laoreet eleifend, enim ante euismod diam, at lacinia enim leo et sem. Donec quam eros, dignissim vel vestibulum eu, elementum et dolor. Aliquam hendrerit tellus sit amet ante molestie fermentum. Nulla et sem vitae augue finibus fringilla vitae vel ligula. Maecenas leo quam, molestie tincidunt condimentum quis, sodales ac massa.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium velit leo, vitae congue nisi ullamcorper et. Aenean vitae orci eleifend, efficitur ante at, posuere ex. Donec laoreet pharetra molestie. Suspendisse lacinia vehicula nisi, id congue nibh porta at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Morbi eu tempus est. Phasellus sed justo sodales, ornare nisl sed, viverra dolor. Suspendisse eget mi auctor elit vestibulum volutpat. Curabitur auctor dictum est, ac efficitur sem. Maecenas et faucibus turpis, nec tempor mauris. Praesent sagittis dapibus neque ut aliquam. Nam dapibus, arcu sit amet laoreet eleifend, enim ante euismod diam, at lacinia enim leo et sem. Donec quam eros, dignissim vel vestibulum eu, elementum et dolor. Aliquam hendrerit tellus sit amet ante molestie fermentum. Nulla et sem vitae augue finibus fringilla vitae vel ligula. Maecenas leo quam, molestie tincidunt condimentum quis, sodales ac massa.</p>';
        $course_unit_section->draft = false;
        $course_unit_section->status = true;
        $course_unit->sections()->save($course_unit_section);

        /**
         * PHP Beginnser Cursus.
         */
        $course = new Course();
        $course->slug = 'php-beginners-cursus';
        $course->setTranslation('title', 'nl', 'PHP beginners cursus');
        $course->setTranslation('headline', 'nl', 'Leer de basisprincipes van SVG');
        $course->setTranslation('description', 'nl', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium velit leo, vitae congue nisi ullamcorper et. Aenean vitae orci eleifend, efficitur ante at, posuere ex. Donec laoreet pharetra molestie. Suspendisse lacinia vehicula nisi, id congue nibh porta at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Morbi eu tempus est. Phasellus sed justo sodales, ornare nisl sed, viverra dolor. Suspendisse eget mi auctor elit vestibulum volutpat. Curabitur auctor dictum est, ac efficitur sem. Maecenas et faucibus turpis, nec tempor mauris. Praesent sagittis dapibus neque ut aliquam. Nam dapibus, arcu sit amet laoreet eleifend, enim ante euismod diam, at lacinia enim leo et sem. Donec quam eros, dignissim vel vestibulum eu, elementum et dolor. Aliquam hendrerit tellus sit amet ante molestie fermentum. Nulla et sem vitae augue finibus fringilla vitae vel ligula. Maecenas leo quam, molestie tincidunt condimentum quis, sodales ac massa.</p>');
        $course->setTranslation('description_excerpt', 'nl', 'In deze cursus leer je de basisbeginselen van PHP. Je weet na afloop wat een conditional statement, for-loop, class en variable is.');
        $course->setTranslation('learning_points', 'nl', [
            'Variables',
            'Operators',
            'Conditionals',
            'Comments',
            'PHP on the Web',
        ]);
        // $course->target_audience = [
        //     'MBO-ers',
        //     'Beginners',
        //     'Hobbiesten',
        // ];
        $course->language = 'nl';
        // $course->level = 'beginner';
        $course->estimated_duration = 6;
        // $course->status = 'publish';
        // $course
        //     ->addMedia(storage_path('app/public/defaults/example-man-tablet-2048x1152.png'))
        //     ->preservingOriginal()
        //     ->toMediaCollection('images');
        $course->published_at = now();
        $course->created_at = now()->subWeeks(2);
        $course->updated_at = now()->subWeeks(2)->addWeeks(1);

        // Topic
        $course->topic()->associate(5);

        $course->save();

        // The tags
        $tag_php = Tag::findOrCreate('PHP', 'courseTag');
        $course->attachTag($tag_php);

        // The Authors
        $course->authors()->attach(1);

        // The units and sections
        $course_unit = new Unit();
        $course_unit->slug = 'introductie-php';
        $course_unit->title = 'Hoofdstuk 1 - Introductie PHP';
        $course_unit->description = 'Deze module is met name geschikt voor degenen die zich willen bekwamen in JavaScript om deze taal te kunnen gebruiken als onderdeel van het ontwerpen, bouwen en onderhouden van websites en webapplicaties.';
        $course_unit->draft = false;
        $course_unit->status = true;
        $course->units()->save($course_unit);

        $course_unit_section = new Section();
        $course_unit_section->slug = 'wat-is-php';
        $course_unit_section->title = 'Paragraaf 1 - Wat is PHP?';
        $course_unit_section->draft = false;
        $course_unit_section->status = true;
        $course_unit->sections()->save($course_unit_section);

        $course_unit_section = new Section();
        $course_unit_section->slug = 'hoe-installeer-je-php';
        $course_unit_section->title = 'Paragraaf 2 - Hoe installeer je PHP';
        $course_unit_section->draft = false;
        $course_unit_section->status = true;
        $course_unit->sections()->save($course_unit_section);

        $course_unit_section = new Section();
        $course_unit_section->slug = 'wampp';
        $course_unit_section->title = 'Paragraaf 2 - Wampp';
        $course_unit_section->draft = false;
        $course_unit_section->status = true;
        $course_unit->sections()->save($course_unit_section);

        $course_unit = new Unit();
        $course_unit->title = 'Hoofdstuk 2 - Variabelen PHP';
        $course_unit->slug = 'variabelen-php';
        $course_unit->description = 'Deze module is met name geschikt voor degenen die zich willen bekwamen in JavaScript om deze taal te kunnen gebruiken als onderdeel van het ontwerpen, bouwen en onderhouden van websites en webapplicaties.';
        $course_unit->draft = false;
        $course_unit->status = true;
        $course->units()->save($course_unit);

        $course_unit_section = new Section();
        $course_unit_section->slug = 'variabelen';
        $course_unit_section->title = 'Paragraaf 1 - Variabelen';
        $course_unit_section->draft = false;
        $course_unit_section->status = true;
        $course_unit->sections()->save($course_unit_section);

        $course_unit_section = new Section();
        $course_unit_section->slug = 'parameters';
        $course_unit_section->title = 'Paragraaf 2 - Parameters';
        $course_unit_section->draft = false;
        $course_unit_section->status = true;
        $course_unit->sections()->save($course_unit_section);

        $course_unit = new Unit();
        $course_unit->slug = 'functies-php';
        $course_unit->title = 'Hoofdstuk 3 - Functies PHP';
        $course_unit->description = 'Deze module is met name geschikt voor degenen die zich willen bekwamen in JavaScript om deze taal te kunnen gebruiken als onderdeel van het ontwerpen, bouwen en onderhouden van websites en webapplicaties.';
        $course_unit->draft = false;
        $course_unit->status = true;
        $course->units()->save($course_unit);

        $course_unit_section = new Section();
        $course_unit_section->slug = 'aanroeping-van-een-functie';
        $course_unit_section->title = 'Paragraaf 1 - Aanroeping van een functie';
        $course_unit_section->draft = false;
        $course_unit_section->status = true;
        $course_unit->sections()->save($course_unit_section);

        $course_unit_section = new Section();
        $course_unit_section->slug = 'functie-maken';
        $course_unit_section->title = 'Paragraaf 2 - Functie maken';
        $course_unit_section->draft = false;
        $course_unit_section->status = true;
        $course_unit->sections()->save($course_unit_section);
    }
}
