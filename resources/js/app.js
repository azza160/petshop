import './bootstrap';
import Alpine from 'alpinejs'
import AOS from 'aos'
import 'aos/dist/aos.css'

window.Alpine = Alpine
Alpine.start()

// Initialize AOS after everything is loaded
document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
        })
    }, 100)
})