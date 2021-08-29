<?php

namespace App\View\Controllers;

use Domain\Course\Models\Course;
use Domain\Topic\Models\Topic;
use Illuminate\Http\Request;
use Support\CustomVisitor;
use Illuminate\Http\JsonResponse;

final class ViewController
{
    public function recordTopicView(Request $request, $topic, CustomVisitor $visitor): JsonResponse
    {
        $topic = Topic::findOrFail($topic);

        $visitor->setId($request->input('visitor'));
        $visitor->setIp($request->input('ip_address'));
        $visitor->setHasDoNotTrackHeader($request->boolean('has_do_not_track_header'));
        $visitor->setIsCrawler($request->boolean('is_crawler'));

        views($topic)
            ->useVisitor($visitor)
            ->record();

        return response()->json([
            'message' => 'View successfully recorded!',
        ]);
    }

    public function recordCourseView(Request $request, $course): JsonResponse
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
            'message' => 'View successfully recorded!',
        ]);
    }
}
