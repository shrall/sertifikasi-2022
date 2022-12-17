@extends('layouts.app')

@section('content')
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="px-4 py-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">{{ $book->name }}</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the users who have loaned this book.</p>
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Loan Date</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Loan Due</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Status</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($histories as $history)
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            {{ $history->user->name }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ date('d-m-y', strtotime($history->loan_date)) }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ date('d-m-y', strtotime($history->loan_due)) }}
                                        </td>
                                        <td @class([
                                            'whitespace-nowrap px-3 py-4 text-sm',
                                            'text-red-500' => $history->status->name == 'Loaned',
                                            'text-blue-400' => $history->status->name == 'Available',
                                        ]) class="text-gray-500">
                                            {{ $history->status->name == 'Available' ? 'Returned' : $history->status->name }}
                                        </td>
                                        <td
                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            @if ($history->status_id == 2)
                                                <a onclick="toggleReturnModal({{ $history->id }}, '{{ $history->user->name }}');"
                                                    href="#" class="text-indigo-600 hover:text-indigo-900">Return<span
                                                        class="sr-only">,
                                                        {{ $history->user->name }}</span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div id="return-modal" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <form action="{{ route('admin.book.store') }}" method="post">
            @csrf
            <input type="hidden" id="history-id" name="history_id">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Return Confirmation
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    <span id="user-name" class="font-bold">asd</span> have
                                    returned <span class="font-bold">{{ $book->name }}</span>
                                </p>
                                <p>Return date: <span
                                        class="font-bold">{{ date('d, M Y', strtotime(\Carbon\Carbon::now())) }}</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                        <button type="submit"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Confirm</button>
                        <button type="button" onclick="toggleReturnModal(0, '');"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        var returnModalBool = false;

        function toggleReturnModal(id, name) {
            if (returnModalBool) {
                $('#return-modal').addClass('hidden').removeClass('block');
            } else {
                $('#history-id').val(id);
                $('#user-name').html(name);
                $('#return-modal').addClass('block').removeClass('hidden');
            }
            returnModalBool = !returnModalBool;
        }
    </script>
@endsection
