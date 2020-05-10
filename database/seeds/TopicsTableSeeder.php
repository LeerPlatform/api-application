<?php

use Domain\Topic\Models\Topic;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = new Topic();
        $subject->slug = 'marketing-communicatie-sales';
        $subject->setTranslation('display_name', 'nl', 'Marketing, Communicatie en Sales');
        $subject->setTranslation('description', 'nl', 'Cursussen over marketing, communicatie en ales.');
        // $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->slug = 'voeding';
        $subject->setTranslation('display_name', 'nl', 'Voeding');
        $subject->setTranslation('description', 'nl', 'Cursussen over Voeding');
        // $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->slug = 'fotografie';
        $subject->setTranslation('display_name', 'nl', 'Fotografie');
        $subject->setTranslation('description', 'nl', 'Cursussen over fotografie');
        // $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->slug = 'retail-handel-ondernemerschap';
        $subject->setTranslation('display_name', 'nl', 'Retail, Handel en Ondernemerschap');
        $subject->setTranslation('description', 'nl', 'Cursussen over retail, handel en ondernemerschap');
        // $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->slug = 'informatica';
        $subject->setTranslation('display_name', 'nl', 'Informatica');
        $subject->setTranslation('description', 'nl', 'Cursussen over informatica');
        // $subject->status = 'publish';
        $subject->save();

        $subject = new Topic();
        $subject->slug = 'gezondheidszorg-en-welzijn';
        $subject->setTranslation('display_name', 'nl', 'Gezondheidszorg en Welzijn');
        $subject->setTranslation('description', 'nl', 'Cursussen over gezondheidszorg en welzijn');
        // $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->slug = 'talen';
        $subject->setTranslation('display_name', 'nl', 'Talen');
        $subject->setTranslation('description', 'nl', 'Cursussen over talen');
        // $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->slug = 'muziek';
        $subject->setTranslation('display_name', 'nl', 'Muziek');
        $subject->setTranslation('description', 'nl', 'Cursussen over de muziek');
        // $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->slug = 'management-en-leidinggeven';
        $subject->setTranslation('display_name', 'nl', 'Management en Leidinggeven');
        $subject->setTranslation('description', 'nl', 'Cursussen over management en leidinggeven');
        // $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->slug = 'onderwijs-en-pedagogiek';
        $subject->setTranslation('display_name', 'nl', 'Onderwijs en Pedagogiek');
        $subject->setTranslation('description', 'nl', 'Cursussen over onderwijs en pedagogiek');
        // $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->slug = 'psychologie-en-coaching';
        $subject->setTranslation('display_name', 'nl', 'Psychologie en Coaching');
        $subject->setTranslation('description', 'nl', 'Cursussen over psychologie en coaching');
        // $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->slug = 'recht-en-bestuur';
        $subject->setTranslation('display_name', 'nl', 'Recht en Bestuur');
        $subject->setTranslation('description', 'nl', 'Cursussen over recht en bestuur');
        // $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->slug = 'toerisme-en-recreatie';
        $subject->setTranslation('display_name', 'nl', 'Toerisme en Recreatie');
        $subject->setTranslation('description', 'nl', 'Cursussen over toerisme en recreatie');
        // $subject->status = 'draft';
        $subject->save();

        $subject = new Topic();
        $subject->slug = 'schrijven';
        $subject->setTranslation('display_name', 'nl', 'Schrijven');
        $subject->setTranslation('description', 'nl', 'Cursussen over schrijven');
        // $subject->status = 'publish';
        $subject->save();
    }
}
