<x-layout>

    <x-card>
        <h2 class="mb-4 text-lg font-medium"> You Job application</h2>

        <form action="{{ route('employer.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <x-label for="company_name" :required="true">Company Name</x-label>
                <x-text-input type="text" required id="company_name" name="company_name" />
            </div>

            <x-button class="w-full bg-white"> Create</x-button>

        </form>
    </x-card>
</x-layout>
