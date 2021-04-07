<template>
    <app-layout>
        <!-- Page Heading -->
        <header class="bg-white shadow" v-if="$slots.header">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <slot name="header"></slot>
            </div>
        </header>
        <div class="flex flex-wrap space-y-6 py-6 sm:justify-around sm:space-y-0">
            <admin-sidebar></admin-sidebar>
            <div class="bg-white overflow-hidden shadow-xl py-6 w-full sm:w-2/3 sm:rounded-lg">
                <slot></slot>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AdminSidebar from '@/Components/AdminSidebar'
    import AppLayout from '@/Layouts/AppLayout'
    export default {
        components: {
            AdminSidebar,
            AppLayout,
        }
    }
</script>
