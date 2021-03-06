<?php

namespace App\View\Controllers;

use Domain\Course\Models\Course;
use Domain\Topic\Models\Topic;
use Illuminate\Http\Request;
use Support\CustomVisitor;

final class ViewController
{
    public function recordTopicView(Request $request, $topic)
    {
        $topic = Topic::findOrFail($topic);

        $visitor = app(CustomVisitor::class);
        $visitor->setId($request->input('visitor'));
        $visitor->setIp($request->input('ip_address'));
        $visitor->setHasDoNotTrackHeader($request->boolean('has_do_not_track_header'));
        $visitor->setIsCrawler($request->boolean('is_crawler'));

        views($topic)
            ->useVisitor($visitor)
            ->record();

        return response()->json([
            'message' => 'View sucessfully recorded!',
        ]);
    }

    public function recordCourseView(Request $request, $course)
    {
        $course = Course::findOrFail($course);

        $visitor = app(CustomVisitor::class);
        $visitor->setId($request->input('visitor'));
        $visitor->setIp($request->input('ip_address'));
        $visitor->setHasDoNotTrackHeader($request->boolean('has_do_not_track_header'));
        $visitor->setIsCrawler($request->boolean('is_crawler'));

        views($course)
            ->useVisitor($visitor)
            ->record();

        return response()->json([
            'message' => 'View sucessfully recorded!',
        ]);
    }
}
