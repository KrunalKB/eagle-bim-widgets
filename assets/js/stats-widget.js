document.addEventListener('DOMContentLoaded', () => {
    const counts = document.querySelectorAll('.count-num');
    const observerOptions = {
        threshold: 0.5
    };

    const countObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;

            const el = entry.target;
            const target = parseInt(el.dataset.target, 10);
            let current = 0;
            const step = target / 50;

            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    el.textContent = target;
                    clearInterval(timer);
                } else {
                    el.textContent = Math.round(current);
                }
            }, 26);

            countObserver.unobserve(el);
        });
    }, observerOptions);

    counts.forEach(el => countObserver.observe(el));
});
