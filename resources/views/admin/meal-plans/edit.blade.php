<x-admin title="Edit Meal Plan">
    <div class="space-y-6" x-data="{
        form: {
            id: {{ $id }},
            name: '{{ $mealPlan->name }}',
            description: '{{ $mealPlan->description }}',
            price: {{ $mealPlan->price }},
            type: '{{ $mealPlan->type }}',
            status: '{{ $mealPlan->status }}',
            calories: {{ $mealPlan->calories }},
            protein: {{ $mealPlan->protein }},
            carbs: {{ $mealPlan->carbs }},
            fat: {{ $mealPlan->fat }},
            image: null,
            imagePreview: '{{ $mealPlan->image_url }}'
        },
        // Rest of the Alpine data same as create.blade.php
    }">
        <!-- Form content similar to create but with existing values -->
    </div>
</x-admin>