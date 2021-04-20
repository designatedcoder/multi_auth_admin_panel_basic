<template>
    <admin-layout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Users
                </h2>
            </div>
        </template>

        <div class="flex flex-col mx-auto px-6 py-2 w-1/2">
            <div>
                <h2 class="text-center text-xl font-semibold capitalize underline">{{ user.name }}</h2>
                <form @submit.prevent="submit">
                    <div class="flex flex-col mt-2">
                        <jet-label for="name" value="Name" class="text-xl"></jet-label>
                        <jet-input id="name" type="text" class="mt-1 block w-full disabled:opacity-50" v-model="form.name" required autofocus disabled></jet-input>
                        <jet-input-error :message="form.errors.name" class="mt-2"></jet-input-error>
                    </div>
                    <div class="flex flex-col mt-2">
                        <jet-label for="email" value="E-mail" class="text-xl"></jet-label>
                        <jet-input id="email" type="email" class="mt-1 block w-full disabled:opacity-50" v-model="form.email" required autofocus disabled></jet-input>
                        <jet-input-error :message="form.errors.email" class="mt-2"></jet-input-error>
                    </div>
                    <div class="flex flex-col mt-2">
                        <jet-label for="created_at" value="Joined" class="text-xl"></jet-label>
                        <jet-input id="created_at" type="text" class="mt-1 block w-full disabled:opacity-50" v-model="form.created_at" required autofocus disabled></jet-input>
                        <jet-input-error :message="form.errors.created_at" class="mt-2"></jet-input-error>
                    </div>
                    <div class="flex flex-col mt-2">
                        <div class="inline-block relative">
                            <jet-label for="role" value="Role" class="text-xl"></jet-label>
                            <select class="block capitalize border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 w-full" v-model="form.roles[0][0].name" tabindex="1">
                                <option v-for="(option, index) in allRoles" :key="index" :value="option.name" :selected="option.name === form.roles[0][0].name">
                                    {{ option.name }}
                                </option>
                            </select>

                        </div>
                    </div>
                    <div class="flex items-center justify-center mt-8">
                        <green-button type="submit" class="text-sm ml-4" :class="{'opacity-25':form.processing}" :disabled="form.processing">Update</green-button>
                        <jet-danger-button :href="route('admin.users.index')" class="text-sm ml-4">Cancel</jet-danger-button>
                    </div>
                </form>
            </div>
        </div>
    </admin-layout>
</template>

<script>
    import AdminLayout from '@/Layouts/AdminLayout'
    import GreenButton from '@/Components/GreenButton'
    import JetDangerButton from '@/Jetstream/DangerButton'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    export default {
        props: ['user', 'allRoles'],
        components: {
            AdminLayout,
            GreenButton,
            JetDangerButton,
            JetInput,
            JetInputError,
            JetLabel,
        },
        data() {
            return {
                form: this.$inertia.form({
                    name: this.user.name,
                    email: this.user.email,
                    created_at: this.user.created_at,
                    roles: []
                })
            }
        },
        created() {
            if(this.user.roles) {
                return this.form.roles.push(this.user.roles)
            }
        },
        methods: {
            submit() {
                this.form.patch(this.route('admin.users.update', this.user.id), this.form)
            }
        }
    }
</script>
