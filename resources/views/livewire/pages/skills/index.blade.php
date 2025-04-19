<div class="p-6 bg-white shadow rounded-lg">
    
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">{{ session('message') }}</span>
        </div>
    @endif
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Skill List -->
        <div class="md:col-span-2">
            <h2 class="text-xl font-semibold mb-4">Skills</h2>
            <div class="bg-white shadow-md rounded overflow-hidden">
                <table class="w-full text-sm text-left">
                    <table class="table-auto w-full border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Skill Name</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skills as $skill)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $skill->id }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $skill->name }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">

                                    <button
                                        wire:click="editSkill({{ $skill->id }})"
                                        class="bg-blue-500 text-white px-2 py-1 rounded">Edit</button>
                                    <button
                                        wire:click="deleteSkill({{ $skill->id }})"
                                        onclick="confirm('Are you sure you want to delete this skill?') || event.stopImmediatePropagation()"
                                        class="bg-red-500 text-white px-3 py-1 rounded">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </table>
            </div>
        </div>

        <!-- Add Skill Form -->
        <div>
            <div class="bg-white shadow-md rounded p-6">
                <h3 class="text-md font-semibold mb-4">@if(!$skillId) Add new skill @else Update skill @endif</h3>

                @if(!$skillId)
                <form wire:submit.prevent="addSkill" class="">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                    <input
                        type="text"
                        wire:model="name"
                        placeholder="Enter skill name"
                        class="w-full border rounded px-4 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Save
                    </button>
                </form>
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                @endif


                @if(!empty($skillId))
                <form wire:submit.prevent="updateSkill" class="">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                    <input
                        type="text"
                        wire:model="name"
                        placeholder="Enter skill name"
                        class="w-full border rounded px-4 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Update
                    </button>
                </form>
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                @endif
            </div>
        </div>
    </div>

</div>