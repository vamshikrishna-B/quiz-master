document.addEventListener('DOMContentLoaded', () => {
    // Create animated stars
    const starsContainer = document.querySelector('.stars');
    const starCount = 400;

    for (let i = 0; i < starCount; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        star.style.left = `${Math.random() * 100}%`;
        star.style.top = `${Math.random() * 100}%`;
        star.style.width = `${Math.random() * 4}px`;
        star.style.height = star.style.width;
        star.style.setProperty('--duration', `${Math.random() * 2 + 1}s`);
        star.style.opacity = Math.random() * 0.7 + 0.3;
        starsContainer.appendChild(star);
    }

    // Shooting stars initialization
    function createShootingStar() {
        const shootingStar = document.createElement('div');
        shootingStar.style.cssText = `
            position: absolute;
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, transparent, white);
            animation: shoot 1s linear;
        `;
        shootingStar.style.top = `${Math.random() * 100}%`;
        shootingStar.style.left = `${Math.random() * 100}%`;

        document.body.appendChild(shootingStar);

        setTimeout(() => {
            shootingStar.remove();
        }, 1000);
    }

    // Start animations
    setInterval(createShootingStar, 3000);
});

// Add keyframe for shooting stars
const styleSheet = document.styleSheets[0];
styleSheet.insertRule(`
    @keyframes shoot {
        0% { transform: translateX(-100%); opacity: 0; }
        50% { opacity: 1; }
        100% { transform: translateX(100vw); opacity: 0; }
    }
`, styleSheet.cssRules.length);
