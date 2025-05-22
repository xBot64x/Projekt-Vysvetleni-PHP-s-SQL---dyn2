function copyCode(button) {
    const preTag = button.parentElement;
    const code = preTag.innerText;
    navigator.clipboard.writeText(code).then(() => {
        button.innerText = "Zkopírováno!";
        button.style.backgroundImage = "none";
        setTimeout(() => {
            button.innerText = "";
            button.style.backgroundImage = "";
        }, 2000);
    }).catch(err => {
        console.error("Chyba při kopírování: ", err);
    });
}

// Add mobile sidebar toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    // Create and add the toggle button
    const toggleButton = document.createElement('button');
    toggleButton.className = 'sidebar-toggle';
    toggleButton.innerHTML = '☰';
    document.body.appendChild(toggleButton);

    // Add click event to toggle sidebar
    toggleButton.addEventListener('click', function() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('active');
    });

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        const sidebar = document.querySelector('.sidebar');
        const toggleButton = document.querySelector('.sidebar-toggle');
        
        if (window.innerWidth <= 768 && 
            !sidebar.contains(event.target) && 
            !toggleButton.contains(event.target) && 
            sidebar.classList.contains('active')) {
            sidebar.classList.remove('active');
        }
    });
});

// Add scroll position tracking for sidebar highlighting
document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.sidebar-nav a');

    function highlightCurrentSection() {
        let currentSection = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (window.scrollY >= (sectionTop - 200)) {
                currentSection = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').substring(1) === currentSection) {
                link.classList.add('active');
            }
        });
    }

    // Initial check on page load
    highlightCurrentSection();

    // Check on scroll
    window.addEventListener('scroll', highlightCurrentSection);
});

// Tyto scripty byly vygenerovány umělou inteligencí, neumím javascript