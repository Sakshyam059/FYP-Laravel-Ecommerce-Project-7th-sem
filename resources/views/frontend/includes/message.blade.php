@if (session('success'))
    <div id="message"
        class="fixed z-50 flex items-center px-4 py-3 font-bold tracking-wide text-green-600 bg-white border rounded shadow-sm top-10 right-5 slide-in">
        <span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none"
                stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" stroke="#28a745" fill="white" />
                <path d="M9 12l2 2l4-4" stroke="#28a745" />
            </svg>
        </span> &nbsp;&nbsp;
        <span>{{ session('success') }}</span>
        <button id="close-button" class="ml-4 text-green-600 focus:outline-none">
            &times;
        </button>
    </div>
@endif
@if (session('error'))
    <div id="message"
    class="fixed z-50 flex items-center px-4 py-3 font-bold tracking-wide text-red-600 bg-white border rounded shadow-sm top-10 right-5 slide-in">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M6 6l12 12M6 18L18 6" stroke="#dc3545"/>
      </svg>
    <span>{{ session('error') }}</span>
    </div>
@endif
