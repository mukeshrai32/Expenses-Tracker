<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Expenses Tracker') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Add your Expense.') }}
        </p>
    </header>

    <form method="post" action="{{ route('expense.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', '')" autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
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
            <x-input-label for="category_id" :value="__('Category')" />
            {{-- <x-text-input id="category_id" name="category_id" type="text" class="mt-1 block w-full" :value="old('category_id', '')" /> --}}
            <select name="category_id" id="category_id"
                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">Select Category</option>
                @forelse ($expense_categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('status') == $cat->id ? 'selected' : '' }}> {{ $cat->title }} </option>
                @empty
                @endforelse
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
        </div>

        <div>
            <x-input-label for="quantity" :value="__('Quantity')" />
            <x-text-input id="quantity" name="quantity" type="text" class="mt-1 block w-full" :value="old('quantity', '')" autocomplete="Expense Amount" />
            <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
        </div>

        <div>
            <x-input-label for="expense_amount" :value="__('Expense Amount')" />
            <x-text-input id="expense_amount" name="expense_amount" type="text" class="mt-1 block w-full" :value="old('expense_amount', '')" autocomplete="Expense Amount" />
            <x-input-error class="mt-2" :messages="$errors->get('expense_amount')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
