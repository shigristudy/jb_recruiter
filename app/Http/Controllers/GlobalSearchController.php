<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Community;
use App\Models\Course;
use App\Models\DigitalBook;
use App\Models\EmployerJob;
use App\Models\Recruiter;
use App\Models\RecruiterJob;
use App\Models\RecruiterWebsite;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GlobalSearchController extends Controller
{
    public function search(Request $request)
    {
        $recruiter = Recruiter::query()
                ->with('employers')
                ->where('franchise_slug',request('recruiter'))
                ->first();
        $franchise_id = $recruiter->franchise_id;
        $query = $request->input('search');
        $perPage = $request->input('per_page', 5);

        if (!$query) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please provide a search query'
            ], 400);
        }

        // Search in Coach model
        $coaches = Coach::query()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->limit($perPage)
            ->get();

        // Search in Community model
        $communities = Community::query()
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->where('franchise_id', $franchise_id)
            ->limit($perPage)
            ->get();

        // Search in Course model
        $courses = Course::query()
            ->where('franchise_id', $franchise_id)
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%");
            })
            ->limit($perPage)
            ->get();

        // Search in DigitalBook model
        $digitalBooks = DigitalBook::query()
            ->where('franchise_id', $franchise_id)
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%");
            })
            ->limit($perPage)
            ->get();

        // Search in Service model
        $products = DB::table('lms_products')->where('franchise_id', $franchise_id)->orderBy('created_at', 'DESC')->take($perPage)->get();
       
        // Search in EmployerJob model
        $employerJobs = EmployerJob::query()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->limit($perPage)
            ->get();

        // Transform data to unified structure
        $unifiedResults = array_merge(
            $this->transformData($coaches, 'coach'),
            $this->transformData($communities, 'community'),
            $this->transformData($courses, 'course'),
            $this->transformData($digitalBooks, 'digital_book'),
            $this->transformData($products, 'products'),
            $this->transformData($employerJobs, 'employer_job'),
        );

        return view('search_results', compact('unifiedResults', 'query'));
    }

    private function transformData($items, $type)
    {
        $results = [];

        foreach ($items as $item) {
            $result = [
                'id' => $item->id,
                'type' => $this->getProperName($type),
                'heading' => $this->getHeading($item, $type),
                'view_route' => $this->getViewRoute($item, $type),
                'price' => $this->getPrice($item, $type),
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];

            $results[] = $result;
        }

        return $results;
    }

    private function getProperName($type)
    {
        switch ($type) {
            case 'coach':
                return 'Coaching Programme';
            case 'community':
                return 'Community';
            case 'course':
                return 'Course';
            case 'digital_book':
                return 'Digital Book';
            case 'products':
                return 'Product';
            case 'employer_job':
                return 'Jobs';
            default:
                return 'Unknown';
        }
    }

    private function getHeading($item, $type)
    {
        switch ($type) {
            case 'coach':
                return $item->name ?? 'Coach';
            case 'community':
                return $item->name ?? 'Community';
            case 'course':
                return $item->title ?? 'Course';
            case 'digital_book':
                return $item->title ?? 'Digital Book';
            case 'products':
                return $item->title ?? 'Products';
            case 'employer_job':
                return $item->title ?? 'Job';
            default:
                return 'Unknown';
        }
    }

    private function getViewRoute($item, $type)
    {
        $routes = [
            'coach' => route('lms.coach.details', ['recruiter' => request('recruiter'), 'id' => $item->id]),
            'community' => route('lms.community_details', ['recruiter' => request('recruiter'), 'id' => $item->id]),
            'course' => route('lms.courses_details', ['recruiter' => request('recruiter'), 'id' => $item->id]),
            'digital_book' => route('lms.digital.books.details', ['recruiter' => request('recruiter'), 'id' => $item->id]),
            'products' => route('lms.product.details', ['recruiter' => request('recruiter'), 'id' => $item->id]),
            'employer_job' => '#',
        ];
        return $routes[$type] ?? '#';
    }

    private function getPrice($item, $type)
    {
        switch ($type) {
            case 'coach':
                return $item->price ?? null;
            case 'community':
                return $item->price ?? null;
            case 'course':
                return $item->price ?? null;
            case 'digital_book':
                return $item->price ?? null;
            case 'products':
                return $item->price ?? null;
            case 'employer_job':
                return $item->salary ?? null;
            default:
                return null;
        }
    }
}
