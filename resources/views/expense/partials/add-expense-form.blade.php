<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Expenses Tracker') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Add your Expense.") }}
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
            <!-- <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', '')" autocomplete="Description" /> -->
            <textarea name="description" id="description" cols="30" rows="5" class="mt-1 block w-full"> {{ old('description', '') }} </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>
        
        <div>
            <x-input-label for="category_id" :value="__('Category')" />
            <x-text-input id="category_id" name="category_id" type="text" class="mt-1 block w-full" :value="old('category_id', '')" />
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