<template>
    <div class="flex flex-col w-full sm:w-1/4">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <button class="flex justify-between items-center px-6 py-2 w-full focus:outline-none hover:bg-gray-500 hover:text-gray-50" @click="openAdmins = !openAdmins">
                <span>Admins</span>
                <svg aria-hidden="true" data-prefix="fas" data-icon="angle-down" class="w-4 h-4 fill-current svg-inline--fa fa-angle-down fa-w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" v-if="openAdmins">
                    <path d="M143 352.3L7 216.3a23.9 23.9 0 010-33.9l22.6-22.6a23.9 23.9 0 0133.9 0l96.4 96.4 96.4-96.4a23.9 23.9 0 0133.9 0l22.6 22.6a23.9 23.9 0 010 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"/>
                </svg>
                <svg aria-hidden="true" data-prefix="fas" data-icon="angle-left" class="w-4 h-4 fill-current svg-inline--fa fa-angle-left fa-w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" v-else>
                    <path d="M31.7 239l136-136a23.9 23.9 0 0133.9 0l22.6 22.6a23.9 23.9 0 010 33.9L127.9 256l96.4 96.4a23.9 23.9 0 010 33.9L201.7 409a23.9 23.9 0 01-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/>
                </svg>
            </button>
            <div class="flex flex-col" v-if="openAdmins">
                <inertia-link :href="route('admin.admins.index')" class="text-right capitalize border-t w-full px-6 py-2" :class="route().current('admin.admins.*') ? 'text-gray-50 bg-gray-500' : 'hover:text-gray-50 hover:bg-gray-500'">Admins</inertia-link>
                <inertia-link :href="route('admin.roles.index')" class="text-right capitalize border-t w-full px-6 py-2" :class="route().current('admin.roles.*') ? 'text-gray-50 bg-gray-500' : 'hover:text-gray-50 hover:bg-gray-500'" v-if="$page.props.auth.can.accessRoles">Roles</inertia-link>
                <inertia-link :href="route('admin.users.index')" class="text-right capitalize border-t w-full px-6 py-2" :class="route().current('admin.users.*') ? 'text-gray-50 bg-gray-500' : 'hover:text-gray-50 hover:bg-gray-500'" v-if="$page.props.auth.can.accessUsers">Users</inertia-link>
            </div>
            <inertia-link :href="route('dashboard')" class="flex justify-between items-center border-t px-6 py-2 capitalize hover:bg-gray-500 hover:text-gray-50">
                Dashboard
            </inertia-link>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            openAdmins: false,
        })
    }
</script>
