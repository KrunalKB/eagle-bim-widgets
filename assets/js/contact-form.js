document.addEventListener('DOMContentLoaded', function() {
    const fileZones = document.querySelectorAll('.eb-contact-file-zone');

    fileZones.forEach(zone => {
        const fileInput = zone.querySelector('input[type="file"]');
        if (!fileInput) return;

        // Create and append the file names display area if it doesn't exist
        let fileNameDisplay = zone.querySelector('.eb-contact-file-names');
        if (!fileNameDisplay) {
            fileNameDisplay = document.createElement('div');
            fileNameDisplay.className = 'eb-contact-file-names';
            fileNameDisplay.style.display = 'none';
            zone.appendChild(fileNameDisplay);
        }

        const updateFileNames = () => {
            if (fileInput.files.length > 0) {
                const names = Array.from(fileInput.files).map(f => f.name).join(', ');
                fileNameDisplay.textContent = '📎 ' + names;
                fileNameDisplay.style.display = 'block';
            } else {
                fileNameDisplay.style.display = 'none';
            }
        };

        fileInput.addEventListener('change', updateFileNames);

        // Drag and drop support
        zone.addEventListener('dragover', (e) => {
            e.preventDefault();
            zone.classList.add('drag-over');
        });

        zone.addEventListener('dragleave', () => {
            zone.classList.remove('drag-over');
        });

        zone.addEventListener('drop', (e) => {
            e.preventDefault();
            zone.classList.remove('drag-over');
            if (e.dataTransfer.files.length > 0) {
                fileInput.files = e.dataTransfer.files;
                updateFileNames();
            }
        });
    });
});
