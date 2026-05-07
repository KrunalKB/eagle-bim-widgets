document.addEventListener('DOMContentLoaded', function() {
    // 2. Dynamic TOC Generation
    const tocLists = document.querySelectorAll('#eb-blog-toc, .eb-mobile-toc-list');
    const contentArea = document.querySelector('.elementor-widget-post-content .elementor-widget-container, .eb-blog-detail-content, .entry-content');

    if (tocLists.length > 0 && contentArea) {
        const headings = contentArea.querySelectorAll('h2');

        // 5. Sticky Sidebar Footer-Overlap Fix
        const stickySidebar = document.querySelector('.eb-blog-detail-sidebar-sticky');
        const footer = document.querySelector('footer, .site-footer, .elementor-location-footer');

        if (stickySidebar && footer) {
            const footerObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        stickySidebar.classList.add('stop-sticky');
                    } else {
                        if (window.scrollY < footer.offsetTop) {
                            stickySidebar.classList.remove('stop-sticky');
                        }
                    }
                });
            }, { threshold: 0 });
            footerObserver.observe(footer);
        }

        // Handle Mobile TOC Toggle
        const mobileTrigger = document.getElementById('eb-mobile-toc-trigger');
        const mobileContainer = document.querySelector('.eb-mobile-toc-container');
        if (mobileTrigger && mobileContainer) {
            mobileTrigger.addEventListener('click', function() {
                mobileContainer.classList.toggle('is-open');
            });
        }

        headings.forEach((heading, index) => {
            if (!heading.id) {
                const text = heading.innerText.toLowerCase().trim().replace(/[^\w\s-]/g, '').replace(/[\s_-]+/g, '-');
                heading.id = 'toc-section-' + (text || 'section') + '-' + index;
            }

            // Create elements for each TOC list (Desktop & Mobile)
            tocLists.forEach(list => {
                const li = document.createElement('li');
                if (heading.tagName === 'H3') {
                    li.className = 'toc-h3';
                }

                const a = document.createElement('a');
                a.className = 'eb-toc-link';
                a.href = '#' + heading.id;

                const num = document.createElement('span');
                num.className = 'eb-toc-num';
                num.innerText = heading.tagName === 'H2' ? (index + 1).toString().padStart(2, '0') : '—';

                a.appendChild(num);
                a.appendChild(document.createTextNode(heading.innerText));
                li.appendChild(a);
                list.appendChild(li);
            });
        });

        // 3. EVENT DELEGATION for TOC clicks
        document.addEventListener('click', function(e) {
            const link = e.target.closest('.eb-toc-link');
            if (link) {
                e.preventDefault();
                const targetId = link.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    // Close mobile TOC after click
                    if (mobileContainer) mobileContainer.classList.remove('is-open');

                    const offset = 110;
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - offset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });

        // 4. Scroll-Spy (Automatic Highlighting)
        const observerOptions = {
            root: null,
            rootMargin: '-15% 0px -70% 0px',
            threshold: 0
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    document.querySelectorAll('.eb-toc-link').forEach(l => l.classList.remove('active'));
                    const activeLinks = document.querySelectorAll(`.eb-toc-link[href="#${entry.target.id}"]`);
                    activeLinks.forEach(link => link.classList.add('active'));
                }
            });
        }, observerOptions);

        headings.forEach(h => observer.observe(h));
    }
});
