<?php

namespace App\Http\Controllers\job_seeker;

use App\Http\Controllers\company\CompanyProfilController;
use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\Job;
use App\Models\Company;
use App\Models\JobTimeType;
use App\Models\Requirement;
use Illuminate\Http\Request;

class JobDetailsController extends Controller
{
    public function navigateToJobList()
    {
        $this->redirect('/job-seekers/job-details');
    }

    public function index($id)
    {
        $job = Job::findOrFail($id);
        $company = $job->company; // Mendapatkan informasi perusahaan terkait
        $requirements = Requirement::all();
        $jobcategories = JobCategory::all();
        $job_time = JobTimeType::all();
        $selectedRequirements = is_string($job->requirement_id) ? json_decode($job->requirement_id, true) : $job->requirement_id;
        $selectedRequirements = is_array($selectedRequirements) ? $selectedRequirements : [];

        // Asumsikan bahwa logo disimpan di storage/app/public/companies/logos/
        $logoUrl = null;
        if ($company && $company->logo) {
            $logoUrl = asset('storage/' . $company->logo);
        } 

        $data = ([
            "title" => "Edit Data Lowongan Kerja",
            "job" => $job,
            "job_time" => $job_time,
            "requirements" => $requirements,
            "jobcategories" => $jobcategories,
            "selectedRequirements" => $selectedRequirements
        ]);
        
        // dd($job);
        return view('job-seekers.job-details', compact('company', 'logoUrl'), $data);
        // return view('job-seekers.job-details');
    }
}
