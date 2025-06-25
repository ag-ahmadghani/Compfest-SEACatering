<x-admin title="Create Meal Plan">
    <div class="space-y-6" x-data="{
        form: {
            name: '',
            description: '',
            price: '',
            type: 'Standard',
            status: 'draft',
            calories: '',
            protein: '',
            carbs: '',
            fat: '',
            image: null,
            imagePreview: null
        },
        errors: {},
        isLoading: false,
        
        handleImageUpload(e) {
            const file = e.target.files[0];
            if (file) {
                this.form.image = file;
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.form.imagePreview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        
        submitForm() {
            this.isLoading = true;
            this.errors = {};
            
            // Form validation
            if (!this.form.name) this.errors.name = 'Name is required';
            if (!this.form.price) this.errors.price = 'Price is required';
            if (!this.form.description) this.errors.description = 'Description is required';
            
            if (Object.keys(this.errors).length === 0) {
                // Submit form (simulated)
                setTimeout(() => {
                    this.isLoading = false;
                    window.location.href = '/admin/meal-plans';
                }, 1500);
            } else {
                this.isLoading = false;
            }
        }
    }">
        <!-- Form content same as previously provided -->
    </div>
</x-admin>