<script>
    // Alpine.js components for admin
    document.addEventListener('alpine:init', () => {
        Alpine.data('dashboardStats', () => ({
            init() {
                // Charts will be initialized here
                this.renderCharts();
            },
            renderCharts() {
                // User Growth Chart
                const userCtx = document.getElementById('userGrowthChart').getContext('2d');
                new Chart(userCtx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'New Users',
                            data: [12, 19, 15, 25, 22, 30],
                            backgroundColor: 'rgba(5, 150, 105, 0.1)',
                            borderColor: 'rgba(5, 150, 105, 1)',
                            borderWidth: 2,
                            tension: 0.3
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Meal Plan Distribution Chart
                const mealPlanCtx = document.getElementById('mealPlanDistributionChart').getContext('2d');
                new Chart(mealPlanCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Balanced', 'Weight Loss', 'Muscle Gain', 'Keto'],
                        datasets: [{
                            data: [35, 25, 20, 20],
                            backgroundColor: [
                                'rgba(5, 150, 105, 0.8)',
                                'rgba(16, 185, 129, 0.8)',
                                'rgba(34, 197, 94, 0.8)',
                                'rgba(74, 222, 128, 0.8)'
                            ],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'right'
                            }
                        }
                    }
                });
            }
        }));

        Alpine.data('dataTable', () => ({
            searchQuery: '',
            sortField: 'id',
            sortDirection: 'asc',
            
            sort(field) {
                if (this.sortField === field) {
                    this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
                } else {
                    this.sortField = field;
                    this.sortDirection = 'asc';
                }
            },
            
            get sortedItems() {
                return this.items.sort((a, b) => {
                    let modifier = 1;
                    if (this.sortDirection === 'desc') modifier = -1;
                    
                    if (a[this.sortField] < b[this.sortField]) return -1 * modifier;
                    if (a[this.sortField] > b[this.sortField]) return 1 * modifier;
                    return 0;
                }).filter(item => {
                    return Object.values(item).some(value => 
                        String(value).toLowerCase().includes(this.searchQuery.toLowerCase())
                    );
                });
            }
        }));
    });
</script>