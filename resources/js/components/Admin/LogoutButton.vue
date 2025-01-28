<template>
    <div class="flex-shrink-0 p-2 border-t max-h-14">
      <form id="logoutForm" action="/logout" method="POST">
        <!-- Include CSRF token as hidden input -->
        <input type="hidden" name="_token" :value="csrfToken" />
        <button
          @click.prevent="submitLogoutForm"
          class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider text-white uppercase border rounded-md bg-primary hover:bg-primaryHover hover:text-yellow-500 focus:outline-none focus:ring"
          type="button"
        >
          <span>
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
          </span>
          <span :class="{ 'lg:hidden': !isSidebarOpen }"> Logout </span>
        </button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    name: 'LogoutButton',
    data() {
      return {
        csrfToken: document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
      };
    },
    methods: {
      submitLogoutForm() {
        // Manually submit the form to logout
        document.getElementById('logoutForm').submit();
      },
    },
  };
  </script>
  
  <style scoped>
  /* Styles for the logout button or any specific styling for this component */
  </style>
  