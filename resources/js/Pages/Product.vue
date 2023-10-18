<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'

defineProps({ 
    Products: Object,
    Category: Object
});

</script>

<template>
    <Head title="Product" />

    <AuthenticatedLayout>
        
        <Link :href="route('product.create')" as="button">Add New</Link>
   
    </AuthenticatedLayout>
</template>