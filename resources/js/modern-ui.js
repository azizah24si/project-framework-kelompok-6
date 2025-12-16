// Modern UI JavaScript Components

// Smooth scrolling for anchor links
document.addEventListener('DOMContentLoaded', function() {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});

// Enhanced table interactions
class ModernTable {
    constructor(tableElement) {
        this.table = tableElement;
        this.init();
    }

    init() {
        this.addRowHoverEffects();
        this.addSortingCapability();
        this.addSearchHighlight();
    }

    addRowHoverEffects() {
        const rows = this.table.querySelectorAll('tbody tr');
        rows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.1)';
            });

            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'none';
            });
        });
    }

    addSortingCapability() {
        const headers = this.table.querySelectorAll('thead th[data-sortable]');
        headers.forEach(header => {
            header.style.cursor = 'pointer';
            header.addEventListener('click', () => this.sortTable(header));
        });
    }

    sortTable(header) {
        const columnIndex = Array.from(header.parentNode.children).indexOf(header);
        const rows = Array.from(this.table.querySelectorAll('tbody tr'));
        const isAscending = header.classList.contains('sort-asc');

        rows.sort((a, b) => {
            const aText = a.children[columnIndex].textContent.trim();
            const bText = b.children[columnIndex].textContent.trim();
            
            if (isAscending) {
                return bText.localeCompare(aText);
            } else {
                return aText.localeCompare(bText);
            }
        });

        // Update header classes
        this.table.querySelectorAll('thead th').forEach(th => {
            th.classList.remove('sort-asc', 'sort-desc');
        });
        
        header.classList.add(isAscending ? 'sort-desc' : 'sort-asc');

        // Reorder rows
        const tbody = this.table.querySelector('tbody');
        rows.forEach(row => tbody.appendChild(row));
    }

    addSearchHighlight() {
        const searchInput = document.querySelector('input[name="search"]');
        if (searchInput && searchInput.value) {
            this.highlightSearchTerms(searchInput.value);
        }
    }

    highlightSearchTerms(searchTerm) {
        const cells = this.table.querySelectorAll('tbody td');
        cells.forEach(cell => {
            const text = cell.textContent;
            if (text.toLowerCase().includes(searchTerm.toLowerCase())) {
                const regex = new RegExp(`(${searchTerm})`, 'gi');
                cell.innerHTML = text.replace(regex, '<mark class="bg-warning">$1</mark>');
            }
        });
    }
}

// Enhanced form interactions
class ModernForm {
    constructor(formElement) {
        this.form = formElement;
        this.init();
    }

    init() {
        this.addFloatingLabels();
        this.addValidationFeedback();
        this.addSubmitAnimation();
    }

    addFloatingLabels() {
        const inputs = this.form.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            if (input.value) {
                input.classList.add('has-value');
            }

            input.addEventListener('focus', function() {
                this.parentNode.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                this.parentNode.classList.remove('focused');
                if (this.value) {
                    this.classList.add('has-value');
                } else {
                    this.classList.remove('has-value');
                }
            });
        });
    }

    addValidationFeedback() {
        const inputs = this.form.querySelectorAll('input[required], textarea[required], select[required]');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                }
            });
        });
    }

    addSubmitAnimation() {
        this.form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
                submitBtn.disabled = true;
                
                // Re-enable after 3 seconds if form hasn't been submitted
                setTimeout(() => {
                    if (submitBtn.disabled) {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }
                }, 3000);
            }
        });
    }
}

// Enhanced card interactions
class ModernCard {
    constructor(cardElement) {
        this.card = cardElement;
        this.init();
    }

    init() {
        this.addHoverEffects();
        this.addExpandCollapse();
    }

    addHoverEffects() {
        this.card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
            this.style.boxShadow = '0 10px 25px -3px rgba(0, 0, 0, 0.1)';
        });

        this.card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
        });
    }

    addExpandCollapse() {
        const toggleBtn = this.card.querySelector('[data-card-toggle]');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                const cardBody = this.card.querySelector('.card-body');
                if (cardBody) {
                    cardBody.style.display = cardBody.style.display === 'none' ? 'block' : 'none';
                    const icon = toggleBtn.querySelector('i');
                    if (icon) {
                        icon.classList.toggle('fa-chevron-up');
                        icon.classList.toggle('fa-chevron-down');
                    }
                }
            });
        }
    }
}

// Notification system
class NotificationSystem {
    constructor() {
        this.container = this.createContainer();
    }

    createContainer() {
        let container = document.querySelector('.notification-container');
        if (!container) {
            container = document.createElement('div');
            container.className = 'notification-container';
            container.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 9999;
                max-width: 400px;
            `;
            document.body.appendChild(container);
        }
        return container;
    }

    show(message, type = 'info', duration = 5000) {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show notification-item`;
        notification.style.cssText = `
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            animation: slideInRight 0.3s ease-out;
        `;
        
        notification.innerHTML = `
            <i class="fas fa-${this.getIcon(type)} mr-2"></i>
            ${message}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        `;

        this.container.appendChild(notification);

        // Auto remove after duration
        setTimeout(() => {
            if (notification.parentNode) {
                notification.style.animation = 'slideOutRight 0.3s ease-in';
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 300);
            }
        }, duration);

        return notification;
    }

    getIcon(type) {
        const icons = {
            success: 'check-circle',
            danger: 'exclamation-circle',
            warning: 'exclamation-triangle',
            info: 'info-circle'
        };
        return icons[type] || 'info-circle';
    }
}

// Loading overlay
class LoadingOverlay {
    constructor() {
        this.overlay = null;
    }

    show(message = 'Loading...') {
        this.hide(); // Remove existing overlay
        
        this.overlay = document.createElement('div');
        this.overlay.className = 'loading-overlay';
        this.overlay.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            backdrop-filter: blur(2px);
        `;

        this.overlay.innerHTML = `
            <div class="text-center">
                <div class="spinner-border text-primary mb-3" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div style="font-weight: 600; color: #374151;">${message}</div>
            </div>
        `;

        document.body.appendChild(this.overlay);
    }

    hide() {
        if (this.overlay && this.overlay.parentNode) {
            this.overlay.remove();
            this.overlay = null;
        }
    }
}

// Initialize components when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tables
    document.querySelectorAll('.table').forEach(table => {
        new ModernTable(table);
    });

    // Initialize forms
    document.querySelectorAll('form').forEach(form => {
        new ModernForm(form);
    });

    // Initialize cards
    document.querySelectorAll('.card').forEach(card => {
        new ModernCard(card);
    });

    // Create global instances
    window.notifications = new NotificationSystem();
    window.loadingOverlay = new LoadingOverlay();
});

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }

    .sort-asc::after {
        content: ' ↑';
        color: #3b82f6;
    }

    .sort-desc::after {
        content: ' ↓';
        color: #3b82f6;
    }

    .form-group.focused label {
        color: #3b82f6;
        transform: translateY(-20px) scale(0.85);
    }

    .form-control.has-value + label,
    .form-control:focus + label {
        transform: translateY(-20px) scale(0.85);
    }
`;
document.head.appendChild(style);

// Export for use in other modules
export { ModernTable, ModernForm, ModernCard, NotificationSystem, LoadingOverlay };