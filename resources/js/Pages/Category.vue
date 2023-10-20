<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';

const props = defineProps(['categories'])
</script>

<template>
    <Head title="categories" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categories</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <PrimaryButton class="mb-4">
                    <Link :href="route('categories.create')">ADD CATEGORY</Link>
                </PrimaryButton>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="p-2 text-gray-900 flex justify-between border-b" v-for="category in categories">
                        <h1 class="font-bold">{{ category.name }}</h1>
                        <div class="flex gap-4">
                            <Link :href="route('categories.edit', {category})">Edit</Link>
                            <Link class="text-red-500" :href="route('categories.destroy', {category})" method="delete" as="button" type="button">Delete</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
