<section class="fixed inset-0 flex justify-center items-center bg-opacity-80 z-10 bg-gray-900 tutorial-modal">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-xl">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Welcome to the Dashboard Tutorial</h2>
                <button class="text-gray-500 hover:text-gray-700 close-tutorial-button">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M17.293 17.293a1 1 0 001.414-1.414L11.414 10l6.293-6.293a1 1 0 00-1.414-1.414L10 8.586 3.707 2.293a1 1 0 00-1.414 1.414L8.586 10 2.293 16.293a1 1 0 001.414 1.414L10 11.414l6.293 6.293z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>

        </div>
        <div class="pb-4">
            <div class="mb-4">
                <h3 class="text-base font-semibold mb-2">Step 1: Overview of the Dashboard</h3>
                <p class="text-sm text-gray-600">Welcome to your dashboard! Here, you'll find key metrics presented in a
                    chart—Profile Views, Messages Received, and Profile Shares. A quick summary also displays your
                    profile details and recent messages. This overview offers valuable insights into your
                    interactions.</p>
            </div>
            <div class="mb-4">
                <h3 class="text-base font-semibold mb-2">Step 2: Profile Setup</h3>
                <p class="text-sm text-gray-600">Click "Profile" in the menu to set up your profile. Add your name,
                    contact info, and professional bio. Showcase your recent achievements in the "Realizations" section.
                    An informative profile helps clients understand your expertise.
                </p>
            </div>
            <div class="mb-4">
                <h3 class="text-base font-semibold mb-2">Step 3: Manage Messages</h3>
                <p class="text-sm text-gray-600">Access "Messages" to efficiently handle client communications. View and
                    respond promptly to received messages. Effective communication strengthens relationships with
                    potential clients.</p>
            </div>
            <div class="flex justify-between">
                <form class="flex justify-between" action="{{route('dashboard.index')}}" method="get">
                    <x-button class="close-tutorial-button" name="nevermind" kind="secondary">Nevermind</x-button>
                </form>
                <x-button class="next-step-button" id="next-step-button" kind="primary">Next</x-button>

            </div>
        </div>
    </div>
</section>

<section class="hidden fixed inset-0 flex justify-center items-center bg-opacity-80 z-10 bg-gray-900 tutorial-modal">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-xl">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Welcome to the Dashboard Tutorial</h2>
                <button class="text-gray-500 hover:text-gray-700 close-tutorial-button">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M17.293 17.293a1 1 0 001.414-1.414L11.414 10l6.293-6.293a1 1 0 00-1.414-1.414L10 8.586 3.707 2.293a1 1 0 00-1.414 1.414L8.586 10 2.293 16.293a1 1 0 001.414 1.414L10 11.414l6.293 6.293z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>
        </div>
        <div class="pb-4">
            <div class="mb-4">
                <h3 class="text-base font-semibold mb-2">Step 4: Plan & Billing</h3>
                <p class="text-sm text-gray-600">Navigate to "Plan & Billing" to manage subscription plans and billing
                    info. Keep your details up-to-date to ensure uninterrupted services.</p>
            </div>
            <div class="mb-4">
                <h3 class="text-base font-semibold mb-2">Step 5: Settings</h3>
                <p class="text-sm text-gray-600">Personalize your dashboard experience in "Settings." Update your
                    password and manage profile visibility. You can choose to make your profile private, controlling who
                    can view and comment.
                </p>
            </div>
            <div class="mb-4">
                <h3 class="text-base font-semibold mb-2">Step 6: Go Back Home</h3>
                <p class="text-sm text-gray-600">Click "Go back home" to return to your profile quickly. This takes you
                    to your profile page with your information and updates.</p>
            </div>
            <form class="flex justify-end" action="{{route('dashboard.index')}}" method="get">
                <x-button class="next-step-button" name="nevermind" id="next-step-button" kind="primary">Close</x-button>
            </form>
        </div>
    </div>
</section>
