<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\ExternalServiceLink;
use App\Models\Extracurricular;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Position;
use App\Models\Staff;
use App\Models\Statistic;

class DashboardController extends Controller
{
    public function index()
    {
        $statistic = Statistic::firstOrCreate([]);

        $newsCount = News::count();
        $newsCategoryCount = NewsCategory::count();
        $galleryCount = Gallery::count();
        $galleryCategoryCount = GalleryCategory::count();
        $facilityCount = Facility::count();
        $achievementCount = Achievement::count();
        $externalLinkCount = ExternalServiceLink::count();
        $extracurricularCount = Extracurricular::count();
        $positionCount = Position::count();
        $staffCount = Staff::count();

        return view('admin.dashboard', compact(
            'statistic',
            'newsCount',
            'newsCategoryCount',
            'galleryCount',
            'galleryCategoryCount',
            'facilityCount',
            'achievementCount',
            'externalLinkCount',
            'extracurricularCount',
            'positionCount',
            'staffCount'
        ));
    }
}
