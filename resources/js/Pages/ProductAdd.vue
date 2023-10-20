<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps(['categories'])

const form = useForm({
    name: '',
    description: '',
    category_id: '',
    price: '',
    image_path: '',
});

const submit = () => {
    form.post(route('products.store'));
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Add Product" />
        <div class="w-full m-auto sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form @submit.prevent="submit" class="w-fit p-6 m-auto">
                <div>
                    <InputLabel for="name" value="Product name" />

                    <TextInput
                        id="Name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.title" />
                </div>
                <div class="mt-4">
                    <InputLabel for="description" value="Product Description" />

                    <TextInput
                        id="description"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.description"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.description" />
                </div>
                <div class="mt-4">
                    <InputLabel for="categories" value="Category" />

                    <select id="categories" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" v-model="form.genre_id" required>
                        <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.category_id" />
                </div>
                <div class="mt-4">
                    <InputLabel for="price" value="Product Price" />

                    <TextInput
                        id="price"
                        type="number"
                        min="1"
                        max="999"
                        class="mt-1 block w-full"
                        v-model="form.price"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.rating" />
                </div>
                <div class="mt-4">
                    <InputLabel for="image_path" value="Product Image" />

                    <input
                        id="image_path"
                        name="image_path"
                        @input="form.image_path = $event.target.files[0]"
                        type="file"
                        class="mt-1 block w-full"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.image_path" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton class="m-auto" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Submit
                    </PrimaryButton>
                </div>
            </form>
        </div>
        
    </AuthenticatedLayout>
</template>
