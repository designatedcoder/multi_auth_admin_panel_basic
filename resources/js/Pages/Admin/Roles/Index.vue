<template>
    <admin-layout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Roles
                </h2>
                <blue-button :href="route('admin.roles.create')" class="text-sm">Create</blue-button>
            </div>
        </template>

        <div class="text-center my-4" v-if="$page.props.success">
            <span class="text-2xl bg-blue-500 text-gray-50 px-2 rounded-md">{{ $page.props.success }}</span>
        </div>

        <div class="px-6 py-2">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="text-left pl-3">Name</th>
                        <th class="text-left pl-3">Created</th>
                        <th class="text-right pr-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(role,index) in roles" :key="index" class="text-center hover:bg-gray-600 hover:text-gray-50" :class="{'bg-gray-300': index%2 === 0}">
                        <td class="text-left capitalize py-3 pl-3">{{ role.name }}</td>
                        <td class="text-left py-3 pl-3">{{ role.created_at }}</td>
                        <td class="py-3">
                            <div class="flex justify-end pr-3">
                                <green-button href="#" class="text-sm">Edit</green-button>
                                <form>
                                    <jet-danger-button type="submit" class="text-sm ml-1">Delete</jet-danger-button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </admin-layout>
</template>

<script>
    import AdminLayout from '@/Layouts/AdminLayout'
    import BlueButton from '@/Components/BlueButton'
    import GreenButton from '@/Components/GreenButton'
    import JetDangerButton from '@/Jetstream/DangerButton'
    export default {
        props: ['roles'],
        components: {
            AdminLayout,
            BlueButton,
            GreenButton,
            JetDangerButton,
        }
    }
</script>
