document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.eb-faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.eb-faq-q');
        if (question) {
            question.addEventListener('click', () => {
                const isOpen = item.classList.contains('open');

                // Close all other FAQ items
                faqItems.forEach(otherItem => {
                    otherItem.classList.remove('open');
                });

                // Toggle current item
                if (!isOpen) {
                    item.classList.add('open');
                }
            });
        }
    });
});
