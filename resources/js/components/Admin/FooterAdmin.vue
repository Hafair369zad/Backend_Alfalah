<!-- resources/js/components/SidebarComponent.vue -->
<template>
    <h2>Ini Footer Admin</h2>
</template>

<script>
import { ref, onMounted, onUnmounted } from 'vue';

export default {
    name: 'FooterAdmin',
    setup() {
        const isSidebarOpen = ref(false);

        const toggleSidebarOnHover = () => {
            if (window.innerWidth >= 1024) {
                isSidebarOpen.value = !isSidebarOpen.value;
            }
        };

        const handleResize = () => {
            if (window.innerWidth >= 1024) {
                isSidebarOpen.value = false;
            }
        };

        onMounted(() => {
            window.addEventListener('resize', handleResize);
        });

        onUnmounted(() => {
            window.removeEventListener('resize', handleResize);
        });

        const logout = () => {
            // Handle logout logic
            console.log('User logged out');
        };

        return {
            isSidebarOpen,
            toggleSidebarOnHover,
            logout
        };
    }
};
</script>

<style scoped>
aside {
    transition: transform 0.3s ease-in-out;
}
</style>