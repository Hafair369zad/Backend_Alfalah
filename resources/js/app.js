import './bootstrap';
import { createApp } from 'vue';

// Auto-register semua komponen di folder ./components
const app = createApp({});

const files = import.meta.glob('./components/**/*.vue', { eager: true });

for (const [path, definition] of Object.entries(files)) {
    const componentName = path.split('/').pop().replace('.vue', '');
    console.log('Registered component:', componentName); // Tambahkan log
    app.component(componentName, definition.default);
}
    
app.mount('#app');
