@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <main class="mx-auto pt-14 pb-24 px-4 sm:pt-16 sm:pb-32 sm:px-6 lg:max-w-7xl lg:px-8">
            <!-- Product -->
            <div class="lg:grid lg:grid-rows-1 lg:grid-cols-7 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">
                <!-- Product image -->
                <div class="lg:row-end-1 lg:col-span-3">
                    <div class="w-full aspect-h-3 rounded-lg bg-gray-100 overflow-hidden">
                        <img src="{{ asset('uploads/' . $book->image) }}"
                            alt="Sample of 30 icons with friendly and fun details in outline, filled, and brand color styles."
                            class="object-center object-cover w-full">
                    </div>
                </div>

                <!-- Product details -->
                <div class="max-w-2xl mx-auto mt-14 sm:mt-16 lg:max-w-none lg:mt-0 lg:row-end-2 lg:row-span-2 lg:col-span-4">
                    <div class="flex flex-col-reverse">
                        <div class="mt-4">
                            <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">{{ $book->name }}
                            </h1>

                            <h2 id="information-heading" class="sr-only">Book information</h2>
                            <p @class([
                                'text-sm mt-2',
                                'text-blue-500' => $book->histories->where('status_id', 2)->count() == 0,
                                'text-red-500' => $book->histories->where('status_id', 2)->count() > 0,
                            ])>
                                @if ($book->histories->where('status_id', 2)->count() > 0)
                                    Loaned by
                                    {{ $book->histories->where('status_id', 2)->first()->user->name }}
                                    until
                                    {{ date('d, F Y', strtotime($book->histories->where('status_id', 2)->first()->loan_due)) }}
                                @else
                                    Available
                                @endif
                            </p>
                        </div>
                    </div>

                    <p class="text-gray-500 mt-6">{{ $book->description }}</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4">
                        <button onclick="toggleLoanModal();" type="button" @disabled($book->histories->where('status_id', 2)->count() > 0)
                            class="disabled:opacity-60 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                            Loan</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div id="loan-modal" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <form action="{{ route('customer.book.store') }}" method="post">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Loan Confirmation</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">You will be loaning <span
                                        class="font-bold">{{ $book->name }}</span></p>
                                <p>Duration: <span class="font-bold">{{ date('d, M Y', strtotime(\Carbon\Carbon::now())) }}
                                        - {{ date('d, M Y', strtotime(\Carbon\Carbon::now()->addDays(7))) }}</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                        <button type="submit"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Confirm</button>
                        <button type="button" onclick="toggleLoanModal();"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        var loanModalBool = false;

        function toggleLoanModal() {
            if (loanModalBool) {
                $('#loan-modal').addClass('hidden').removeClass('block');
            } else {
                $('#loan-modal').addClass('block').removeClass('hidden');
            }
            loanModalBool = !loanModalBool;
        }
    </script>
@endsection
