<template>
    <div :id="id" class="modal" role="dialog" tabindex="-1">>
        <div class="modal__content">
            <form @submit.prevent="submit">
                <div class="p-5 text-center">
                    <icon class="w-16 h-16 text-theme-6 mx-auto mt-3" name="x-circle"/>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-gray-600 mt-2">
                        {{ description }}
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button
                        class="button w-24 px-3 py-2 text-base leading-6 rounded-md font-medium  border border-transparent bg-gray-100 text-gray-700 mr-1"
                        data-dismiss="modal"
                        type="button">Cancel
                    </button>
                    <button :loading="isLoading" class="mr-1 bg-theme-6 text-center" type="submit">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import cash from "cash-dom"

export default {
    name: "CancelModal",
    props: {
        description: {
            type: String,
            default: 'Do you really want to delete these records? This process cannot be\n' +
                'undone.'
        },
        url: String,
        id: {
            type: String,
            default: 'delete-modal'
        },
        payload: Object,
    },
    data() {
        return {
            isLoading: false,
        }
    },
    methods: {
        submit() {
            this.$inertia.form(this.url, this.payload, {
                onStart: () => {
                    this.isLoading = true;
                },
                onFinish: () => {
                    this.isLoading = false;
                    cash("#"+this.id).modal("hide");
                },
            });
        },
    }
}
</script>

<style scoped>

</style>
