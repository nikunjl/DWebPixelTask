<div class="max-w-6xl mx-auto py-4">
    @if (session()->has('message'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ session('message') }}</span>
    </div>
    @endif

    <h2 class="text-xl font-semibold mb-6">Create new job posting</h2>

    <form wire:submit.prevent="createJob" class="grid grid-cols-1 lg:grid-cols-3 gap-6" enctype="multipart/form-data">
        <div class="col-span-2 bg-white p-6 rounded-xl shadow border">
            <h3 class="font-semibold text-gray-700 mb-4">Job details</h3>

            <div class="space-y-4">
                <div>
                    <label for="title" class="block font-medium">Title</label>
                    <input type="text" id="title" placeholder="Job posting title" wire:model="title" class="border rounded px-4 py-2 w-full" />
                    @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="description" class="block font-medium">Job Description</label>
                    <textarea id="description" placeholder="Job posting description" rows="3" wire:model="description" class="border rounded px-4 py-2 w-full"></textarea>
                    @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="experience" class="block font-medium">Experience</label>
                        <input type="text" id="experience" placeholder="Eg. 1–3 Yrs" wire:model="experience" class="border rounded px-4 py-2 w-full">
                        @error('experience') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="salary" class="block font-medium">Salary</label>
                        <input type="text" id="salary" placeholder="Eg. 2.75–5 Lacs PA" wire:model="salary" class="border rounded px-4 py-2 w-full">
                        @error('salary') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="location" class="block font-medium">Location</label>
                        <input type="text" id="location" placeholder="Eg. Remote / Pune" wire:model="location" class="border rounded px-4 py-2 w-full">
                        @error('location') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="extra_info" class="block font-medium">Extra Info</label>
                        <input type="text" id="extra_info" placeholder="Eg. Full Time, Urgent, Part Time, Flexible" wire:model="extra_info" class="border rounded px-4 py-2 w-full">
                        @error('extra_info') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                        <p class="text-xs text-gray-400 mt-1">Please use comma separated values</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Company Details -->
        <div class="bg-white p-6 rounded-xl shadow border space-y-6">
            <div>
                <h3 class="font-semibold text-gray-700 mb-2">Company details</h3>
                <label for="company_name" class="block font-medium">Name</label>
                <input type="text" id="company_name" placeholder="Company Name" wire:model="company_name" class="border rounded px-4 py-2 w-full">
                @error('company_name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="company_logo" class="block font-medium mt-4">Logo</label>
                <input type="file" id="company_logo" wire:model="company_logo" class="border rounded px-4 py-2 w-full">
                @error('company_logo') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <h3 class="font-semibold mb-2">Skills</h3>
                <label for="skills" class="block font-medium">Name</label>
                <select id="skills" wire:model="skills" multiple class="border rounded px-4 py-2 w-full">
                    @foreach($activeskills as $skill)
                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
                @error('skills') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="col-span-3">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                Save
            </button>
        </div>
    </form>
</div>