<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use App\Models\Job;

class Index extends Component
{
    public $jobs;
    public $title, $description, $experience, $salary, $location, $extra_info, $company_name, $company_logo, $skills = []; 

    public function mount()
    {
        $this->jobs = Job::with('skills')->get();
    }

    public function deleteJob($id)
    {
        \DB::table('job_skill')->where('job_id',$id)->delete();
        Job::findOrFail($id)->delete();
        $this->jobs = Job::all();
        session()->flash('message', 'Job deleted successfully');
    }

    public function render()
    {
        return view('livewire.pages.jobs.index', ['jobs' => $this->jobs]);
    }
}
