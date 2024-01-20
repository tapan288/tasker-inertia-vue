<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { useForm, usePage } from "@inertiajs/vue3";

defineProps({
    tasks: {
        type: Array,
        default: () => [],
    },
});

const page = usePage();

const form = useForm({
    title: "",
});

const submit = () => {
    form.post(route("tasks.store"), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Tasks" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks List
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div
                    v-if="$page.props.flash.message"
                    class="mb-4 font-medium text-sm text-gray-900"
                >
                    {{ $page.props.flash.message }}
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <form @submit.prevent="submit" class="mt-6 space-y-6">
                        <div>
                            <InputLabel for="title" value="Title" />

                            <TextInput
                                id="title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.title"
                                required
                                autofocus
                                autocomplete="title"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.title"
                            />
                        </div>

                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">
                                Save
                            </PrimaryButton>
                        </div>
                    </form>
                </div>

                <div
                    v-show="tasks.data.length > 0"
                    class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"
                >
                    <ul>
                        <li v-for="task in tasks.data" :key="task.id" class="">
                            {{ task.title }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
