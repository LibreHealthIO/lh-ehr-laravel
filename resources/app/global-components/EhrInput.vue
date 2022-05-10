<template>
    <div :class="error ? 'has-error' : '' " class="mt-1">
        <label v-if="label" :for="id">
            <span v-html="label"/>
            <span v-if="required" class="text-red-600 text-xs">*{{ $t('forms.required') }}</span><br>
        </label>
        <div class="relative">
            <input :id="id" ref="input"
                   v-bind="$attrs" :minlength="minLength" :placeholder="placeholder" :required="required" :type="this.isPassword ? this.togglePassword ? 'password' : 'text' : this.type"
                   :value="value" class="mt-1 py-2.5 px-3 focus:ring-green-500 focus:border-green-500 block w-full border border-gray-300 rounded" :class="customClass" @input="$emit('input', $event.target.value)"/>
            <div v-if="isPassword" class="absolute right-1 bottom-4 px-3 cursor-pointer"
                 @click="changeType(togglePassword)">
                <icon :name="togglePassword ? 'eye' : 'eye-off'" class="w-5 h-5" />
            </div>
        </div>
        <div v-if="description" v-html="description" class="text-xs p-1"/>
        <div v-if="error" class="text-red-600 mt-2">{{ error }}</div>
    </div>
</template>

<script>
export default {
    name: "WaspitoInput",
    inheritAttrs: false,
    props: {
        id: {
            type: String,
            default() {
                return `text-input-${this._uid}`
            },
        },
        customClass: {
            type: String,
            default: 'dark:bg-dark-2 dark:border dark:border-white px-3 py-2'
        },
        type: {
            type: String,
            default: 'text',
        },
        value: String,
        label: String,
        description: String,
        error: String,
        required: Boolean,
        minLength: String,
        placeholder: String
    },
    data() {
        return {
            isPassword: this.type === "password",
            togglePassword: true
        }
    },
    methods: {
        focus() {
            this.$refs.input.focus()
        },
        select() {
            this.$refs.input.select()
        },
        changeType() {
            this.togglePassword = !this.togglePassword
        }
    }
}
</script>
