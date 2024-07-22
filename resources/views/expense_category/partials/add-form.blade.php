<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Expenses Tracker') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Add Expense Category') }}
        </p>
    </header>

    <form method="post" action="{{ route('expense_category.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', '')" autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="avatar" :value="__('Avatar')" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', '')" autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            {{-- <x-textarea-input id="description" name="description" class="mt-1 block w-full" cols="30" rows="5" placeholder="Expense Description"> {!! old('description', '') !!}
            </x-textarea-input> --}}
            <textarea name="description" id="description" cols="30" rows="5"
                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                :value="old('description', '')" placeholder="Expense Description"> {{ old('description', '') }} </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div>
            <x-input-label for="status" :value="__('Category')" />
            <select name="status" id="status"
                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">Select status</option>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active </option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive </option>
            </select>
            {{ old('status') }}
            <x-input-error class="mt-2" :messages="$errors->get('status')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
