<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Jobs' => '#']" />

    <div class="mb-8 text-right">
        <x-link-button :href="route('my-jobs.create')">Add New Job</x-link-buton>
    </div>
    @forelse ($jobs as $job)
        <x-job-card :$job>
            <div class="text-sm text-slate-500">
                @forelse ($job->jobApplications as $jobApplication)
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <div>
                                {{ $jobApplication->user->name }}
                            </div>
                            <div>
                                Applied {{ $jobApplication->created_at->diffForHumans() }}
                            </div>
                            <div> Download CV</div>
                        </div>
                        <div>
                            ${{ number_format($jobApplication->expected_salary) }}
                        </div>

                    </div>
                @empty
                    <div>No job applications yet</div>
                @endforelse
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No Jobs yet.
            </div>
            <div class="text-center">
                Post your first Job <a class="text-indigo-500 hover:underline"
                    href="{{ route('my-jobs.create') }}">here!</a>
            </div>
        </div>
    @endforelse
</x-layout>
