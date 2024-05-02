@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex items-center justify-center">
    <div class="max-w-md w-full bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-900 dark:text-white">Payment Gateway</h2>
        <p class="mt-2 text-center text-gray-600 dark:text-gray-400">
            Enter your payment details below.
        </p>

        <!-- Static form for display -->
        <div class="mt-8">
            <div>
                <label for="cardName" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name on
                    Card</label>
                <input type="text" id="cardName" name="cardName" placeholder="" aria-expanded="true"
                    class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none">
            </div>

            <div class="mt-4">
                <label for="cardNumber" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Card
                    Number</label>
                <input type="text" id="cardNumber" name="cardNumber" placeholder="" aria-expanded="true"
                    class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none">
            </div>

            <div class="mt-4 grid grid-cols-3 gap-3">
                <div>
                    <label for="expiryMonth" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Expiry
                        Month</label>
                    <input type="text" id="expiryMonth" name="expiryMonth" placeholder="MM" aria-expanded="true"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none">
                </div>
                <div>
                    <label for="expiryYear" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Expiry
                        Year</label>
                    <input type="text" id="expiryYear" name="expiryYear" placeholder="YYYY" aria-expanded="true"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none">
                </div>
                <div>
                    <label for="cvv" class="block text-sm font-medium text-gray-700 dark:text-gray-200">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="" aria-expanded="true"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none">
                </div>
                <button type="submit"
                    class="inline-flex items-center px-7 py-3 mt-4 sm:mt-5 text-sm font-medium text-center text-white bg-primary-500 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-600">
                    Continue
                </button>
            </div>
        </div>
    </div>
</div>

@endsection