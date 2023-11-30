<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Jobs' => route('my-jobs.index'), 'Edit Job' => '#']" />

    <x-card class="mb-8">
        <form action="{{ route('my-jobs.update', ['my_job' => $job]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid mb-4 grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true"> Title </x-label>
                    <x-text-input type="text" required id="title" name="title" :value="$job->title" />
                </div>
                <div>
                    <x-label for="location" :required="true"> Location </x-label>
                    <x-text-input type="text" required id="location" name="location" :value="$job->location" />
                </div>
                <div class="col-span-2">
                    <x-label for="salary" :required="true"> Salary </x-label>
                    <x-text-input type="number" required id="salary" name="salary" :value="$job->salary" />
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true"> Description </x-label>
                    <x-text-input type="textarea" required id="description" name="description" :value="$job->description" />
                </div>

                <div>
                    <x-label for="experience" :required="true"> Experience </x-label>
                    <x-radio-group name="experience" id="experience" :all-option="false" :value="$job->experience"
                        :options="array_combine(
                            array_map('ucfirst', \App\Models\Job::$experience),
                            \App\Models\Job::$experience,
                        )" />
                </div>

                <div>
                    <x-label for="category" :required="true"> Category </x-label>
                    <x-radio-group name="category" id="category" :all-option="false" :value="$job->category"
                        :options="\App\Models\Job::$category" />
                </div>

            </div>
            <x-button class="w-full  bg-white"> Edit Job</x-button>
        </form>
    </x-card>
</x-layout>
