<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use App\Models\Skill;
use App\Models\Job;
use App\Models\JobSkill;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public $activeskills;
    public $title, $description, $experience, $salary, $location, $extra_info, $company_name, $company_logo, $skills = [];

    public function mount()
    {
        $this->activeskills = Skill::all();
    }

    public function createJob()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'experience' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'extra_info' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'skills' => 'required|array',
        ]);

        $imageName = NULL;
        if ($this->company_logo) {
            $imageName = time() . '.' . $this->company_logo->extension();
            Storage::putFileAs(
                'images/',
                $this->company_logo,
                $imageName
            );
        }
        $job = Job::create([
            'title' => $this->title,
            'description' => $this->description,
            'experience' => $this->experience,
            'salary' => $this->salary,
            'location' => $this->location,
            'extra_info' => $this->extra_info,
            'company_name' => $this->company_name,
            'company_logo' => $imageName  ?? NULL,
        ]);

        if ($this->skills) {
            for ($i = 0; $i < count($this->skills); $i++) {
                if (!empty($this->skills[$i])) {
                    $jobSkill = new JobSkill();
                    $jobSkill->job_id = $job->id;
                    $jobSkill->skill_id = $this->skills[$i];
                    $jobSkill->save();
                }
            }
        }


        $this->jobs = Job::all();
        session()->flash('message', 'Job created successfully');
        $this->reset(['title', 'description', 'experience', 'salary', 'location', 'extra_info', 'company_name', 'company_logo', 'skills']);
        $this->dispatch('job-saved');
    }

    public function render()
    {
        return view('livewire.pages.jobs.create', ['activeskills' => $this->activeskills]);
    }
}
