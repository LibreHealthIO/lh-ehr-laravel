<template>
    <div :class="error ? 'has-error' : '' " class="flex flex-col capitalize">
        <ehr-label
            v-if="label"
            :id="id"
            :required="required"
            :label="label"
        />
        <div v-if="type === 'text-area'" class="relative">
          <textarea
              class="py-2.5 px-3 outline-none focus:outline-none focus:border-green-500 focus:ring block w-full border border-gray-300 rounded leading-normal appearance-none placeholder:text-gray-500 placeholder:opacity-100"
              :class="customClass"
              :disabled="disabled"
              :readonly="read_only"
              @input="$emit('input', $event.target.value)"
              :id="id" :cols="cols" :rows="rows"
              v-bind="$attrs" :minlength="minLength"
              :maxlength="maxLength" :placeholder="placeholder"
              :required="required">{{ value }}</textarea>
        </div>
        <div v-else-if="type === 'select'" class="relative">
            <select
                :disabled="disabled"
                :required="required"
                @input="$emit('input', $event.target.value)"
                v-if="options.length >= 0" id="underline_select" class="block py-2.5 px-3 w-full bg-transparent focus:border-green-500 border border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none leading-normal placeholder:text-gray-500 placeholder:opacity-100">
                <option selected class="text-gray-100">{{ placeholder ? placeholder : 'Choose a value' }}</option>
                <option v-for="option in options" :key="option.id" :value="option.id">
                    {{ option.name }}
                </option>
            </select>
        </div>
        <div v-else class="relative">
            <input
                :id="id"
                ref="input"
                :disabled="disabled"
                :readonly="read_only"
                v-bind="$attrs" :minlength="minLength" :placeholder="placeholder" :required="required" :type="this.isPassword ? this.togglePassword ? 'password' : 'text' : this.type"
                :value="value"
                class="py-2.5 px-3 focus:outline-none outline-none block w-full border border-gray-300 rounded leading-normal appearance-none placeholder:text-gray-500 placeholder:opacity-100"
                :class="customClass"
                @input="$emit('input', $event.target.value)"/>
            <div v-if="isPassword" class="absolute right-1 bottom-2.5 px-3 cursor-pointer"
                 @click="changeType(togglePassword)">
                <icon :name="togglePassword ? 'eye' : 'eye-off'" class="w-5 h-5" />
            </div>
        </div>
        <div v-if="description" v-html="description" class="text-xs lowercase p-1"/>
        <div v-if="error" class="text-xs text-red-700 mt-2">{{ error }}</div>
    </div>
</template>

<script>
export default {
    name: "EhrInput",
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
            default: 'dark:bg-dark-2 dark:border dark:border-white'
        },
        type: {
            type: String,
            default: 'text',
        },
        cols: {
            type: Number,
            default: 30
        },
        rows: {
            type: Number,
            default: 7
        },
        value: String,
        label: String,
        description: String,
        error: String,
        required: Boolean,
        maxLength: String,
        minLength: String,
        placeholder: String,
        disabled: {
            type: Boolean,
            default: false
        },
        read_only: {
            type: Boolean,
            default: false
        },
        options: {
            type: Array,
        }
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
