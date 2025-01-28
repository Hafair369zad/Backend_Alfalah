<template>
    <div
      :class="{
        'fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none': true,
        '-translate-x-full lg:translate-x-0 lg:w-20 hover:lg:w-64': !isSidebarOpen,
        'translate-x-0 w-64': isSidebarOpen
      }"
      @mouseenter="onMouseEnter"
      @mouseleave="onMouseLeave"
    >
      <!-- ================ sidebar header ================== -->
      <div class="flex items-center justify-between flex-shrink-0 p-2 mb-2.5" :class="{ 'lg:justify-center': !isSidebarOpen }">
        <div class="flex items-center justify-between w-full">
          <img src="" class="ml-3 w-11 h-11 " alt="logo" />
          <div class="mr-4 text-right hidden md:block">
            <span class="hidden text-2xl font-bold leading-tight text-primary sm:block font-nakora" :class="{ 'lg:hidden': !isSidebarOpen }">
              SIMKRIP
            </span>
            <span class="hidden text-sm font-semibold leading-tight text-tertiary font-inter sm:block" :class="{ 'sm:hidden': !isSidebarOpen }">
              IAIN Metro Lampung
            </span>
          </div>
        </div>
        <button @click="toggleSidebarMenu" class="p-2 rounded-md lg:hidden">
          <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <!-- ================ end sidebar header ================== -->
  
      <!-- ==================== Sidebar links ====================-->
      <nav class="flex-1 overflow-hidden overflow-y-auto">
        <ul class="p-2 space-y-2 overflow-hidden">
          <!-- dashboard -->
          <li>
            <a
              href="/admin/dashboard"
              class="flex items-center p-2 space-x-2 rounded-md group hover:bg-gray-100"
              :class="{ 'bg-primary text-white hover:bg-primaryHover': isActive('/admin/dashboard'), 'justify-center': !isSidebarOpen }"
            >
              <span>
                <svg
                  class="w-6 h-6 text-gray-500"
                  :class="{ 'bg-primary text-white group-hover:bg-primaryHover': isActive('/admin/dashboard') }"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span class="font-inter font-medium" :class="{ 'text-white font-semibold': isActive('/admin/dashboard'), 'lg:hidden': !isSidebarOpen }">Dashboard</span>
            </a>
          </li>
  
          <!-- Manajemen Skripsi Dropdown -->
          <li>
            <a href="#" @click.prevent="toggleSkripsiDropdown" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100" :class="{ 'bg-primary text-white hover:bg-primaryHover': isSkripsiActive, 'justify-center': !isSidebarOpen }">
              <span>
                <svg
                  class="w-6 h-6 text-gray-500"
                  :class="{ 'bg-primary group-hover:bg-primaryHover text-white': isSkripsiActive }"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
              </span>
              <span  class="flex-1 font-inter font-medium" :class="{ 'text-white font-semibold': isSkripsiActive, 'lg:hidden': !isSidebarOpen }">
                Manajemen Santri
              </span>
              <span :class="{ 'lg:hidden': !isSidebarOpen }" class="ml-auto">
                <svg :class="{ 'rotate-90': isSkripsiActive }" class="w-4 h-4 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                </svg>
              </span>
            </a>
            <ul v-show="isSkripsiActive" class="p-2 space-y-1">
              <!-- judul skripsi -->
              <li class="relative">
                <a href="/admin/santris" class="flex items-center p-2 pl-8 space-x-2 rounded-md hover:bg-gray-100" :class="{ 'text-primary': isActive('/admin/santris'), 'text-gray-600': !isActive('/admin/santris') }">
                  <div v-if="isActive('/admin/santris')" class="absolute w-2 h-2 rounded-full left-3 bg-primary"></div>
                  <span>
                    <svg :class="{ 'text-primary': isActive('/admin/santris'), 'text-gray-400': !isActive('/admin/santris') }" xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="currentColor">
                      <path d="M480-144q-8 0-16.5-2t-15.5-6q-42-30-87.5-47T264-216q-40 0-77 7.5T115-186q-21 11-44-4t-23-39v-503q0-17 8.5-28T76-776q45-20 91.5-30t96.5-10q58 0 111.5 12.5T480-762v534q55-32 108.5-46T696-288q35 0 70.5 5t73.5 19v-528q12 4 22 7.5t22 8.5q11 5 19.5 17t8.5 27v503q0 26-22 39t-45 4q-35-14-72.5-22t-76.5-8q-51 0-97 17t-89 47q-7 4-14.5 6t-15.5 2Zm102-219q-9 8-19.5 4T552-376v-312q0-15 6-29t17-24l161-143q9-8 20.5-4t11.5 17v311q0 15-6 29t-17 24L582-363Zm-174 95v-441q-34-20-73-27.5t-75-7.5q-39 0-73.5 8.5T120-713v445q35-11 68-15.5t72-4.5q37 0 75 4.5t73 15.5Zm0 0v-441 441Z" />
                    </svg>
                  </span>
                  <span class="font-roboto" :class="{ 'font-medium': isActive('/admin/santris'), 'lg:hidden': !isSidebarOpen}">
                    Data Santri
                  </span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- ==================== End Sidebar Links =================== -->
      <LogoutButton />
    </div>
  </template>
  
  <script>
  import LogoutButton from '../Admin/LogoutButton.vue';

  export default {
    name: 'SidebarAdmin',
    components: {
        LogoutButton,
    },
    data() {
      return {
        isSidebarOpen: false,
        isSkripsiActive: false,
        isDashboardActive: true,
        isTitleThesisActive: false,
      };
    },
    setup() {
        const isActive = (path) => {
          return window.location.pathname.startsWith(path);
        };

        return{
            isActive,
        };
    },
    methods: {
      toggleSidebarMenu() {
        this.isSidebarOpen = !this.isSidebarOpen;
      },
      onMouseEnter() {
        if (window.innerWidth >= 1024) {
          this.isSidebarOpen = true;
        }
      },
      onMouseLeave() {
        if (window.innerWidth >= 1024) {
          this.isSidebarOpen = false;
        }
      },
      toggleSkripsiDropdown() {
        this.isSkripsiActive = !this.isSkripsiActive;
      },
      openLogoutModal() {
        window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: 'logoutModal' } }));
      },
    },
  };
  </script>
  
  <style scoped>
  nav {
    scrollbar-width: thin;
    scrollbar-color: #888 transparent;
  }
  nav::-webkit-scrollbar {
    width: 6px;
  }
  nav::-webkit-scrollbar-track {
    background: transparent;
  }
  nav::-webkit-scrollbar-thumb {
    background-color: #888;
    border-radius: 4px;
  }
  nav::-webkit-scrollbar-thumb:hover {
    background-color: #555;
  }
  </style>
  