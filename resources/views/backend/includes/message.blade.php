@if (session('success'))
    <div id="message"
        class="fixed z-50 flex items-center px-8 py-4 text-green-600 border rounded shadow-sm bg-gray-50 top-10 right-5 slide-in">
        <span>{{ session('success') }}</span>
        <button id="close-button" class="ml-4 text-green-600 focus:outline-none">
            &times;
        </button>
    </div>
@endif
@if (session('error'))
    <div id="message"
        class="fixed z-50 flex items-center px-8 py-4 text-red-600 border rounded shadow-sm bg-gray-50 top-10 right-5 slide-in">
        <span>{{ session('success') }}</span>
        <button id="close-button" class="ml-4 text-red-600 focus:outline-none">
            &times;
        </button>
    </div>
@endif
