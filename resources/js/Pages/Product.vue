<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';

defineProps({
    products: Object
})

const url = window.location.origin;
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <PrimaryButton class="mb-4">
                    <Link :href="route('products.create')">NEW PRODUCT</Link>
                </PrimaryButton>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="p-2 text-gray-900 flex justify-between border-b" v-for="product in products">
                        <div class="flex items-center gap-12">
                            <img class="w-16 h-16 rounded-full aspect-square object-cover" :src="url + '/storage/' + product.image_path" alt="">
                            <div class="w-[28rem]">
                                <h1 class="font-bold text-lg">{{ product.name }}</h1>
                                <p class="text-sm truncate">{{ product.description }}</p>
                            </div>
                            <div class="w-32">
                                <h1 class="font-bold text-lg">Category</h1>
                                <p class="text-sm">{{ product.category.name }}</p>
                            </div>
                            <div>
                                <h1 class="font-bold text-lg">Price</h1>
                                <p class="text-sm">${{ product.price }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-6">
                            <Link :href="route('products.edit', {product})">Edit</Link>
                            <Link class="text-red-500" :href="route('products.destroy', {product})" method="delete" as="button" type="button">Delete</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
